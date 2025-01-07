<footer id="footer" class="footer mt-5">
    <div class="footer-top p-4" style="background-color: #223642;">
        <div class="container">
            <h2 class="logo fw-bolder"><a href="<?= base_url('/') ?>" class="" style="letter-spacing: -3px; color: #FFD700;"><i class="fa-solid fa-money-bill"></i> MoneyMan</a></h2>
            <div class="environment lh-1">

                <p class="">Page rendered in {elapsed_time} seconds</p>
                <p class="p-0 m-0">Environment: <?= ENVIRONMENT ?></p>
                <p class="p-0 m-0">IFANS</p>

            </div>
        </div>
    </div>
    <div class="footer-bottom p-0 m-0" style="background-color: #d7e1eb;">
        <div class="container">
            <div class="copyrights p-0 m-0">

                <p class="text-dark">&copy;<?= date('Y') ?> Orenji.</p>

            </div>
        </div>
    </div>
</footer>