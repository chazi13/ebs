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
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/fonts.min.css') ?>">

    <title>EBS | E-Banking Sekolah</title>
</head>

<body class="vw-100">
    <div class="wrapper">
        <nav id="navbar" class="navbar fixed-top navbar-teal navbar-expand-lg navbar-dark bg-purple vw-100">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url('public/assets/img/ebs-logo-white.png') ?>" alt="" height="45px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav ml-auto text-right">
                        <li class="nav-item pt-1 mx-3 active">
                            <a class="nav-link text-uppercase" href="" element-target="#banner" onclick="return false">Beranda</a>
                        </li>
                        <li class="nav-item pt-1 mx-3 non-active">
                            <a class="nav-link text-uppercase" href="" element-target="#about" onclick="return false">Tentang</a>
                        </li>
                        <li class="nav-item pt-1 mx-3 non-active">
                            <a class="nav-link text-uppercase" href="" element-target="#promotion" onclick="return false">Promo</a>
                        </li>
                        <li class="nav-item pt-1 mx-3 non-active">
                            <a class="nav-link text-uppercase" href="" element-target="#contact" onclick="return false">Kontak</a>
                        </li>
                        <li class="nav-item ml-3">
                            <a class="nav-link text-uppercase" href="<?= base_url('login') ?>">
                                <span class="btn btn-bg-custom btn-rounded px-4 btn-sm">Masuk</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header id="banner" class="mt-5">
            <div class="bg-image mt-2 pt-5 pb-5">
                <div class="container pt-5 pb-3">
                    <div class="col-md-6 col-sm-12 pt-5 pb-3">
                        <div class="content mb-3">
                            <h1 class="banner-title text-uppercase">Mulailah Menabung</h1>
                            <p class="banner-content">
                                Dengan Elekrionik Bank Sekolah (EBS) kamu dapat belajar mengelola keuanganmu dengan lebih aman, mudah, dan cepat
                            </p>
                        </div>

                        <button class="btn background btn-rounded banner-button mt-3 px-4 shadow shadow-animate">
                            <a href="<?= base_url('daftar/pilih') ?> " class="text-decoration-none text-white hover-animate">
                                <h4 class="uppercase">Mulai Sekarang</h4>
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <section id="about" class="py-5 bg-light">
            <div class="container">
                <h3 class="section-title text-uppercase text-center pb-2">
                    Tentang
                    <div class="divider my-2"></div>
                </h3>

                <p class="text-center">
                    Elekrionik Bank Sekolah (EBS) merupakan sistem untuk menabung yang dikembangkan khusus untuk lingkungan pendidikan/sekolah. <br>
                    Dengan sistem ini siswa tidak perlu takut kehilangan uang karena kami menjamin keamanan pada uang siswa. <br>
                    Dan bagi orang tua, sistem ini dapat memberitau apa saja yang dilakukan oleh siswa dengan uangnnya.
                </p>
            </div>
        </section>

        <section id="features" class="py-5">
            <h3 class="section-title text-uppercase text-center pb-2">
                Kelebihan
                <div class="divider my-2"></div>
            </h3>

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 pb-4 px-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center">
                                <img src="<?= base_url('public/assets/img/icon_1.png') ?>" alt="" class="w-25 my-3">
                                <h4>Mudah</h4>
                                <p>Memudahkan siswa melakukan kegiatan transaksi di sekolah</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 pb-4 px-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center">
                                <img src="<?= base_url('public/assets/img/icon_2.png') ?>" alt="" class="w-25 my-3">
                                <h4>Cepat</h4>
                                <p>Menghemat waktu melakukan kegiatan transaksi di sekolah</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 pb-4 px-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center">
                                <img src="<?= base_url('public/assets/img/icon_3.png') ?>" alt="" class="w-25 my-3">
                                <h4>Aman</h4>
                                <p>Membantu siswa dalam menjaga dan menyimpan uang di sekolah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="promotion" class="py-5">
            <div class="bg-img-overlay py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card border-top-0 border-left-0 border-bottom-0 border-right rounded-0 bg-transparent">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-4 rounded-circle p-3 bg-light">
                                            <img src="<?= base_url('public/assets/img/tag.png') ?>" alt="" width="100%">
                                        </div>
                                        <div class="col-md-9 col-8 pt-4 pl-4">
                                            <h2 class="bg-success text-uppercase text-white d-inline">
                                                Tabsis
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <p class="text-white big-font">Buka tabunganmu di EBS sekarang dan upgrade alat - alat tulismu dengan alat tulis baru secara gratis!!!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="card border-0 bg-transparent pl-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-4 rounded-circle p-3 bg-light">
                                            <img src="<?= base_url('public/assets/img/bargains.png') ?>" alt="" width="100%">
                                        </div>
                                        <div class="col-md-9 col-8 pt-4 pl-4">
                                            <h2 class="bg-danger text-uppercase text-white d-inline">
                                                Cashsis
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <p class="text-white big-font">Promo PAYDAY EBS Mei 2019, nikmati cashback hingga 50% di akhir bulan dari ratusan rekan usaha favorit pakai EBS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="data-depo" class="py-5">
            <h3 class="section-title text-uppercase text-center pb-2">
                Data Tabungan
                <div class="divider my-2"></div>
            </h3>

            <div class="container">
                <div class="row">
                    <div class="col col-md-5 col-sm-12 pb-3 offset-md-1">
                        <div class="card background">
                            <div class="card-body text-white">
                                <h4 class="card-title text-uppercase text-center">Tertinggi</h4>

                                <ul class="list-unstyled">
                                    <?php foreach ($tertinggi as $i => $tt) : ?>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#<?= ($i + 1) ?></h5>
                                        <img src="<?= base_url($tt->foto) ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1"><?= $tt->nama ?></h5>
                                            <p class="font-weght-lighter"><?= $tt->kelas ?></p>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                    <!-- <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#1</h5>
                                        <img src="<?= base_url('public/assets/img/dinda.jpg') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Dinda Rahayu</h5>
                                            <p class="font-weght-lighter">XII Pariwisata</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#2</h5>
                                        <img src="<?= base_url('public/assets/img/cewe.jpg') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Auliya Damaiyanti</h5>
                                            <p class="font-weght-lighter">XII Multimedia</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#3</h5>
                                        <img src="<?= base_url('public/assets/img/cewe-1.jpg') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Adinda Khalisa</h5>
                                            <p class="font-weght-lighter">XI Pariwisata</p>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5 col-sm-12 pb-3">
                        <div class="card background-danger">
                            <div class="card-body text-white">
                                <h4 class="card-title text-uppercase text-center">Terendah</h4>

                                <ul class="list-unstyled">
                                    <?php foreach ($terendah as $i => $tr) : ?>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#<?= ($i + 1) ?></h5>
                                        <img src="<?= base_url($tr->foto) ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1"><?= $tr->nama ?></h5>
                                            <p class="font-weght-lighter"><?= $tr->kelas ?></p>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                    <!-- <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#1</h5>
                                        <img src="<?= base_url('public/assets/img/cowo.jpg') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Ahmad Rauli</h5>
                                            <p class="font-weght-lighter">X Multimedia</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#2</h5>
                                        <img src="<?= base_url('public/assets/img/cowo-1.jpg') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Ananda Suprianto</h5>
                                            <p class="font-weght-lighter">XII Multimedia</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#1</h5>
                                        <img src="<?= base_url('public/assets/img/cowo-2.jpg') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Aji Priyatna</h5>
                                            <p class="font-weght-lighter">X Pariwisata</p>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="quote" class="py-5">
            <div class="bg-img2-overlay py-3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 class="text-white text-center text-capitalize py-5">
                                Fungsi tabungan bukan untuk kaya, tetapi untuk masa depan
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="py-5">
            <h3 class="section-title text-uppercase text-center pb-2">
                Kontak Kami
                <div class="divider my-2"></div>
            </h3>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12 p-3">
                                                    <h5 class="card-title">Hubungi Kami</h5>
                                                    <form action="<?= base_url() ?>" method="post">
                                                        <div class="form-group form-row mb-0">
                                                            <div class="col-md-6 col-sm-12 mb-3">
                                                                <input type="text" class="form-control bg-grey" name="nama" id="" placeholder="Nama">
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 mb-3">
                                                                <input type="email" class="form-control bg-grey" name="email" id="" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="pesan" id="" rows="10" class="form-control" placeholder="Pesan"></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit" class="btn background-success btn-block bt-lg">
                                                                <h5>Kirim Pesan</h5>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-3 col-sm-12 p-3 background text-white">
                                                    <h5 class="card-title">Info Kontak</h5>
                                                    <div class="row">
                                                        <div class="col-2 text-center">
                                                            <i class="ml-2 la flaticon-placeholder-1 fa-lg"></i>
                                                        </div>
                                                        <div class="col-10">
                                                            <address>
                                                                Jl. Raya Condet, Gedong, Ps. Rebo, Jakarta Timur, 13760
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2 text-center">
                                                            <i class="ml-2 la flaticon-internet fa-lg"></i>
                                                        </div>
                                                        <div class="col-10">
                                                            <address>
                                                                <a href="http://smkn22-jkt.sch.id" class="text-decoration-none text-white">http://smkn22-jkt.sch.id</a>
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <i class="ml-2 la flaticon-whatsapp fa-lg"></i>
                                                        </div>
                                                        <div class="col-10">
                                                            <address>
                                                                (021) 8400 901
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <span class="back-to-top invisible fixed-bottom btn-bg-custom shadow rounded-circle m-2 my-5 px-3 py-2 float-right">
            <a href="#" class="text-white">
                <i class="fas fa-angle-up fa-2x"></i>
            </a>
        </span>

        <footer id="footer" class="pt-5">
            <div class="text-center text-white py-5 bg-purple">
                <h5>EBS.</h5>
                <p>&copy; SMKN 22 Jakarta. All Right Reserved</p>
            </div>
        </footer>
    </div>

    <!-- JQuery -->
    <script src="<?= base_url('public/assets/js/core/jquery.3.2.1.min.js') ?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?= base_url('public/assets/js/core/bootstrap.min.js') ?>"></script>
    <!-- Custom JS -->
    <script src="<?= base_url('public/assets/js/custom_front.js') ?>"></script>
</body>

</html> 