<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.min.css') ?>">
    <!-- Atlantis Css -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/atlantis.min.css') ?>">
    <!-- AOS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/js/plugin/aos/dist/aos.css') ?>">
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/fonts.min.css') ?>">

    <title>Dashboard | <?= ucfirst($this->session->userdata('level')) ?></title>
    <?php $foto = $this->session->userdata('foto') ? $this->session->userdata('foto') : 'public/assets/img/blank_user.png'; ?>
</head>

<body>
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo Header -->
            <div class="logo-header text-center" data-background-color="white">

                <a href="<?= base_url() ?>" class="logo">
                    <img src="<?= base_url('public/assets/img/ebs-logo.png') ?>" alt="navbar brand" class="navbar-brand h-75">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu "></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">4</span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">You have 4 new notification</div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        New user registered
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Rahmad commented on Admin
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="<?= base_url('public/assets/img/blank_user.png') ?>" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Reza send messages to you
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Farrah liked Admin
                                                    </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="<?= base_url($foto) ?>" alt="" class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="<?= base_url($foto) ?>" alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4><?= $this->session->userdata('nama') ?></h4>
                                                <p class="text-muted"><?= $this->session->userdata('email') ?></p>
                                                <button class="btn btn-xs btn-secondary"><?= rupiah($this->session->userdata('saldo')) ?></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Profil Ku</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </header>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <!-- User Panel -->
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="<?= base_url($foto) ?>" alt="" class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <?= $this->session->userdata('nama') ?>
                                    <span class="user-level"><?= ucfirst($this->session->userdata('level')) ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- End User Panel -->
                    <ul class="nav nav-primary">
                        <li class="nav-item <?= @$dash_active ?>">
                            <a href="<?= base_url() ?>">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <?php if ($this->auth->is_level('admin')) : ?>
                        <li class="nav-item <?= @$petugas_active ?>">
                            <a href="<?= base_url('user/petugas') ?>">
                                <i class="fas fa-user-tie"></i>
                                <p>Petugas</p>
                            </a>
                        </li>
                        <li class="nav-item <?= @$kantin_active ?>">
                            <a href="<?= base_url('user/kantin') ?>">
                                <i class="fas fa-store"></i>
                                <p>Kantin</p>
                            </a>
                        </li>
                        <li class="nav-item <?= @$siswa_active ?>">
                            <a href="<?= base_url('user/siswa') ?>">
                                <i class="fas fa-user-graduate"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item <?= @$guru_active ?>">
                            <a href="<?= base_url('user/guru') ?>">
                                <i class="fas fa-briefcase"></i>
                                <p>Guru</p>
                            </a>
                        </li>
                        <?php elseif ($this->auth->is_level('bmt')) : ?>
                        <li class="nav-item <?= @$nabung_active ?>">
                            <a href="<?= base_url('saldo/push') ?>">
                                <i class="fas fa-piggy-bank"></i>
                                <p>Menabung</p>
                            </a>
                        </li>
                        <li class="nav-item <?= @$tarik_active ?>">
                            <a href="<?= base_url('saldo/pull') ?>">
                                <i class="fas fa-money-bill-wave"></i>
                                <p>Tarik Tunai</p>
                            </a>
                        </li>
                        <?php elseif ($this->auth->is_level(['seragam', 'atk', 'kantin'])) : ?>
                        <li class="nav-item <?= @$item_active ?>">
                            <a href="<?= base_url('toko/item') ?>">
                                <i class="fas fa-list-alt"></i>
                                <p>Item</p>
                            </a>
                        </li>
                        <?php elseif ($this->auth->is_level(['seragam', 'atk', 'kantin', 'print'])) : ?>
                        <li class="nav-item <?= @$pesanan_active ?>">
                            <a href="<?= base_url('pesanan/') ?>">
                                <i class="fas fa-list-alt"></i>
                                <p>Pesanan</p>
                            </a>
                        </li>
                        <?php elseif ($this->auth->is_level(['siswa', 'guru'])) : ?>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>">
                                <i class="fas fa-book"></i>
                                <p>Tabunganku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('saldo/transfer') ?>">
                                <i class="fas fa-exchange-alt"></i>
                                <p>Transfer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>">
                                <i class="fas fa-store"></i>
                                <p>Jajan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>">
                                <i class="fas fa-pencil-ruler"></i>
                                <p>ATK</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>">
                                <i class="fas fa-print"></i>
                                <p>Print</p>
                            </a>
                        </li>
                            <?php if ($this->auth->is_level('siswa')) : ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>">
                                    <i class="fas fa-user-tie"></i>
                                    <p>Seragam</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>">
                                    <i class="fas fa-receipt"></i>
                                    <p>SPP</p>
                                </a>
                            </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <section class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title"><?= $title ?></h4>
                        <?php if (@$breadcrumbs) : ?>
                        <ul class="breadcrumbs">
                            <li class="nav-home"><a href="<?= base_url() ?>"><i class="flaticon-home"></i></a></li>
                            <?php foreach ($breadcrumbs as $b) : ?>
                            <li class="sperator"><i class="flaticon-right-arrow"></i></li>
                            <li>
                                <?php if (@$b[1]) : ?>
                                <a href="<?= base_url(@$b[1]) ?>"><?= ucfirst($b[0]) ?></a>
                                <?php else : ?>
                                <a href="#"><?= ucfirst($b[0]) ?></a>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <?= $content ?>
                </div>
        </section>

    </div>

    <!-- JQuery -->
    <script src="<?= base_url('public/assets/js/core/jquery.3.2.1.min.js') ?>"></script>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('public/assets/js/core/bootstrap.min.js') ?>"></script>

    <!-- Popper -->
    <script src="<?= base_url('public/assets/js/core/popper.min.js') ?>"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url('public/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url('public/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

    <!-- SweetAlert -->
    <script src="<?= base_url('public/assets/js/plugin/sweetalert/sweetalert.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/alert.js') ?>"></script>

    <!-- Datatables -->
    <script src="<?= base_url('public/assets/js/plugin/datatables/datatables.min.js') ?>"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url('public/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url('public/assets/js/plugin/sweetalert/sweetalert.min.js') ?>"></script>

    <!-- Atlantis JS -->
    <script src="<?= base_url('public/assets/js/atlantis.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            let readUrl = function(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $('.user-avatar').attr('src', e.target.result);
                        $('.user-avatar').removeClass('invisible');
                        $('.user-avatar').next().addClass('d-none');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('.upload-foto').on('change', function() {
                console.log(readUrl(this));
                console.log(this.files);
            });

            let formatRupiah = function(angka) {
                let number_string = angka.replace(/[^,\d]/g, '').toString();
                let split = number_string.split(',');
                let sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return rupiah;
            }

            $('.input-rupiah').on('input', function() {
                let value = $(this).val();
                let nominal = formatRupiah(value);
                $(this).val(nominal);
            });

            $('.basic-form').submit(function() {
                let form_data = new FormData(this);
                let url_action = $(this).attr('action');

                if ($(this).hasClass('form-nominal')) {
                    let rupiah = $('.input-rupiah').val();
                    let jml_tabung = parseInt(rupiah.replace(/[.,]/g, ''));
                    $('.input-rupiah').val(jml_tabung);

                    form_data.append('jml_tabung', jml_tabung);
                }

                for (var value of form_data.values()) {
                    console.log(value);
                }

                $.ajax({
                    url: url_action,
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(result) {
                        alertResponse(result);
                    }
                })

                return false;
            });

            $('.form-image').submit(function() {
                let file_data = $('.upload-foto').prop('files')[0];
                let file_upload_name = $('.upload-foto').attr('name');
                let form_data = new FormData(this);
                let url_action = $(this).attr('action');

                if (file_data !== undefined) {
                    form_data.append(file_upload_name, file_data);
                }

                $(this).serialize();

                // $.ajax({
                //     url: url_action,
                //     contentType: false,
                //     processData: false,
                //     data: form_data,
                //     type: 'post',
                //     success: function(result) {
                //         alertResponse(result);
                //     }
                // });

                return false;
            });

            $('.alert-confirm').click(function() {
                let url = $(this).attr('href');

                alertConfirm(url);

                return false;
            });

            $('.back').click(function() {
                window.history.back();
            });

            $('.datatable').DataTable();
        });
    </script>
</body>

</html> 