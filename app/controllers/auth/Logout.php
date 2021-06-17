<?php 

class Logout extends Controller {

    public function index() {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: '.BASE_URL);
        exit();
    }
}