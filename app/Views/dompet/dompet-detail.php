<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 
$jml = [];
foreach($log as $ei){
    if($ei['id_dompet'] == $dompet['id']){
        $jml[] = $ei['id_dompet'];
    }
}

?>

<section>
    <div class="container">
        <div>
            <div class="">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-box">
                        <i class="fa-solid fa-wallet"></i> 
                    </div>
                    <div class="lh-1">
                        <h2>Dompet Detail</h2>
                        <div style="margin-top:-3px">
                            <small class="text-muted fs-5"><?= $dompet['nama_dompet'] ?></small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4 position-relative">
                <div class="col-md-6 position-sticky pb-3" style="height: 100%; overflow: hidden; top: 0;">
                    
                    <div class="mb-2">
                        <div class="shadow-custom rounded p-3 bg-white">
                            <div>
                                <small class="fw-medium fs-3">Rp <?= number_format($dompet['saldo'],0,'.','.') ?></small>
                            </div>
                            <hr>
                            <div class="">
                                <table>
                                    <tr>
                                        <td class="fs-5 text-success">+</td>
                                        <!-- <td>:</td> -->
                                        <td>&nbsp;<span class="text-success">Rp <?= number_format($totalIncomeDompet,0,'.','.') ?></span> - masuk</td>
                                    </tr>
                                    <tr>
                                        <td class="fs-2 text-danger">-</td>
                                        <!-- <td>:</td> -->
                                        <td> &nbsp;<span class="text-danger">Rp <?= number_format($totalExpenseDompet,0,'.','.') ?></span> - keluar</td>
                                    </tr>
                                </table>
                                <!-- <small class="text-muted">Masuk: </small>
                                <small class="text-muted">Keluar: </small> -->
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="shadow-custom rounded-3 p-3 d-flex justify-content-around bg-white">
                            <div class="d-flex flex-column align-items-center w-50" style="border-right:2px solid #e0e0e0;">
                                <small class="text-muted" style="font-size: 0.7rem">Saldo Awal</small>
                                <small class="fw-medium fs-5" id="terkumpul">Rp<span class="poin"><?= number_format($dompet['saldo_awal'],0,'.','.') ?></span></small>
                            </div>
                            <div class="d-flex flex-column align-items-center w-50">
                                <small class="text-muted" style="font-size: 0.7rem">Saldo</small>
                                <small class="fw-medium fs-5" id="kekurangan">Rp<span class="poin"><?= number_format($dompet['saldo'],0,'.','.') ?></span></small>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="shadow-custom rounded-3 p-3 bg-white">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero temporibus reiciendis nesciunt asperiores, fugit modi reprehenderit doloribus cupiditate libero voluptatum praesentium similique officia, minus harum. Hic est quod similique a!
                        </div>
                    </div>

                </div>
                <div class="col-md-6 detail-transaksi" style="height: 100vh;">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-muted">Detail transaksi</h5>
                        <small>
                            Jumlah transaksi: <?= ($jml == null) ? 0 : count($jml) ?>
                        </small>
                    </div>
                    <?php foreach($log as $ei): ?>
                        <?php if($ei['id_dompet'] == $dompet['id']): ?>
                            <div class="d-flex align-items-center justify-content-between p-3 rounded-3 mb-2 position-relative overflow-hidden wrp-hapus bg-white" style="background-color: #f7f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                <div class="grp-hapus">
                                    <button class="btn" onclick="hapusTransaksi('<?= $ei['slug'] ?>','<?= $ei['status'] ?>')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus"><i class="fa-solid fa-trash fs-2 text-danger"></i></button>
                                    <button class="btn disabled" style="border: none;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="coming soon">
                                        <i class="fa-solid fa-edit fs-2 text-secondary"></i>
                                    </button>
                                </div>
                                <div class="d-flex gap-2">
                                    <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 3rem; height: 3rem; background-color: #bad6ca; color: #fafafa;">
                                        <i class="fa-solid <?= $ei['icon'] ?>" style="color: #384c57;"></i>
                                    </div>
                                    <div class="lh-1">
                                        <h5 style="font-size: 18px" class="mb-1 p-0 text-truncate"><?= $ei['name'] ?></h5>
                                        <small class="potong m-0 p-0 form-text w-100 text-truncate d-sm-block d-block d-lg-block" style="font-size: 12px;"><?= $ei['description'] ?></small>
                                        <small class="text-muted" style="font-size: 12px"><?= $ei['tanggal'] ?></small> - <small class="text-muted" style="font-size: 12px;">
                                            <?php if(!empty($ei['nama_dompet'])): ?>
                                                <?= $ei['nama_dompet'] ?>
                                            <?php else: ?>
                                                optional
                                            <?php endif; ?>
                                        </small>
                                    </div>
                                </div>
                                <div>
                                    <span style="font-size: 1.2rem;" class="fw-medium <?= ($ei['status'] == 1)?"text-success":"text-danger" ?>">Rp<?= number_format($ei['amount'],0,'.','.') ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    window.hapusTransaksi = (i,s)=>{
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('/delete/transaksi') ?>",
                    method: 'post',
                    data: {slug: i, status: s},
                    dataType: 'json',
                    success: function(response){
                        Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success",
                        allowOutsideClick: false, // Mencegah penutupan modal dengan klik di luar
                        }).then((hasil)=>{
                            if(hasil.isConfirmed){
                                location.reload()
                            }
                        }).finally(()=>{
                            location.reload()
                        });
                    },
                    error: ()=>{
                        console.log("error")
                    }
                })
            }
        });
    }
</script>

<?= $this->endSection() ?>