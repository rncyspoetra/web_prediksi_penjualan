<?php

$routes = [

    // AUTH
    '/login' => ['AuthController', 'login'],
    '/logout' => ['AuthController', 'logout'],

    // DASHBOARD
    '/dashboard' => ['DashboardController', 'index'],

    // PENJUALAN
    '/penjualan' => ['PenjualanController', 'index'],
    '/penjualan/store' => ['PenjualanController', 'store'],
    '/penjualan/delete' => ['PenjualanController', 'delete'],
    '/penjualan/update' => ['PenjualanController', 'update'],

    // PREPROCESSING
    '/preprocessing' => ['PreprocessingController', 'index'],
    '/preprocessing/process' => ['PreprocessingController', 'process'],

    // PREDIKSI
    '/prediksi' => ['PrediksiController', 'index'],
    '/prediksi/process' => ['PrediksiController', 'process'],
];