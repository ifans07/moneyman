<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div class="mb-2">
                <a href="<?= base_url('/beranda') ?>" class="btn btn-primary fw-medium"><i class="fa-solid fa-angles-left"></i> Kembali</a>
            </div>
            <div class="mb-4">
                <h2>Profil Pengguna</h2>
            </div>
            <div class="d-flex gap-4 align-items-center">
                <div class="bg-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="width: 100px; height: 100px;">
                    <i class="fa-solid fa-user display-3"></i>
                </div>
                <div class="lh-1">
                    <h2 class="m-0 p-0"><?= $user['username'] ?></h2><br>
                    <span><?= $user['email'] ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>