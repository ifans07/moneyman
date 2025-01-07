<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h2>Form Reset Password</h2>
            </div>
            <div>
                <form action="<?= base_url('auth/resetpassword') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Pengguna:</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="reset_token" class="form-label">Token Reset:</label>
                        <input type="text" name="reset_token" id="reset_token" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </form>
                <?= session('error') ? '<p>' . session('error') . '</p>' : '' ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>