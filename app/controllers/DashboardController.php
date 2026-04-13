<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Session.php';
require_once __DIR__ . '/../models/PenjualanModel.php';
require_once __DIR__ . '/../models/PrediksiModel.php';

class DashboardController extends Controller {

    public function index()
    {
        Session::start();

        if (!Session::check()) {
            header("Location: /web_prediksi_penjualan/public/login");
            exit;
        }

        $user = Session::get('user');

        $penjualanModel = new PenjualanModel();

        $penjualan = $penjualanModel->countAll();

        // STATUS TERBANYAK
        $statusTerbanyak = $penjualanModel->getStatusTerbanyak();

        $status = $statusTerbanyak ? $statusTerbanyak['status_penjualan'] : '-';

        $this->view('dashboard/index', compact(
            'user',
            'penjualan',
            'status'
        ));
    }
}