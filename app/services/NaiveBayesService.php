<?php

class NaiveBayesService
{

    function naiveBayesPredict($trainData, $testData)
    {
        $results = [];
        $correct = 0;

        // Ambil semua class (status_penjualan)
        $classes = array_unique(array_column($trainData, 'status_penjualan'));

        // Hitung total data training
        $totalTrain = count($trainData);

        // Hitung prior P(class)
        $classCounts = [];
        foreach ($classes as $class) {
            $classCounts[$class] = count(array_filter($trainData, fn($d) => $d['status_penjualan'] == $class));
        }

        foreach ($testData as $test) {
            $probabilities = [];

            foreach ($classes as $class) {

                // Prior
                $prob = $classCounts[$class] / $totalTrain;

                // Likelihood untuk setiap fitur
                foreach (['bulan', 'shift', 'pentol', 'frozen'] as $feature) {

                    $filtered = array_filter($trainData, function ($d) use ($class, $feature, $test) {
                        return $d['status_penjualan'] == $class && $d[$feature] == $test[$feature];
                    });

                    $countFeature = count($filtered);

                    // Untuk menghindari 0 → gunakan Laplace smoothing
                    $uniqueValues = count(array_unique(array_column($trainData, $feature)));

                    $probFeature = ($countFeature + 1) / ($classCounts[$class] + $uniqueValues);

                    $prob *= $probFeature;
                }

                $probabilities[$class] = $prob;
            }

            // Ambil class dengan probabilitas terbesar
            arsort($probabilities);
            $predicted = array_key_first($probabilities);

            // Cek akurasi
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

        $accuracy = ($correct / count($testData)) * 100;

        return [
            'results' => $results,
            'accuracy' => $accuracy
        ];
    }
}
