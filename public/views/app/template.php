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
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/fonts.min.css') ?>">

    <title>Dashboard | <?= ucfirst($this->session->userdata('level')) ?></title>
    <?php $foto = $this->session->userdata('foto') ? $this->session->userdata('foto') : 'public/assets/img/blank_user.png'; ?>
</head>

<style>
    .table.table-custom-padding th,
    .table.table-custom-padding td {
        padding: 10px !important;
    }

    .inline-input {
        border: none;
        border-bottom: solid 1px;
        display: flex;
    }
</style>

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
                                <span class="notification"><?= $this->notif->unread_pesan ?></span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">Kamu Punya <?= $this->notif->unread_pesan ?> Notifikasi</div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <?php foreach ($this->notif->pesan as $pesan) : ?>
                                            <a href="<?= $pesan->url ? base_url($pesan->url) : 'javascript:void(0)' ?>" class="confirm-notif" data-id="<?= $pesan->notif_id ?>">
                                                <div class="notif-img w-25">
                                                    <img src="<?= base_url($pesan->foto) ?>" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        <?= $pesan->pesan ?>
                                                    </span>
                                                    <span class="time"><?= time_past($pesan->tgl_notif) ?></span>
                                                </div>
                                            </a>
                                            <?php endforeach; ?>
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
                            <a href="<?= base_url('dashboard') ?>">
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
                        <?php elseif ($this->auth->is_level(['seragam', 'atk', 'kantin', 'print'])) : ?>
                        <?php if ($this->auth->is_level(['seragam', 'atk', 'kantin'])) : ?>
                        <li class="nav-item <?= @$item_active ?>">
                            <a href="<?= base_url('toko/item') ?>">
                                <i class="fas fa-list-alt"></i>
                                <p>Item</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item <?= @$pesanan_active ?>">
                            <a href="<?= base_url('pesanan/') ?>">
                                <i class="fas fa-list-alt"></i>
                                <p>Pesanan</p>
                                <!-- <?php if ($this->notif->unread_pesan > 0): ?>
                                <span class="badge badge-success"><?= $this->notif->unread_pesan ?></span>
                                <?php endif; ?> -->
                            </a>
                        </li>
                        <?php elseif ($this->auth->is_level(['siswa', 'guru'])): ?>
                        <li class="nav-item <?= @$tabungan_active ?>">
                            <a href="<?= base_url('tabungan') ?>">
                                <i class="fas fa-book"></i>
                                <p>Tabunganku</p>
                            </a>
                        </li>
                        <li class="nav-item <?= @$transfer_active ?>">
                            <a href="<?= base_url('saldo/transfer') ?>">
                                <i class="fas fa-exchange-alt"></i>
                                <p>Transfer</p>
                            </a>
                        </li>
                        <li class="nav-item <?= @$kantin_active ?>">
                            <a href="<?= base_url('kantin') ?>">
                                <i class="fas fa-store"></i>
                                <p>Kantin</p>
                            </a>
                        </li>
                        <li class="nav-item <?= @$atk_active ?>">
                            <a href="<?= base_url('atk') ?>">
                                <i class="fas fa-pencil-ruler"></i>
                                <p>ATK</p>
                            </a>
                        </li>
                        <li class="nav-item <?= @$printing_active ?>">
                            <a href="<?= base_url('printing') ?>">
                                <i class="fas fa-print"></i>
                                <p>Print</p>
                            </a>
                        </li>
                        <?php if ($this->auth->is_level('siswa')) : ?>
                        <li class="nav-item <?= @$seragam_active ?>">
                            <a href="<?= base_url('seragam') ?>">
                                <i class="fas fa-user-tie"></i>
                                <p>Seragam</p>
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

    <!-- Chart JS -->
    <script src="<?= base_url('public/assets/js/plugin/chart.js/chart.min.js') ?>"></script>

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

            $('.select-user').change(function() {
                let val = $(this).val();
                let nama = $(this).find('[value="' + val + '"]').attr('data-nama');

                $('#nama_penerima').val(nama);
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

                console.log(form_data.values);

                $.ajax({
                    url: url_action,
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(result) {
                        console.log(result);
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

                $.ajax({
                    url: url_action,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(result) {
                        console.log(result);
                        alertResponse(result);
                    }
                });

                return false;
            });

            $('.alert-confirm').click(function() {
                let url = $(this).attr('href');
                alertConfirm(url, 'Hapus');
                return false;
            });

            $('.alert-confirm-pesanan').click(function() {
                let url = $(this).attr('href');
                alertConfirm(url, 'Checklist');
                return false;
            });

            $('.back').click(function() {
                window.history.back();
            });

            $('.datatable').DataTable({
                'info': false,
            });

            $('.card-item-list #DataTables_Table_0_length').parent().addClass('d-none').end();

            let arrayBg = ['success', 'info', 'secondary', 'primary'];
            let randBg = function() {
                let index = Math.floor(Math.random() * 4);
                return arrayBg[index];
            }

            $('.card-random-bg').each(function() {
                $(this).addClass('bg-' + randBg());
            });
            $('.btn-random-bg').each(function() {
                $(this).addClass('bg-' + randBg());
            });

            let iteration = 1;
            let createRow = function(data) {
                let row = $('<tr/>', {
                    id: data.item_id
                });
                let columIteration = $('<td/>').text(iteration);
                let columnItem = $('<td/>');
                let columnQty = $('<td/>');
                let columnSubtotal = $('<td/>');
                let columnRemove = $('<td/>');
                let inputItemId = $('<input>', {
                    type: 'hidden',
                    name: 'item_id[]',
                    value: data.item_id
                });
                let inputHarga = $('<input>', {
                    type: 'hidden',
                    name: 'harga',
                    value: data.harga_item
                });
                let inputJmlOrder = $('<input>', {
                    type: 'number',
                    name: 'jml_order[]',
                    value: 1,
                    'max': 10,
                    'min': 0,
                    'class': 'inline-input w-50 text-center float-left'
                });
                let minIcon = $('<i/>', {
                    'href': 'javascript:void(0)',
                    'class': 'fa fa-minus float-left mt-2 text-danger min',
                    'style': 'cursor: pointer'
                });
                let plusIcon = $('<i/>', {
                    'href': 'javascript:void(0)',
                    'class': 'fa fa-plus float-left mt-2 text-primary plus',
                    'style': 'cursor: pointer'
                });
                let inputSubtotal = $('<input>', {
                    type: 'hidden',
                    name: 'subtotal[]',
                    value: data.harga_item,
                    'class': 'inline-input'
                });
                let subtotal = $('<p/>', {
                    'class': 'text-subtotal'
                }).text('Rp. ' + formatRupiah(data.harga_item));
                let remove = $('<i/>', {
                    'href': 'javascript:void(0)',
                    'class': 'fa fa-trash float-left mt-2 text-danger remove',
                    'style': 'cursor: pointer',
                    'data-id': data.item_id
                });

                // Column Iteration
                $(columIteration).appendTo(row);
                // Column Item
                $(columnItem).text(data.nama_item.split('+').join(' '));
                $(inputItemId).appendTo(columnItem);
                $(inputHarga).appendTo(columnItem);
                // Column Qty
                $(minIcon).appendTo(columnQty);
                $(inputJmlOrder).appendTo(columnQty);
                $(plusIcon).appendTo(columnQty);
                // Column Subtotal
                $(subtotal).appendTo(columnSubtotal);
                $(inputSubtotal).appendTo(columnSubtotal);
                // Column Remove
                $(remove).appendTo(columnRemove);
                // Row
                $(columnItem).appendTo(row);
                $(columnQty).appendTo(row);
                $(columnSubtotal).appendTo(row);
                $(columnRemove).appendTo(row);

                return row;
            }

            let updateJmlPesan = function(row, condition) {
                let val = parseInt(row.find('[name="jml_order[]"]').val());
                let harga = row.find('[name="harga"]').val();
                let newVal = 0;

                if (condition == 'plus') newVal = val + 1;
                if (condition == 'min') newVal = val - 1;

                let subtotal = newVal * harga;

                row.find('[name="jml_order[]"]').val(newVal);
                row.find('[name="subtotal[]"]').val(subtotal);
                row.find('.text-subtotal').text('Rp. ' + formatRupiah(String(subtotal)));
            }

            $('.add-to-cart').click(function() {
                let dataPlan = $(this).attr('data');
                let dataDecode = decodeURIComponent(dataPlan);
                let data = JSON.parse(dataDecode);
                let row = $('tr#' + data.item_id);

                if (row.length == 0) {
                    let newRow = createRow(data);
                    $('table.table-pesanan > tbody').append(newRow);
                    iteration = iteration + 1;
                } else {
                    updateJmlPesan(row, 'plus');
                }

                return false;
            });

            $(document).on('click', '.min, .plus', function() {
                let parent = $(this).parent().parent();
                if ($(this).hasClass('plus')) updateJmlPesan(parent, 'plus');
                if ($(this).hasClass('min')) updateJmlPesan(parent, 'min');
            });

            $(document).on('click', '.remove', function() {
                let parent = $(this).parent().parent().remove();
            });

            $('.jenis-print').click(function() {
                let val = $(this).val();
                let harga = 500;
                if (val == 'berwarna') {
                    harga = 1000;
                }
                $('#harga-satuan').val(harga);
            });

            $('.detail-modal').click(function() {
                let url = $(this).attr('href');
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(res) {
                        $('#detail-pesanan').html(res);
                    }
                });
            });

            $(document).on('change', '#jml_lembar', function() {
                let print = $('[name="jml_print"]').val();
                let harga_satuan = $('[name="harga_satuan"]').val();
                let lembar = $(this).val();
                let total = print * harga_satuan * lembar;
                $('.total').text(formatRupiah(String(total)));
                $(['name="total"']).val(total);
            });
        });

        // let multipleLineChart = document.getElementById('multipleLineChart').getContext('2d');
    </script>
</body>

</html> 