<?php

if (isset($_SESSION['user_id'])) {
    header('Location: '.BASE_URL.'dashboard/landing');
    exit;
}

class Login extends Controller
{
    public function index(){
        $data['title'] = 'Masuk';
        $this->view('templates/auth/header', $data);
        $this->view('dashboard/auth/login');
        $this->view('templates/auth/footer');
    }

    public function process(){
        $getUser = $this->model('UserModel')->getUserByEmail($_POST);
        
        if(password_verify($_POST['password'], $getUser['password'])){
            $_SESSION['user'] = [
                'user_id' => $getUser['user_id'],
                'name' => $getUser['name'],
                'email' => $getUser['email'],
                'role' => $getUser['role']
            ];
            header('Location: '.BASE_URL.'dashboard');
            exit;
        }else{
            FlashSession::setFlash('Gagal', 'Alamat surel / sandi salah', 'danger');
            header('Location: '.BASE_URL.'auth/login');
            exit;
        }
    }

}
