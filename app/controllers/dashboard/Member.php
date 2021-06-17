<?php

class Member extends Controller
{
    public function index(){
        if($_SESSION['user']['role'] == 'member'){
            header('Location: '.BASE_URL.'dashboard');
            FlashSession::setFlash('Akses Ditolak', 'Anda tidak bisa mengakses resource tersebut', 'danger');
            exit;
        }

        $dataMember = $this->model('UserModel')->getAllMember();
        $data = [
            'title' => 'Manajemen Member',
            'menu_member' => true,
            'data_member' => $dataMember
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/member/index', $data);
        $this->view('templates/dashboard/footer');
    }

    public function detail($id){
        $user = $this->model('UserModel')->find($id);
        $data = [
            'title' => 'Detail Member',
            'menu_member' => true,
            'user' => $user
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/member/detail', $data);
        $this->view('templates/dashboard/footer');
    }

    public function create(){
        if($_SESSION['user']['role'] == 'member'){
            header('Location: '.BASE_URL.'dashboard');
            FlashSession::setFlash('Akses Ditolak', 'Anda tidak bisa mengakses resource tersebut', 'danger');
            exit;
        }

        $data = [
            'title' => 'Tambah Member',
            'menu_member' => true
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/member/create', $data);
        $this->view('templates/dashboard/footer');
    }

    public function store()
    {
        $checkEmail = $this->model('UserModel')->getUserByEmail($_POST);
        $checkUsername = $this->model('UserModel')->getUserByUsername($_POST);

        if (!empty($checkEmail)) {
            FlashSession::setFlash('Gagal', 'Alamat surel sudah terdaftar', 'danger');
            header('Location: ' . BASE_URL . 'dashboard/member/create');
            exit;
        }

        if (!empty($checkUsername)) {
            FlashSession::setFlash('Gagal', 'Username sudah digunakan', 'danger');
            header('Location: ' . BASE_URL . 'dashboard/member/create');
            exit;
        }

        if ($this->model('UserModel')->storeUser($_POST) > 0) {
            FlashSession::setFlash('Berhasil', 'Member baru telah ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'dashboard/member');
            exit;
        }
    }

    public function update(){
        $id = $_POST['user_id'];
        try {
            $this->model('UserModel')->update($_POST, $id);
            FlashSession::setFlash('Berhasil', 'Data member berhasil diperbarui', 'success');
            header('Location: '.BASE_URL.'dashboard/member/detail/'.$id);
            exit;
        } catch (\Throwable $th) {
            FlashSession::setFlash('Gagal', 'Terjadi kesalahan saat update data', 'danger');
            header('Location: '.BASE_URL.'dashboard/member/detail/'.$id);
            exit;
        }
    }

    public function delete($id){
        try {
            $this->model('UserModel')->delete($id);
            FlashSession::setFlash('Berhasil', 'Data member berhasil dihapus', 'success');
            header('Location: '.BASE_URL.'dashboard/member');
            exit;
        } catch (\Throwable $th) {
            FlashSession::setFlash('Gagal', 'Terjadi kesalahan saat hapus data', 'danger');
            header('Location: '.BASE_URL.'dashboard/member');
            exit;
        }
    }
}
