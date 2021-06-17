<?php

class Landing extends Controller
{
    public function index()
    {
        $totalMember = $this->model('UserModel')->countMember();
        $totalCourse = $this->model('CourseModel')->count();
        $totalModule = $this->model('ModuleModel')->count();

        $data = [
            'title' => 'Dashboard',
            'menu_dashboard' => true,
            'total_member' => $totalMember,
            'total_course' => $totalCourse,
            'total_module' => $totalModule,
        ];

        $this->view('templates/dashboard/header', $data);
        $this->view('dashboard/landing', $data);
        $this->view('templates/dashboard/footer');
    }
}
