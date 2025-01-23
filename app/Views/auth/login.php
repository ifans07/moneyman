<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <meta name="description" content="The small framework with powerful features">

    <link rel="shortcut icon" type="image/png" href="<?= base_url('/icons/icons8-coin-wallet.png') ?>">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="<?= base_url('/css/responsive.css') ?>">

    <!-- jquery -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.10/index.global.min.js'></script>
    <script src="<?= base_url('node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="height: 100vh; background:linear-gradient(rgba(215,225,235,0.8), rgba(215,225,235,0.4)), url('<?= base_url('/assets/hero/hero1.jpg') ?>'), fixed center center; background-size:cover; background-repeat: no-repeat;">
<section class="h-100 login-section">
    <div class="d-flex justify-content-center align-items-center flex-column position-absolute end-0 top-0 bg-primary rounded-start" id="login-wrap" style="width: 40%; height: 100vh;">
        <div class="mb-3">
            <h2 class="text-center text-light d-flex flex-column"><i class="fa-solid fa-money-bill display-5"></i> Moneyman</h2>
        </div>
        <div>
            <?php if(session()->getFlashdata('msg')): ?>
                <div class="alert alert-danger">
                    <i class="fa-solid fa-times"></i> <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="">
            <form action="<?= base_url('auth/login/proses') ?>" method="post">
                <div class="input-group flex-nowrap mb-3">
                    <label for="" class="input-group-text bg-white" style="border-right: none;"><i class="fa-solid fa-user"></i></label>
                    <input type="text" class="form-control" placeholder="username or email" name="username" value="<?= old('username') ?>" style="border-left: none;">
                </div>
                <div class="input-group mb-3">
                    <label for="" class="input-group-text bg-white" style="border-right: none;" id="eye"><i class="fa-solid fa-lock" id="icon"></i></label>
                    <input type="password" class="form-control" placeholder="Password" name="password" style="border-left: none;" id="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label text-light" for="exampleCheck1">Ingat saya</label>
                </div>
                <div class="d-flex justify-content-around gap-1">
                    <button type="reset" class="btn btn-light fw-medium w-50"><i class="fa-solid fa-times text-danger"></i> Reset</button>
                    <button type="submit" class="btn btn-secondary fw-medium w-50"><i class="fa-solid fa-sign-in"></i> Login</button>
                </div>
                <div class="mt-3 d-flex flex-column text-center">
                    <a href="<?= base_url('/auth/lupa-password') ?>" class="text-light">Lupa kata sandi?</a>
                    <p class="text-primary">Belum punya akun? <a href="<?= base_url('/auth/daftar') ?>" class="text-light">Daftar</a></p>
                    <a href="<?= base_url('/') ?>" class="text-light"><i class="fa-solid fa-angle-double-left"></i> Landing page</a>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- SCRIPTS -->
<script src="<?= base_url('js/script.js') ?>"></script>
    <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.bundle.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <?php if(session()->getFlashdata('successDaftar')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'MoneyMan😊',
                html: '<?= session()->getFlashdata('successDaftar'); ?>',
                showConfirmButton: true, // Tombol konfirmasi
                confirmButtonText: 'Terima Kasih🙏' // Teks pada tombol
            });
        </script>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'MoneyMan😊',
                html: '<?= session()->getFlashdata('success'); ?>',
                showConfirmButton: true, // Tombol konfirmasi
                confirmButtonText: 'Terima Kasih🙏' // Teks pada tombol
            });
        </script>
    <?php endif; ?>
    
    <script>
        $(document).ready(function(){
            $('#eye').on('click', function(){
                let password = $('#password').attr('type')
                if(password == 'password'){
                    $('#password').attr('type', 'text')
                    $('#icon').removeClass('fa-lock')
                    $('#icon').addClass('fa-unlock')
                }else{
                    $('#password').attr('type', 'password')
                    $('#icon').removeClass('fa-unlock')
                    $('#icon').addClass('fa-lock')
                }
            })
        })
    </script>
</body>
</html>

