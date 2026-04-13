<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Session.php';
require_once __DIR__ . '/../models/PenjualanModel.php';

class PenjualanController extends Controller {

    public function index()
    {
        Session::start();

        if (!Session::check()) {
            $this->redirect('/web_prediksi_penjualan/public/login');
        }

        $model = new PenjualanModel();
        $data = $model->getAll();

        $user = Session::get('user');

        $this->view('penjualan/index', compact('data', 'user'));
    }

    public function store()
    {
        Session::start();

        $model = new PenjualanModel();

        $model->insert([
            'id_admin' => Session::get('user')['id_admin'],
            'bulan' => $_POST['bulan'],
            'shif' => $_POST['shif'],
            'pentol' => $_POST['pentol'],
            'frozen' => $_POST['frozen'],
            'status' => $_POST['status']
        ]);

        Session::set('success', 'Data berhasil ditambahkan');

        $this->redirect('/web_prediksi_penjualan/public/penjualan');
    }

    public function update()
    {
        $model = new PenjualanModel();
        Session::start();

        $model->update([
            'id' => $_POST['id'],
            'bulan' => $_POST['bulan'],
            'shif' => $_POST['shif'],
            'pentol' => $_POST['pentol'],
            'frozen' => $_POST['frozen'],
            'status' => $_POST['status']
        ]);

        Session::set('success', 'Data berhasil diupdate');

        $this->redirect('/web_prediksi_penjualan/public/penjualan');
    }

    public function delete()
    {
        $model = new PenjualanModel();
        $model->delete($_GET['id']);

        Session::set('success', 'Data berhasil dihapus');

        $this->redirect('/web_prediksi_penjualan/public/penjualan');
    }
}