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

<body class="bg-purple py-5">
    <div class="wrapper">
        <div class="container">
            <div class="mt-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title">Form Daftar <?= ucfirst($this->uri->segment(2)) ?></h3>

                        <form id="form-daftar" action="<?= base_url('users/add_user') ?>" method="post">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="foto">Preview Foto Profil</label>
                                        <div class="text-center d-block mb-4">
                                            <img src="<?= base_url('public/assets/img/blank_user.png') ?>" alt="" class="w-50 rounded-circle bg-secondary p-1 avatar">
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input upload-foto" id="upload-foto" accept="image/x-png,image/jpeg" required />
                                            <label class="custom-file-label" for="upload-foto" data-browse="Pilih File">Pilih File</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group form-row">
                                        <?php if ($this->uri->segment(2) !== 'kantin') : ?>
                                        <div class="col col-md-6 col-sm-12 mt-sm-3">
                                            <label for="no_induk"><?= ($this->uri->segment(2) == 'siswa') ? 'NIS' : 'NIP'; ?></label>
                                            <input type="text" name="no_induk" id="no_induk" class="form-control" placeholder="123456" />
                                        </div>
                                        <?php endif; ?>

                                        <div class="col col-sm-12 <?= ($this->uri->segment(2) !== 'kantin') ? 'col-md-6' : '' ?> mt-sm-3">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" required />
                                            <input type="hidden" name="level" value="<?= $this->uri->segment(2) ?>">
                                            <input type="hidden" name="register" value="true">
                                        </div>

                                        <?php if ($this->uri->segment(2) == 'siswa') : ?>
                                        <div class="col-12 mt-3">
                                            <label for="kelas">Kelas</label>
                                            <input type="text" name="kelas" id="kelas" class="form-control" placeholder="X TKJ" />
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group form-row mb-0">
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <label for="email">E-mail</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="example@mail.com" required />
                                        </div>

                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <label for="telp">Telephone / WA</label>
                                            <input type="tel" name="telp" id="telp" class="form-control" placeholder="085141****" required />
                                        </div>
                                    </div>
                                    <div class="form-group form-row mb-0">
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required />
                                        </div>

                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <label for="">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="********" required />
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success">
                                        Daftar
                                    </button>
                                    <a href="<?= base_url('') ?>" class="btn btn-danger">Kembali Ke Beranda</a>
                                    <p>Sudah punya akun? <a href="<?= base_url('login') ?>" class="text-decoration-none">Masuk Sekarang!</a></p>
                                </div>
                            </div>
                        </form>
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
    <script>
        $(document).ready(function() {
            let readUrl = function(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#upload-foto').on('change', function() {
                console.log(readUrl(this));
                console.log(this.files);
            });

            $('#form-daftar').submit(function() {
                let file_data = $('#upload-foto').prop('files')[0];
                let form_data = new FormData(this);
                let url_action = $(this).attr('action');
                form_data.append('foto', file_data);

                $.ajax({
                    url: url_action,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(result) {
                        alertResponse(result);
                    }
                });

                return false;
            })
        })
    </script>
</body>

</html> 