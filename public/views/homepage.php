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
    <!-- AOS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/js/plugin/aos/dist/aos.css') ?>">
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/fonts.min.css') ?>">

    <title>EBS | E-Banking Sekolah</title>
</head>

<body class="vw-100">
    <div class="wrapper">
        <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark bg-purple vw-100">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url('public/assets/img/ebs-logo-white.png') ?>" alt="" height="45px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav ml-auto text-right">
                        <li class="nav-item pt-1 active">
                            <a class="nav-link text-uppercase" href="#">Beranda</a>
                        </li>
                        <li class="nav-item pt-1">
                            <a class="nav-link text-uppercase" href="#about">Tentang</a>
                        </li>
                        <li class="nav-item pt-1">
                            <a class="nav-link text-uppercase" href="#">Layanan</a>
                        </li>
                        <li class="nav-item pt-1">
                            <a class="nav-link text-uppercase" href="#contact">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="<?= base_url('login') ?>">
                                <span class="btn btn-success btn-rounded px-4 btn-sm">Masuk</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="pb-5">
            <!-- <div class="container"> -->
            <div class="sliders text-white">
                <div class="banner-background" data-lazy-background="<?= base_url('public/assets/img/banner-3.png') ?>">
                    <h3 class="text-uppercase banner-title" data-pos="['0%', '9.2%', '30%', '9.2%']" data-duration="700" data-effect="move">
                        Mulailah Menabung
                    </h3>
                    <p class="banner-content" data-pos="['40%', '0%', '40%', '9.2%']" data-duration="700" data-effect="move">
                        Dengan Elekrionik Bank Sekolah (EBS) kamu dapat <br>belajar mengelola keuanganmu dengan <br>lebih mudah cepat dan aman
                    </p>
                    <button class="btn btn-success banner-button" data-pos="['100%', '9.2%', '65%', '9.2%']" data-duration="700" data-effect="move">
                        <h4 class="uppercase">Mulai Sekarang</h4>
                    </button>

                    <div class="img-banner" data-pos="['15%', '56%']" data-duration="700" data-delay="500" data-effect="fadein">
                        <img src="<?= base_url('public/assets/img/imgbanner3.png') ?>" alt="" height="300px">
                    </div>
                </div>
                <div class="banner-background" data-lazy-background="<?= base_url('public/assets/img/banner-3.png') ?>">
                    <h3 class="text-uppercase banner-title" data-pos="['0%', '56%', '30%', '45%']" data-duration="700" data-effect="move">
                        Mulailah Menabung
                    </h3>
                    <p class="banner-content" data-pos="['40%', '100%', '40%', '45%']" data-duration="700" data-effect="move">
                        Dengan Elekrionik Bank Sekolah (EBS) kamu dapat <br>belajar mengelola keuanganmu dengan <br>lebih mudah cepat dan aman
                    </p>
                    <button class="btn btn-success banner-button" data-pos="['100%', '50%', '65%', '45%']" data-duration="700" data-effect="move">
                        <h4 class="uppercase">Mulai Sekarang</h4>
                    </button>

                    <div class="img-banner" data-pos="['15%', '8%']" data-duration="700" data-delay="500" data-effect="fadein">
                        <img src="<?= base_url('public/assets/img/imgbanner3.png') ?>" alt="" height="300px">
                    </div>
                </div>
            </div>
            <!-- <div class="slider-banner text-white py-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 pt-5">
                            <h1 class="text-uppercase">Mulailah Menabung</h1>
                            <p>Dengan Elekrionik Bank Sekolah (EBS) kamu dapat belajar mengelola keuanganmu dengan lebih mudah cepat dan aman</p>

                            <div class="button-container py-3">
                                <button class="btn btn-success bg-gradient-success btn-rounded px-4 text-white">
                                    <h4 class="text-uppercase">Mulai Sekarang</h4>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 d-sm-none d-md-block text-center">
                            <img src="<?= base_url('public/assets/img/imgbanner3.png') ?>" alt="" height="300px">
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->
        </header>

        <section id="about" class="py-5">
            <div class="container">
                <h3 class="section-title text-uppercase text-center pb-2" data-aos="fade-down">
                    Tentang
                    <div class="divider mt-2"></div>
                </h3>

                <p class="text-center" data-aos="fade-up">
                    Elekrionik Bank Sekolah (EBS) merupakan sistem untuk menabung yang dikembangkan khusus untuk lingkungan pendidikan/sekolah. <br>
                    Dengan sistem ini siswa tidak perlu takut kehilangan uang karena kami menjamin keamanan pada uang siswa. <br>
                    Dan bagi orang tua, sistem ini dapat memberitau apa saja yang dilakukan oleh siswa dengan uangnnya.
                </p>
            </div>
        </section>

        <section id="features" class="py-5">
            <h3 class="section-title text-uppercase text-center pb-2" data-aos="fade-down">
                Kelebihan
                <div class="divider mt-2"></div>
            </h3>

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 pb-4">
                        <div class="card shadow border-top" data-aos="zoom-in-right">
                            <div class="card-body text-center">
                                <i class="fa fa- fa-10x color-green py-2"></i>
                                <h4>Mudah</h4>
                                <p>Memudahkan siswa melakukan kegiatan transaksi di sekolah</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 pb-4">
                        <div class="card shadow border-top" data-aos="zoom-in-up">
                            <div class="card-body text-center">
                                <i class="fa fa- fa-10x color-green py-2"></i>
                                <h4>Cepat</h4>
                                <p>Menghemat waktu melakukan kegiatan transaksi di sekolah</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 pb-4">
                        <div class="card shadow border-top" data-aos="zoom-in-left">
                            <div class="card-body text-center">
                                <i class="fa fa- fa-10x color-green py-2"></i>
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
                            <div class="card border-top-0 border-left-0 border-bottom-0 border-right rounded-0 bg-transparent" data-aos="fade-right">
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
                            <div class="card border-0 bg-transparent pl-2" data-aos="fade-left">
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
            <h3 class="section-title text-uppercase text-center pb-2" data-aos="fade-down">
                Data Tabungan
                <div class="divider mt-2"></div>
            </h3>

            <div class="container">
                <div class="row">
                    <div class="col col-md-6 col-sm-12 pb-3">
                        <div class="card bg-success" data-aos="flip-left">
                            <div class="card-body text-white">
                                <h4 class="card-title text-uppercase text-center">Tertinggi</h4>

                                <ul class="list-unstyled">
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#1</h5>
                                        <img src="<?= base_url('') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Nama</h5>
                                            <p class="font-weght-lighter">Kelas</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#1</h5>
                                        <img src="<?= base_url('') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Nama</h5>
                                            <p class="font-weght-lighter">Kelas</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#1</h5>
                                        <img src="<?= base_url('') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Nama</h5>
                                            <p class="font-weght-lighter">Kelas</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 col-sm-12 pb-3">
                        <div class="card bg-danger" data-aos="flip-right">
                            <div class="card-body text-white">
                                <h4 class="card-title text-uppercase text-center">Terendah</h4>

                                <ul class="list-unstyled">
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#1</h5>
                                        <img src="<?= base_url('') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Nama</h5>
                                            <p class="font-weght-lighter">Kelas</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#1</h5>
                                        <img src="<?= base_url('') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Nama</h5>
                                            <p class="font-weght-lighter">Kelas</p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <h5 class="pt-4 ml-md-5 ml-sm-1 mr-3">#1</h5>
                                        <img src="<?= base_url('') ?>" alt="" class="rounded-circle bg-light mr-3 mb-3" width="100px" height="100px">
                                        <div class="media-body pt-4">
                                            <h5 class="mt-0 mb-1">Nama</h5>
                                            <p class="font-weght-lighter">Kelas</p>
                                        </div>
                                    </li>
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
            <h3 class="section-title text-uppercase text-center pb-2" data-aos="fade-down">
                Kontak Kami
                <div class="divider mt-2"></div>
            </h3>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card shadow" data-aos="zoom-in">
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
                                                            <button type="submit" class="btn btn-success btn-block bt-lg">
                                                                <h5>Kirim Pesan</h5>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-3 col-sm-12 p-3 bg-success text-white">
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

        <span class="back-to-top invisible fixed-bottom bg-success shadow rounded-circle m-2 px-3 py-2 float-right">
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
    <!-- Devrama Slider -->
    <script src="<?= base_url('public/assets/js/plugin/devrama-slider/jquery.devrama.slider.min.js') ?>"></script>
    <!-- AOS -->
    <script src="<?= base_url('public/assets/js/plugin/aos/dist/aos.js') ?>"></script>
    <!-- Custom JS -->
    <script src="<?= base_url('public/assets/js/custom_front.js') ?>"></script>
</body>

</html> 