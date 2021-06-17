<?php

class Register extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar';

        $this->view('templates/auth/header', $data);
        $this->view('dashboard/auth/register');
        $this->view('templates/auth/footer');
    }

    public function store()
    {
        $checkEmail = $this->model('UserModel')->getUserByEmail($_POST);
        $checkUsername = $this->model('UserModel')->getUserByUsername($_POST);

        if (!empty($checkEmail)) {
            FlashSession::setFlash('Gagal', 'Alamat surel sudah terdaftar', 'danger');
            header('Location: ' . BASE_URL . 'auth/register');
            exit;
        }

        if (!empty($checkUsername)) {
            FlashSession::setFlash('Gagal', 'Username sudah digunakan', 'danger');
            header('Location: ' . BASE_URL . 'auth/register');
            exit;
        }

        if ($this->model('UserModel')->storeUser($_POST) > 0) {
            FlashSession::setFlash('Selamat', 'Registrasi berhasil, silahkan masuk!', 'success');
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    }
}
