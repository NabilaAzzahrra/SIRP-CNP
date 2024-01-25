<!doctype html>
<html lang="en">

<head>
    <style>
        
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/template') ?>/dist/img/SiRP_App.png" sizes="any">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/dist/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/dist/css/login/owl.carousel.min.css">


    <!-- Bootstrap CSS -->
    <!--link rel="stylesheet" href="/dist/css/login/bootstrap.min.css"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/dist/css/login/style.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/plugins/toastr/toastr.min.css">


    <title>APP SiRP | Login</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url('assets/template') ?>/dist/img/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Masuk</h3>
                                <p class="mb-4">Hallo ! Selamat datang di Aplikasi Sistem Relasi Perusahaan</p>
                            </div>
                            <form action="<?= base_url('Auth/login'); ?>" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <input type="submit" value="Masuk" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/template') ?>/dist/js/login/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/template') ?>/dist/js/login/popper.min.js"></script>
    <script src="<?= base_url('assets/template') ?>/dist/js/login/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/template') ?>/dist/js/login/main.js"></script>
</body>

</html>
<!-- Toastr -->
<script src="<?= base_url('assets/template') ?>/plugins/toastr/toastr.min.js"></script>
<script>
    $(function() {
        $('[name="username"]').focus();
        <?php if ($this->session->flashdata('usernotfound')) { ?>
            toastr.error('Username atau Password tersebut tidak ada.');
        <?php } else if ($this->session->flashdata('logout')) { ?>
            toastr.success('Berhasil keluar dari sesi anda.');
        <?php } else { ?>
            toastr.info('Masukkan data anda untuk masuk.');
        <?php } ?>
    });
</script>