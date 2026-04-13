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

        $nb_cm = $smote_cm = $ros_cm = [];
        $nb_metrics = $smote_metrics = $ros_metrics = [];

        $this->view('prediksi/index', compact(
            'result',
            'user',
            'nb_cm',
            'smote_cm',
            'ros_cm',
            'nb_metrics',
            'smote_metrics',
            'ros_metrics',
            'hasResult'
        ));
    }

    private function accuracy(array $predictions): float
    {
        $correct = 0;
        $total = count($predictions);

        foreach ($predictions as $row) {
            if (($row['status_penjualan'] ?? null) === ($row['prediksi'] ?? null)) {
                $correct++;
            }
        }

        return $total ? ($correct / $total) * 100 : 0;
    }

    public function process()
    {
        Session::start();

        $train = Session::get('train_data');
        $test  = Session::get('test_data');
        $user = Session::get('user');

        if (!$train || !$test) {
            die("Data belum tersedia");
        }

        // =========================
        // NB normal
        // =========================
        $nb = new NaiveBayesService();
        $nb->train($train);
        $pred_nb = $nb->predict($test);

        // =========================
        // SMOTE
        // =========================
        $smote_train = Session::get('smote_data');

        $smote = new NaiveBayesService();
        $smote->train($smote_train);
        $pred_smote = $smote->predict($test);

        // =========================
        // ROS
        // =========================
        $ros_train = Session::get('ros_data');

        $ros = new NaiveBayesService();
        $ros->train($ros_train);
        $pred_ros = $ros->predict($test);

        // =========================
        // ACCURACY
        // =========================
        $nb_acc     = $this->accuracy($pred_nb);
        $smote_acc  = $this->accuracy($pred_smote);
        $ros_acc    = $this->accuracy($pred_ros);

        $result = Session::get('prediksi_result');
        $hasResult = !empty($result);

        Session::set('prediksi_result', [
            'test' => $test,
            'nb' => $pred_nb,
            'smote' => $pred_smote,
            'ros' => $pred_ros,
            'accuracy' => [
                'nb' => $nb_acc,
                'smote' => $smote_acc,
                'ros' => $ros_acc
            ]
        ]);

        $this->view('prediksi/index', [
            'result' => Session::get('prediksi_result'),
            'user' => $user,
            'hasResult' => $hasResult
        ]);
    }
}
