<?php

require_once "../models/User.php";

class AuthController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login()
    {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $data = $this->user->getByUsername($username);

            if ($data && password_verify($password, $data['password'])) {

                $_SESSION['user_id'] = $data['id'];
                $_SESSION['username'] = $data['username'];

                header("Location: index.php?page=artis");
                exit;
            }

            $error = "Username atau password salah.";
        }

        include "../views/auth/login.php";
    }

    public function register()
    {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $konfirmasi = $_POST['konfirmasi_password'];

            if ($password !== $konfirmasi) {

                $error = "Konfirmasi password tidak sama.";

            } elseif ($this->user->getByUsername($username)) {

                $error = "Username sudah dipakai, pilih username lain.";

            } else {

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $this->user->tambah($username, $passwordHash);

                header("Location: index.php?page=login&registered=1");
                exit;
            }
        }

        include "../views/auth/register.php";
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location: index.php?page=login");
        exit;
    }
}
