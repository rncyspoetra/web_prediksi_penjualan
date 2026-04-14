<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Session.php';
require_once __DIR__ . '/../models/PenjualanModel.php';
require_once __DIR__ . '/../services/PythonApiService.php';

class PreprocessingController extends Controller
{
    public function index()
    {
        Session::start();

        if (!Session::check()) {
            $this->redirect('/web_prediksi_penjualan/public/login');
            exit;
        }

        $user = Session::get('user');

        $this->view('preprocessing/index', compact('user'));
    }

    public function process()
    {
        Session::start();

        // 1. ambil data
        $model = new PenjualanModel();
        $data = $model->getAllForPython();


/*         echo "<pre>";
        print_r($data);
        exit; */

        // 2. kirim ke python
        $api = new PythonApiService();
        $result = $api->send($data);

        /* echo "<pre>";
        print_r($result);
        exit; */

        // 3. simpan ke session
        Session::set('test_data', $result['test']);
        Session::set('smote_data', $result['smote']);
        Session::set('ros_data', $result['ros']);
        Session::set('train_data', $result['train']);


        // 4. kembali ke halaman
        $this->redirect('/web_prediksi_penjualan/public/preprocessing');
    }
}
