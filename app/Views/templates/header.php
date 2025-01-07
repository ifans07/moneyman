<header id="header" class="header fixed-top rounded-3 rounded-top-0 shadow" style="background-color: #223642;">
    <div class="container d-flex align-items-center justify-content-between">
        <h2 class="logo w-25" style="margin-right: "><a href="<?= base_url('/beranda') ?>" class="" style="color: #fafafa"><i class="fa-solid fa-money-bill"></i> MoneyMan</a></h2>

        <div class="nav-list w-75 d-flex justify-content-between" style="text-align: center;">
            <div>
                <h2 class="logo-list"><a href="<?= base_url('/beranda') ?>" style="color: #fafafa">MoneyMan</a></h2>
            </div>
            <ul class="nav" style="color: #fafafa">
                <li class="nav-item"><a href="<?= base_url('/beranda') ?>" class="nav-link <?= ($title == "Dashboard")?"active-link":"" ?>" style="color: #fafafa"><i class="fa-solid fa-home"></i> Home</a></li>
                <li class="nav-item"><a href="<?= base_url('/income') ?>" class="nav-link <?= ($title == "Income")?"active-link":"" ?>" style="color: #Fafafa"><i class="fa-solid fa-coins"></i> Income</a></li>
                <li class="nav-item"><a href="/expenses" class="nav-link <?= ($title == "Expenses")?"active-link":"" ?>" style="color: #FAFAFA;"><i class="fa-solid fa-wallet"></i> Expense</a></li>
                <li class="nav-item"><a href="<?= base_url('savings') ?>" class="nav-link <?= ($title == "Tabungan Target")?"active-link":"" ?>" style="color: #FAFAFA;"><i class="fa-solid fa-piggy-bank"></i> Tabungan</a></li>
                <?php if(session()->get('status') == 1): ?>
                    <li class="nav-item"><a href="<?= base_url('kategori') ?>" class="nav-link <?= ($title == "Kategori")?"active-link":"" ?>" style="color: #FAFAFA;"><i class="fa-solid fa-list-alt"></i> Kategori</a></li>
                <?php endif; ?>
                <li class="nav-item"><a href="<?= base_url('pakai') ?>" class="nav-link <?= ($title == "Pakai")?"active-link":"" ?>" style="color: #FAFAFA;"><i class="fa-solid fa-box"></i> Pakai</a></li>
                <li class="nav-item"><a href="<?= base_url('user/profil') ?>" class="nav-link <?= ($title == "Profil Pengguna")?"active-link":"" ?>" style="color: #fafafa"><i class="fa-solid fa-user shadow-custom" style="border-radius: 50%;"></i> <?= session()->get('username') ?></a></li>
            </ul>
            <div class="btn-login d-flex justify-content-end gap-2">
                <?php if(session()->get('isLoggedIn')): ?>
                    <div>
                        <a href="<?= base_url('/auth/logout') ?>" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                <?php else: ?>
                    <div>
                        <a href="" class="btn btn-dark fw-medium" style="background-color: #bad6ca; color: #333333;"><i class="fa-solid fa-sign-in"></i> Login</a>
                    </div>
                    <div>
                        <a href="" class="btn btn-dark fw-medium" style="background-color: #bad6ca; color: #333333;"><i class="fa-solid fa-sign-in-alt"></i> Daftar</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div>
            <div class="toggle">
                <i class="fa-solid fa-bars" style="color: #fafafa"></i>
            </div>
        </div>
    </div>
</header>