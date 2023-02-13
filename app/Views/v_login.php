<?php
echo view('layout/v_header');
?>
<style>
    .eye {
        border-radius: 30px 30px;
    }

    .btn-login {
        background-color: var(--moredark);
        color: var(--younggray);
    }

    .btn-login:hover {
        background-color: var(--youngdark);
        color: white;
    }

    /* .login-icon{
        font-size: 60px;
        color:black;
    }
    .login-text{
        font-weight: 600;
        font-size:60px;
        color:black;
    } */
    @media (min-width: 280px) {
        .login-icon {
            font-size: 30px;
            color: black;
        }

        .login-text {
            font-weight: 600;
            font-size: 30px;
            color: black;
        }

        .h4-login {
            font-size: 12px;
        }

        .hint {
            text-decoration: none;
            color: black;
            font-size: 15px;
            margin: 0;
        }

        .btnhint {
            border: none;
            background-color: transparent;
        }
    }

    @media (min-width: 576px) {}

    @media (min-width: 768px) {
        .h4-login {
            font-size: 15px;
        }

        .hint {
            text-decoration: none;
            color: black;
            font-size: 15px;
            margin: 0;
        }

        .btnhint {
            border: none;
            margin-left: -5px;
            background-color: transparent;
        }
    }

    @media (min-width: 992px) {
        .login-icon {
            font-size: 50px;
            color: black;
        }

        .login-text {
            font-weight: 600;
            font-size: 50px;
            color: black;
        }

        .h4-login {
            font-size: 20px;
        }

        .hint {
            text-decoration: none;
            color: black;
            font-size: 15px;
            margin: 0;
        }

        .btnhint {
            border: none;
            margin-left: -13px;
            background-color: transparent;
        }
    }

    @media (min-width: 1200px) {
        .login-icon {
            font-size: 60px;
            color: black;
        }

        .login-text {
            font-weight: 600;
            font-size: 60px;
            color: black;
        }

        .hint {
            text-decoration: none;
            color: black;
            font-size: 15px;
            margin: 0;
        }

        .btnhint {
            border: none;
            margin-left: -13px;
            background-color: transparent;
        }
    }
</style>

<body class="" style="background-color: #2c2f48;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-sm-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login"><img src="<?= base_url() ?>/template/img/2.jpg" style="width: 468px" alt=""></div> -->
                            <div class="col-lg-10">
                                <div class="p-3 mt-4">
                                    <div class="logo d-flex justify-content-center">
                                        <!-- <div class="sidebar-brand-icon rotate-n-15"> -->
                                        <div class="login-icon">
                                            <i class="las la-school"></i>
                                        </div>
                                        <div class="login-text mx-3">SISWA<sup style="font-weight: 100;">SPP 
                                        <!-- <a class="btnhint" data-toggle="modal" data-target="#hintModal"><i class="hint las la-question-circle"></i></a> -->
                                        </sup></div>
                                        <!-- <img class="logo-icon" src="<?= base_url() ?>/template/img/logo.png" alt=""></div> -->
                                    </div>
                                    <div class="text-center">
                                        <!-- <h1 class="h4 text-gray-900 mt-1 mb-4">Welcome!</h1> -->
                                        <h1 class="h4-login h4 text-gray-900 mt-1 mb-4">Log in to your account to continue.</h1>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                          <label class="small">Untuk Login Siswa Username diisi dengan Nama dan Password diisi dengan NISN.</label> 
                                        </div>
                                        
                                        <script>
                                          $(".alert").alert();
                                        </script>
                                    </div>
                                    <form role="form" class="user row" method="post" action="<?= base_url('login/cek_login') ?>">
                                        <?= csrf_field(); ?>
                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                        </div> -->
                                        <div class="col-1"></div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <div class="input-group">

                                                    <!-- <input id="username" type="text" name="username" placeholder="Username" class="form-control"> -->
                                                    <input type="text" autocomplete="off" class="form-control form-control-user" id="Username" aria-describedby="emailHelp" name="Username" placeholder="Username">
                                                    <!-- <div class="input-group-prepend">
                                                    <span class="input-group-text name" id="basic-addon1"><i style="margin-left: 5px" class="fa fa-user mr-1"></i> </span>
                                                </div> -->
                                                    <div class="input-group-append">
                                                        <span class="input-group-text eye" id="basic-addon1" tabindex="-1"><i style="margin-right: 10px" class="fa fa-user ml-1" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group" id="show_hide_password">
                                                    <!-- <div class="input-group-prepend">
                                    <span class="input-group-text key" id="basic-addon1"><i style="margin-left: 5px" class="fa fa-key mata"></i></span>
                                </div> -->
                                                    <input type="password" class="form-control form-control-user" name="Password" id="Password" placeholder="Password">
                                                    <div class="input-group-append">
                                                        <button class="input-group-text eye" id="basic-addon1" type="button" tabindex="-1"><i style="margin-right: 5px" class="fa fa-eye mata" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                            <label for="kode_akses">Kode Akses</label>
                            <div class="input-group" id="show_hide_password">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i> </span>
                                </div>
                                <input id="kode_akses" name="kode_akses" type="password" placeholder="Kode Akses" class="form-control " required>
                                <div class="input-group-append">
                                    <button class="input-group-text" type="button" tabindex="-1"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                </div>
                            </div>
                                                    </div> -->
                                            <!-- <div class="form-group">
                                            <label for="password">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i> </span>
                                                </div>
                                                <input id="kode_akses" name="kode_akses" type="password" placeholder="Kode Akses" class="form-control " required>
                                                <div class="input-group-append">
                                                    <button class="input-group-text" type="button" tabindex="-1"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div> -->
                                            <button type="submit" name="login" class="btn btn-user btn-block btn-login mt-2"><i class="feather-log-in"></i> Login</button>
                                        </div>
                                        <div class="col-1"></div>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="modal fade" id="hintModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">*Hint : </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="small"><br>- Untuk Login Siswa Username diisi dengan Nama dan Password diisi dengan NISN.
                        <br>- Untuk Petugas atau Admin tetap menggunakan Username dan Password</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script>
        $('#hintModal').modal({
            backdrop: false
        })
    </script>
    <script src="<?= base_url() ?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/template/js/sb-admin-2.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>/template/vendor/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            <?php if (session()->getFlashdata('bahaya')) : ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    Swal.fire({
                        title: 'Gagal!',
                        text: '<?= session()->getFlashdata('bahaya'); ?>',
                        icon: 'error'
                    });
                <?php endif; ?>
            <?php endif ?>
        });
    </script>
    <!-- SHOW HIDE PASSWORD -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password button").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye");
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye");
                    $('#show_hide_password i').addClass("fa-eye-slash");
                }
            });
        });
    </script>

</body>

</html>