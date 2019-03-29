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

    <title>Login | E-Banking Sekolah</title>
</head>
<div class="wrapper">
    <div class="container pt-5">
        <div class="col-md-12 col-sm-12">
            <div class="card shadow mt-5 rounded-lg">
                <div class="row">
                    <div class="col-md-8 pr-1">
                        <img src="<?= base_url('public/assets/img/purple-bg.png') ?>" alt="" width="100%">
                    </div>
                    <div class="col-md-4">
                        <form id="login-form" action="<?= base_url('login/auth_user') ?>" method="post">
                            <div class="card-body">
                                <h3 class="card-title">Masuk</h3>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="*********" required />
                                </div>

                                <div class="form-group pt-3">
                                    <button type="submit" class="btn btn-block btn-success mb-2">Login</button>
                                    Belum punya akun? <a href="<?= base_url('daftar/pilih') ?>">Daftar Sekarang!</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<body>

    <!-- JQuery -->
    <script src="<?= base_url('public/assets/js/core/jquery.3.2.1.min.js') ?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?= base_url('public/assets/js/core/bootstrap.min.js') ?>"></script>
    <!-- Popper -->
    <script src="<?= base_url('public/assets/js/core/popper.min.js') ?>"></script>
    <!-- SweetAlert -->
    <script src="<?= base_url('public/assets/js/plugin/sweetalert/sweetalert.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/alert.js') ?>"></script>
    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            $('#login-form').submit(function() {
                let formData = $(this).serialize();
                let url = $(this).attr('action');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(result) {
                        alertResponse(result);
                    }
                })
                return false;
            })
        });
    </script>
</body>

</html> 