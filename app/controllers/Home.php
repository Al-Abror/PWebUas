<?php
class Home extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        $this->view('templates/front/header', $data);
        $this->view('front/home/index');
        $this->view('templates/front/footer');
    }
}
