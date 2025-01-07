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
    <style>
        .error-list {
            color: red;
            padding: 10px;
            border: 1px solid red;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #f8d7da;
        }
    </style>
</head>
<body style="height: 100vh; background:linear-gradient(rgba(215,225,235,0.8), rgba(215,225,235,0.4)), url('<?= base_url('/assets/hero/hero1.jpg') ?>'), fixed center center; background-size:cover; background-repeat: no-repeat;">
<section class="h-100 login-section">
    <div class="d-flex justify-content-center align-items-center flex-column position-absolute end-0 top-0 bg-primary rounded-start" id="login-wrap" style="width: 40%; height: 100vh;">
        <div class="mb-3">
            <h2 class="text-center text-light d-flex flex-column"><i class="fa-solid fa-money-bill display-5"></i> Moneyman</h2>
        </div>

        <!-- Menampilkan Semua Pesan Error -->
         <div>
        <?php if (isset(session('gagal')['validation']) && !empty(session('gagal')['validation'])): ?>
            <div class="alert alert-danger p-1">
                <ul style="list-style: none;">
                    <?php foreach (session('gagal')['validation'] as $error): ?>
                        <li class=""><i class="fa-solid fa-times"></i> <?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        </div>

        <div class="">
            <form action="<?= base_url('auth/daftar/save') ?>" method="post">
                <div class="input-group flex-nowrap mb-3">
                    <label for="" class="input-group-text"><i class="fa-solid fa-user"></i></label>
                    <input type="text" class="form-control" placeholder="Nama Pengguna" name="username" value="<?= old('username') ?>">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <label for="" class="input-group-text"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= old('email') ?>">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <label for="" class="input-group-text"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <label class="input-group-text" for="exampleCheck1"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" class="form-control" id="exampleCheck1" placeholder="Re-password" name="confirm_password">
                </div>
                <div class="d-flex justify-content-around gap-1">
                    <button type="reset" class="btn btn-light fw-medium w-50"><i class="fa-solid fa-times text-danger"></i> Reset</button>
                    <button type="submit" class="btn btn-secondary fw-medium w-50"><i class="fa-solid fa-sign-in"></i> Daftar</button>
                </div>
                <div class="mt-3 d-flex flex-column text-center">
                    <p class="text-primary">Sudah punya akun? <a href="<?= base_url('/auth/login') ?>" class="text-light">Login</a></p>
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
</body>
</html>

