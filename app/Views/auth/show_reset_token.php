<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h2>Token Reset Anda</h2>
            </div>
            <div>
                <p>Gunakan token berikut untuk mereset kata sandi Anda:</p>
                <code><?= esc($resetToken) ?></code>
                <p><a href="<?= base_url('/auth/resetform') ?>">Klik di sini untuk mereset password</a></p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>