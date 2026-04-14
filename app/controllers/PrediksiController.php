<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Session.php';
require_once __DIR__ . '/../services/NaiveBayesService.php';

class PrediksiController extends Controller
{
    public function index()
    {
        Session::start();

        if (!Session::check()) {
            header("Location: /web_prediksi_penjualan/public/login");
            exit;
        }

        $user = Session::get('user');
        $result = Session::get('prediksi_result');
        $hasResult = !empty($result);

        $this->view('prediksi/index', compact(
            'result',
            'user',
            'hasResult'
        ));
    }

    public function naiveBayesPredict($trainData, $testData)
    {
        $results = [];
        $correct = 0;

        // normalisasi helper (biar sama kayak Excel)
        $normalize = function ($value) {
            return trim(strtolower($value));
        };

        // normalisasi train data (IMPORTANT)
        foreach ($trainData as &$row) {
            $row['status_penjualan'] = $normalize($row['status_penjualan']);
            $row['bulan_penjualan'] = $normalize($row['bulan_penjualan']);
            $row['shif'] = $normalize($row['shif']);
            $row['pentol'] = $normalize($row['pentol']);
            $row['frozen'] = $normalize($row['frozen']);
        }

        foreach ($testData as &$row) {
            $row['status_penjualan'] = $normalize($row['status_penjualan']);
            $row['bulan_penjualan'] = $normalize($row['bulan_penjualan']);
            $row['shif'] = $normalize($row['shif']);
            $row['pentol'] = $normalize($row['pentol']);
            $row['frozen'] = $normalize($row['frozen']);
        }

        $classes = array_unique(array_column($trainData, 'status_penjualan'));
        $totalTrain = count($trainData);

        // hitung class count
        $classCounts = [];
        foreach ($classes as $class) {
            $classCounts[$class] = 0;
            foreach ($trainData as $d) {
                if ($d['status_penjualan'] == $class) {
                    $classCounts[$class]++;
                }
            }
        }

        foreach ($testData as $test) {

            $probabilities = [];

            foreach ($classes as $class) {

                // PRIOR (Excel style)
                $prob = $classCounts[$class] / $totalTrain;

                foreach (['bulan_penjualan', 'shif', 'pentol', 'frozen'] as $feature) {

                    $countFeature = 0;

                    foreach ($trainData as $d) {
                        if (
                            $d['status_penjualan'] == $class &&
                            $d[$feature] == $test[$feature]
                        ) {
                            $countFeature++;
                        }
                    }

                    // =========================
                    // TANPA smoothing (biar sama Excel)
                    // =========================
                    if ($classCounts[$class] == 0) {
                        $probFeature = 0;
                    } else {
                        $probFeature = $countFeature / $classCounts[$class];
                    }

                    // Excel biasanya rounding di display
                    $probFeature = round($probFeature, 4);

                    $prob *= $probFeature;

                    // optional rounding step-by-step (biar makin mirip Excel)
                    $prob = round($prob, 10);
                }

                $probabilities[$class] = $prob;
            }

            // ambil max probability
            arsort($probabilities);
            $predicted = array_key_first($probabilities);

            if ($predicted == $test['status_penjualan']) {
                $correct++;
            }

            

            $results[] = [
                'data' => $test,
                'probabilities' => $probabilities,
                'predicted' => $predicted,
                'actual' => $test['status_penjualan']
            ];
        }

        $accuracy = round(($correct / count($testData)) * 100, 2);

/*         echo "<pre>";
        print_r($results);
        print_r($accuracy);
        exit; */

        return [
            'results' => $results,
            'accuracy' => $accuracy
        ];
    }

    public function process()
    {
        Session::start();

        $train = Session::get('train_data');
        $test  = Session::get('test_data');
        $smote  = Session::get('smote_data');
        $ros  = Session::get('ros_data');
        $user = Session::get('user');

        if (!$train || !$test) {
            die("Data belum tersedia");
        }

        // =========================
        // NB normal
        // =========================

        $resultNBNormal = $this->naiveBayesPredict($train, $test);
        $resultNBSmote  = $this->naiveBayesPredict($smote, $test);
        $resultNBRos    = $this->naiveBayesPredict($ros, $test);

        Session::set('prediksi_result', [
            'nb_normal' => $resultNBNormal,
            'nb_smote'  => $resultNBSmote,
            'nb_ros'    => $resultNBRos
        ]);

        $result = Session::get('prediksi_result');
        $hasResult = !empty($result);

/*         echo "<pre>";
        print_r($result);
        exit;
 */
        // kirim ke view
        $this->view('prediksi/index', [
            'result' => $result,
            'user' => $user,
            'hasResult' => $hasResult
        ]);
    }
}
