<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.min.css') ?>">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/custom_front.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/fonts.min.css') ?>">

    <title>Daftar | E-Banking Sekolah</title>
</head>

<body class="bg-purple">
    <div class="wrapper">
        <div class="container">
            <div class="mt-5">
                <h1 class="pt-5 text-center text-white">Daftar Sebagai</h1>
                <div class="row">
                    <div class="col-md-4 col-sm-12 text-center mt-5">
                        <a href="<?= base_url('daftar/kantin') ?>" class="mt-5">
                            <img src="<?= base_url('public/assets/img/waitress.png') ?>" alt="" class="w-50 rounded-circle bg-light p-2">
                            <h3 class="text-capitalize text-white pt-1 text-decoration-none">kantin</h3>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-12 text-center mt-5">
                        <a href="<?= base_url('daftar/siswa') ?>" class="mt-5">
                            <img src="<?= base_url('public/assets/img/graduated.png') ?>" alt="" class="w-50 rounded-circle bg-light p-2">
                            <h3 class="text-capitalize text-white pt-1 text-decoration-none">siswa</h3>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-12 text-center mt-5">
                        <a href="<?= base_url('daftar/guru') ?>" class="mt-5">
                            <img src="<?= base_url('public/assets/img/teacher.png') ?>" alt="" class="w-50 rounded-circle bg-light p-2">
                            <h3 class="text-capitalize text-white pt-1 text-decoration-none">guru</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script src="<?= base_url('public/assets/js/core/jquery.3.2.1.min.js') ?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?= base_url('public/assets/js/core/bootstrap.min.js') ?>"></script>
    <!-- Custom JS -->
    <script src="<?= base_url('public/assets/js/custom_front.js') ?>"></script>
</body>

</html> 