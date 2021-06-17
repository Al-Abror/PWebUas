<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="http://localhost/simbel-mvc/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/simbel-mvc/public/assets/css/style.css">
    <script src="http://localhost/simbel-mvc/public/assets/js/jquery-3.2.1.min.js"></script>
    <title><?= $data['title'] ?> | Simple Membership System</title>
</head>

<body>
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <h3>
                        <a href="/simbel-mvc/public/">Sistem Informasi Bimbingan Belajar Taman Kita</a>
                    </h3>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="<?= BASE_URL?>">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL?>auth/login">Masuk</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL?>auth/register">Daftar</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>