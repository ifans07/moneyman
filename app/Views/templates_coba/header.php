<!-- HEADER: MENU + HEROE SECTION -->
<header>

    <div class="menu">
        <ul>
            <li class="logo mb-3">
                <a href="https://codeigniter.com" target="_blank">
                    <i class="fa-solid fa-money-bill text-white fs-3"></i> <span class="fw-bold text-white">MONEY MAN</span>
                </a>
            </li>
            <li class="menu-toggle">
                <button id="menuToggle">&#9776;</button>
            </li>
            <?php if(session()->get('logged_in')): ?>
                <li class="menu-item hidden text-white"><a href="/admin/dashboard" class="text-white">Home</a></li>
                <a href="/admin/logout" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
            <?php elseif(session()->get('logged_in_pasien')): ?>
                <li class="menu-item"><a href="/pasien" class="text-white">Beranda</a></li>
                <a href="/pasien/resetPassword" class="btn btn-dark"><i class="fa-solid fa-key"></i> Reset Password</a>
                <a href="/auth/logout" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            <?php else: ?>

            <?php endif ?>
        </ul>
    </div>

    <div class="heroe">
        
        <?php if(!empty($title_header) && !empty($title_info)): ?>
            <h1><?= $title_header ?></h1>
            <h2><?= $title_info ?></h2>
        <?php else: ?>
            <h1>Welcome to CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h1>
            <h2>The small framework with powerful features</h2>
        <?php endif ?>
    </div>

</header>