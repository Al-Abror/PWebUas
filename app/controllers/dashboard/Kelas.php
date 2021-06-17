<?php

class Kelas extends Controller
{
    public function index(){
        if ($_SESSION['user']['role'] == 'member') {
            header('Location: ' . BASE_URL . 'dashboard');
            FlashSession::setFlash('Akses Ditolak', 'Anda tidak bisa mengakses resource tersebut', 'danger');
            exit;
        }

        $dataClass = $this->model('KelasModel')->getAll();
        $data = [
            'title' => 'Manajemen Kelas Kursus',
            'menu_class' => true,
            'data_class' => $dataClass
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/class/index', $data);
        $this->view('templates/dashboard/footer');
    }

    public function create(){
        if ($_SESSION['user']['role'] == 'member') {
            header('Location: ' . BASE_URL . 'dashboard');
            FlashSession::setFlash('Akses Ditolak', 'Anda tidak bisa mengakses resource tersebut', 'danger');
            exit;
        }

        $dataCourse = $this->model('CourseModel')->getAll();
        $dataUser = $this->model('UserModel')->getAllMember();
        $data = [
            'title' => 'Daftar Kursus Member',
            'menu_class' => true,
            'data_course' => $dataCourse,
            'data_user' => $dataUser
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/class/create', $data);
        $this->view('templates/dashboard/footer');
    }

    public function store(){
        if($this->model('KelasModel')->exists($_POST['user_id'], $_POST['course_id'])){
            FlashSession::setFlash('Gagal', 'Member sudah terdaftar pada Kursus tersebut', 'danger');
            header('Location: ' . BASE_URL . 'dashboard/kelas');
            exit;
        }
        if ($this->model('KelasModel')->store($_POST) > 0) {
            FlashSession::setFlash('Berhasil', 'Berhasil menambahkan kursus member', 'success');
            header('Location: ' . BASE_URL . 'dashboard/kelas');
            exit;
        }
    }

    public function delete($id){
        try {
            $this->model('KelasModel')->delete($id);
            FlashSession::setFlash('Berhasil', 'Kursus member berhasil dihapus', 'success');
            header('Location: ' . BASE_URL . 'dashboard/kelas');
            exit;
        } catch (\Throwable $th) {
            FlashSession::setFlash('Gagal', 'Terjadi kesalahan saat hapus data', 'danger');
            header('Location: ' . BASE_URL . 'dashboard/kelas');
            exit;
        }
    }
}
