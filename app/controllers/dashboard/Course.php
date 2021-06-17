<?php

class Course extends Controller
{
    public function index()
    {
        if ($_SESSION['user']['role'] == 'member') {
            $mineCourse = $this->model('CourseMemberModel')->getByUser($_SESSION['user']['user_id']);
            $course_id = implode(" ", array_column($mineCourse, 'course_id'));
            if (!empty($course_id)) {
                $dataCourse = $this->model('CourseModel')->mineCourse($course_id);
            } else {
                $dataCourse = [];
            }
        } else {
            $dataCourse = $this->model('CourseModel')->getAll();
        }

        $data = [
            'title' => 'Manajemen Kursus',
            'menu_course' => true,
            'data_course' => $dataCourse
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/course/index', $data);
        $this->view('templates/dashboard/footer');
    }

    public function detail($id)
    {
        $course = $this->model('CourseModel')->find($id);
        $modules = $this->model('ModuleModel')->getModuleByCourse($id);

        $data = [
            'title' => 'Detail Kursus',
            'menu_course' => true,
            'course' => $course,
            'modules' => $modules
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/course/detail', $data);
        $this->view('templates/dashboard/footer');
    }

    public function create()
    {
        if ($_SESSION['user']['role'] == 'member') {
            header('Location: ' . BASE_URL . 'dashboard');
            FlashSession::setFlash('Akses Ditolak', 'Anda tidak bisa mengakses resource tersebut', 'danger');
            exit;
        }

        $data = [
            'title' => 'Buat Kursus',
            'menu_course' => true,
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/course/create', $data);
        $this->view('templates/dashboard/footer');
    }

    public function store()
    {
        if ($this->model('CourseModel')->store($_POST) > 0) {
            FlashSession::setFlash('Berhasil', 'Kursus baru telah ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'dashboard/course');
            exit;
        }
    }

    public function update()
    {
        $id = $_POST['course_id'];
        try {
            $this->model('CourseModel')->update($_POST, $id);
            FlashSession::setFlash('Berhasil', 'Data kursus berhasil diperbarui', 'success');
            header('Location: ' . BASE_URL . 'dashboard/course/detail/' . $id);
            exit;
        } catch (\Throwable $th) {
            FlashSession::setFlash('Gagal', 'Terjadi kesalahan saat update data', 'danger');
            header('Location: ' . BASE_URL . 'dashboard/course/detail/' . $id);
            exit;
        }
    }

    public function delete($id)
    {
        try {
            $this->model('CourseModel')->delete($id);
            FlashSession::setFlash('Berhasil', 'Kursus berhasil dihapus', 'success');
            header('Location: ' . BASE_URL . 'dashboard/course');
            exit;
        } catch (\Throwable $th) {
            FlashSession::setFlash('Gagal', 'Terjadi kesalahan saat hapus data', 'danger');
            header('Location: ' . BASE_URL . 'dashboard/course');
            exit;
        }
    }
}
