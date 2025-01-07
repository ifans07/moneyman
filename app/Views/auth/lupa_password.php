<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div class="mb-5">
                <h2>Lupa Password</h2>
            </div>
            <div>
                <form action="<?= base_url('/auth/generatetoken') ?>" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control" name="username" placeholder="Nama">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Generate Token</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('') ?>