<?php

class NaiveBayesService
{
    private array $classes = [];
    private array $prior = [];
    private array $likelihood = [];

    // =========================
    // TRAINING (optional kalau mau extend nanti)
    // =========================
    public function train(array $data, string $labelKey = 'status_penjualan')
    {

        $this->classes = [];

        // hitung class
        foreach ($data as $row) {
            $class = $row[$labelKey];
            $this->classes[$class][] = $row;
        }

        $totalData = count($data);

        // PRIOR PROBABILITY
        foreach ($this->classes as $class => $items) {
            $this->prior[$class] = count($items) / $totalData;
        }

        // LIKELIHOOD
        foreach ($this->classes as $class => $items) {

            $featureCount = [];

            foreach ($items as $row) {
                foreach ($row as $key => $value) {

                    if ($key == $labelKey) continue;

                    $featureCount[$class][$key][$value] =
                        ($featureCount[$class][$key][$value] ?? 0) + 1;
                }
            }

            $this->likelihood[$class] = $featureCount;
        }
    }

    // =========================
    // PREDICT 1 DATA ROW
    // =========================
    public function predictRow(array $row)
    {
        $results = [];

        foreach ($this->prior as $class => $priorProb) {

            $prob = $priorProb;

            foreach ($row as $key => $value) {

                if (!isset($this->likelihood[$class][$key])) {
                    continue;
                }

                $countFeature = $this->likelihood[$class][$key][$value] ?? 0;

                $totalClass = array_sum(array_map('array_sum', $this->likelihood[$class][$key]));

                // 🔥 LAPLACE SMOOTHING
                $prob *= ($countFeature + 1) / ($totalClass + count($this->likelihood[$class][$key]));
            }

            $results[$class] = $prob;
        }
        return $results;
    }

    // =========================
    // PREDICT MANY DATA
    // =========================
    public function predict(array $data)
    {

        $result = [];

        foreach ($data as $row) {

            $prob = $this->predictRow($row);

            // ambil max class
            $pred = array_keys($prob, max($prob))[0];

            $row['prob_tidak_laris'] = $prob['Tidak Laris'] ?? 0;
            $row['prob_laris'] = $prob['Laris'] ?? 0;
            $row['prob_sangat_laris'] = $prob['Sangat Laris'] ?? 0;

            $row['prediksi'] = $pred;

            $result[] = $row;
        }

        return $result;
    }
}
