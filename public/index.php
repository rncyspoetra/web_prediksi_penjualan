<?php

require_once '../routes/web.php';

define('BASE_URL', '/web_prediksi_penjualan/public');

// ambil URL
$uri = str_replace('/web_prediksi_penjualan/public', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uri = rtrim($uri, '/') ?: '/login';

// cek route
if (array_key_exists($uri, $routes)) {

    $controllerName = $routes[$uri][0];
    $method = $routes[$uri][1];

    require_once "../app/controllers/$controllerName.php";

    $controller = new $controllerName();
    $controller->$method();

} else {
    echo "404 - Halaman tidak ditemukan";
}