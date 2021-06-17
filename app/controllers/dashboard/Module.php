<?php

class Module extends Controller
{
    public function index()
    {
        if ($_SESSION['user']['role'] == 'member') {
            header('Location: ' . BASE_URL . 'dashboard');
            FlashSession::setFlash('Akses Ditolak', 'Anda tidak bisa mengakses resource tersebut', 'danger');
            exit;
        }

        $dataModule = $this->model('ModuleModel')->getAll();
        $data = [
            'title' => 'Manajemen Modul',
            'menu_module' => true,
            'data_module' => $dataModule
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/module/index', $data);
        $this->view('templates/dashboard/footer');
    }

    public function detail($id)
    {
        $dataCourse = $this->model('CourseModel')->getAll();
        $module = $this->model('ModuleModel')->find($id);

        $data = [
            'title' => 'Detail Kursus',
            'menu_module' => true,
            'data_course' => $dataCourse,
            'module' => $module
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/module/detail', $data);
        $this->view('templates/dashboard/footer');
    }

    public function create()
    {
        if ($_SESSION['user']['role'] == 'member') {
            header('Location: ' . BASE_URL . 'dashboard');
            FlashSession::setFlash('Akses Ditolak', 'Anda tidak bisa mengakses resource tersebut', 'danger');
            exit;
        }

        $dataCourse = $this->model('CourseModel')->getAll();
        $data = [
            'title' => 'Buat Modul',
            'menu_module' => true,
            'data_course' => $dataCourse
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/module/create', $data);
        $this->view('templates/dashboard/footer');
    }

    public function store()
    {
        if ($this->model('ModuleModel')->store($_POST) > 0) {
            FlashSession::setFlash('Berhasil', 'Kursus baru telah ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'dashboard/module');
            exit;
        }
    }

    public function update()
    {
        $id = $_POST['module_id'];
        try {
            $this->model('ModuleModel')->update($_POST, $id);
            FlashSession::setFlash('Berhasil', 'Data modul berhasil diperbarui', 'success');
            header('Location: ' . BASE_URL . 'dashboard/module/detail/' . $id);
            exit;
        } catch (\Throwable $th) {
            FlashSession::setFlash('Gagal', 'Terjadi kesalahan saat update data', 'danger');
            header('Location: ' . BASE_URL . 'dashboard/module/detail/' . $id);
            exit;
        }
    }

    public function delete($id)
    {
        try {
            $this->model('ModuleModel')->delete($id);
            FlashSession::setFlash('Berhasil', 'Modul berhasil dihapus', 'success');
            header('Location: ' . BASE_URL . 'dashboard/module');
            exit;
        } catch (\Throwable $th) {
            FlashSession::setFlash('Gagal', 'Terjadi kesalahan saat hapus data', 'danger');
            header('Location: ' . BASE_URL . 'dashboard/module');
            exit;
        }
    }
}
