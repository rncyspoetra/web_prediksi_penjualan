<?php
require_once __DIR__ . '/../models/AdminModel.php';
require_once __DIR__ . '/../core/Session.php';

class AuthController {

    public function login()
    {
        Session::start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $adminModel = new AdminModel();
            $user = $adminModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {

                Session::set('user', $user);
                header("Location: /web_prediksi_penjualan/public/dashboard");
                exit;
            } else {
                $error = "Username atau password salah!";
            }
        }

        require dirname(__DIR__, 2) . '/views/auth/login.php';
    }

    public function logout()
    {
        Session::start();
        Session::destroy();
        header("Location: /web_prediksi_penjualan/public/login");
    }
}