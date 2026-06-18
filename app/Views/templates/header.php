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
                    <div id="tmb-logout">
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

<header class="fixed-bottom shadow-lg d-md-none" style="background-color: #223642; border-top-right-radius: 20px; border-top-left-radius: 20px; transition: .2s linear" id="header-android">
    <div class="d-flex py-1 align-items-center justify-content-around">
        <a href="<?= base_url('income') ?>" class="bg-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="background-color: #1abc9c !important;color:#1abc9c;transition: .2s linear; <?= ($title == "Income")? 'width: 60px; height: 60px;cursor:pointer; transform: translateY(-32px);border:4px solid #223642;' :"width: 50px; height: 50px;" ?>"
            <?php if($title !== "Income"): ?>
            onmouseover="this.style.transform='translateY(-32px)'" 
            onmouseout="this.style.transform='translateY(0)'"
            <?php endif; ?>
        >
            <i class="fa-solid fa-coins fs-4"></i>
        </a>
        <a href="<?= base_url('expenses') ?>" class="bg-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="background-color: #1abc9c !important;color:#1abc9c; transition: .2s linear; <?= ($title == "Expenses")? 'width: 60px; height: 60px;cursor:pointer; transform: translateY(-32px);border:4px solid #223642;' :"width: 50px; height: 50px;" ?>"
        <?php if($title !== "Expenses"): ?>
            onmouseover="this.style.transform='translateY(-32px)'" 
            onmouseout="this.style.transform='translateY(0)'"
        <?php endif ?>
        >
            <i class="fa-solid fa-wallet fs-4"></i>
        </a>
        <?php if($title == "Dashboard"): ?>
            <div class="bg-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="background-color: #1abc9c !important;color:#1abc9c;width: 60px; height: 60px;cursor:pointer; transform: translateY(-32px);border:4px solid #223642" onclick="transaksiModal()">
                <i class="fa-solid fa-plus fs-4"></i>
            </div>
        <?php else: ?>
            <a href="<?= base_url('beranda') ?>" class="bg-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="background-color: #1abc9c !important;color:#1abc9c;width: 50px; height: 50px; transition: .2s linear;"
                onmouseover="this.style.transform='translateY(-32px)'" 
                onmouseout="this.style.transform='translateY(0)'"
            >
                <i class="fa-solid fa-home fs-4"></i>
            </a>
        <?php endif; ?>
        <a href="<?= base_url('savings') ?>" class="bg-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="background-color: #1abc9c !important;color:#1abc9c;transition: .2s linear; <?= ($title == "Tabungan Target")? 'width: 60px; height: 60px;cursor:pointer; transform: translateY(-32px);border:4px solid #223642;' :"width: 50px; height: 50px;" ?>"
        <?php if($title !== "Tabungan Target"): ?>
            onmouseover="this.style.transform='translateY(-32px)'" 
            onmouseout="this.style.transform='translateY(0)'"
            <?php endif; ?>
        >
            <i class="fa-solid fa-piggy-bank fs-4"></i>
        </a>
        <a href="<?= base_url('pakai') ?>" class="bg-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="background-color: #1abc9c !important;color:#1abc9c;transition: .2s linear; <?= ($title == "Pakai")? 'width: 60px; height: 60px;cursor:pointer; transform: translateY(-32px);border:4px solid #223642;' :"width: 50px; height: 50px;" ?>"
        <?php if($title !== "Pakai"): ?>
            onmouseover="this.style.transform='translateY(-32px)'" 
            onmouseout="this.style.transform='translateY(0)'"
            <?php endif; ?>
        >
            <i class="fa-solid fa-box fs-4"></i>
        </a>
    </div>
</header>