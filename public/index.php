<?php 
    define('BASE_PATH', dirname(__FILE__));
    if ( !session_id() ) session_start();
    
    require_once '../app/init.php';

    $app = new App;