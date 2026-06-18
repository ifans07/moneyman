<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <!-- profil -->
        <div class="mb-5">
            <div class="mb-2">
                <?php if(session()->getFlashdata('berhasil')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('berhasil') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
            <!-- <div class="mb-2">
                <a href="<?= base_url('/beranda') ?>" class="btn btn-primary fw-medium"><i class="fa-solid fa-angles-left"></i> Kembali</a>
            </div> -->
            <div class="mb-4">
                <h2>Profil Pengguna</h2>
            </div>
            <div class="d-flex gap-4 align-items-center">
                <div class="bg-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="background-color: #1abc9c !important;color:#1abc9c;width: 100px; height: 100px;">
                    <i class="fa-solid fa-user display-3"></i>
                </div>
                <div class="lh-1">
                    <h2 class="m-0 p-0"><?= $user['username'] ?></h2><br>
                    <span><?= $user['email'] ?></span>
                </div>
            </div>
        </div>
        <!-- dompet -->
        <div class="mb-5">
            <div class="mb-4 d-flex align-items-center">
                <h2>Wallet</h2>
                <div class="text-muted ms-auto" style="opacity: .3;cursor: pointer;" id="toggleAll">
                    <i class="fa-solid fs-4 fa-eye"></i>
                </div>
            </div>

            <div class="mb-2">
                <div class="shadow-custom rounded-3 p-3 d-flex justify-content-around bg-white">
                    <div class="d-flex flex-column align-items-center w-50" style="border-right:2px solid #e0e0e0;">
                        <small class="text-muted" style="font-size: 0.7rem">Saldo Awal</small>
                        <small class="fw-medium fs-5" id="terkumpul">Rp<span class="poin"><?= number_format($saldoawal,0,'.','.') ?></span></small>
                    </div>
                    <div class="d-flex flex-column align-items-center w-50">
                        <small class="text-muted" style="font-size: 0.7rem">Saldo</small>
                        <small class="fw-medium fs-5" id="kekurangan">Rp<span class="poin"><?= number_format($saldo,0,'.','.') ?></span></small>
                    </div>
                </div>
                <?php if($saldoawal == 0 && $saldo == 0): ?>
                    <div class="text-center text-muted form-text">
                        Belum ada dompet yang ditambahkan, saldo tidak ada!
                    </div>
                <?php endif ?>
            </div>

            <div class="row row-cols-2 row-cols-md-3 g-2">

                <?php foreach($dompet as $d): ?>
                <a href="<?= base_url('dompet/detail/'.$d['slug']) ?>" class="col-sm col-md-4">
                    <div class="d-flex align-items-center justify-content-center flex-column flex-sm-column flex-md-row flex-lg-row gap-2 shadow-custom p-3 rounded-3 h-100 bg-white"
                            onmouseover="this.style.transform='scale(1.01) translateY(-5px)'" 
                            onmouseout="this.style.transform='scale(1) translateY(0)'" 
                            style="transition: .2s linear;">

                        <div class="rounded-circle d-flex justify-content-center align-items-center p-3 text-white" style="background-color: #1abc9c;width: 4rem; height: 4rem;">
                            <i class="fa-solid fa-wallet fs-2"></i>
                        </div>
                        <div class="text-center text-md-start text-lg-start text-xl-start text-xxl-start">
                            <h5 class="text-muted"><?= $d['nama_dompet'] ?></h5>
                            <div class="d-flex flex-column">
                                <small class="fw-medium" style="font-weight: 600 !important;">Rp <span class="poin" id="nominal-<?= $d['id'] ?>"><?= number_format($d['saldo'],0,'.','.') ?></span></small>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <div class="text-muted eye" style="opacity: .3;cursor: pointer;" data-target="nominal-<?= $d['id'] ?>">
                                <i class="fa-solid fs-4 fa-eye"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>

                <!-- <div class="col-sm col-md-4">
                    <div class="d-flex align-items-center gap-2 shadow p-3 rounded h-100 bg-white"
                            onmouseover="this.style.transform='scale(1.03) translateY(-9px)'" 
                            onmouseout="this.style.transform='scale(1) translateY(0)'" 
                            style="transition: .2s linear;">

                        <div class="rounded-circle d-flex justify-content-center align-items-center p-3 text-white" style="background-color: #1abc9c;width: 4rem; height: 4rem;">
                            <i class="fa-solid fa-wallet fs-2"></i>
                        </div>
                        <div>
                            <h5 class="text-muted">Testing</h5>
                            <div class="d-flex flex-column">
                                <small class="fw-medium">Rp ****</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm col-md-4">
                    <div class="d-flex align-items-center gap-2 shadow p-3 rounded h-100 bg-white"
                            onmouseover="this.style.transform='scale(1.03) translateY(-9px)'" 
                            onmouseout="this.style.transform='scale(1) translateY(0)'" 
                            style="transition: .2s linear;">

                        <div class="rounded-circle d-flex justify-content-center align-items-center p-3 text-white" style="background-color: #1abc9c;width: 4rem; height: 4rem;">
                            <i class="fa-solid fa-wallet fs-2"></i>
                        </div>
                        <div>
                            <h5 class="text-muted">Testing</h5>
                            <div class="d-flex flex-column">
                                <small class="fw-medium">Rp ****</small>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="col-sm col-md-4">
                    <a href="" class="d-flex gap-3 shadow-custom p-3 rounded h-100" style="background-color: #1abc9c; text-decoration:none; transition: .2s linear;" data-bs-toggle="modal" data-bs-target="#dompetModal" data-bs-whatever="@mdo" onmouseover="this.style.transform='scale(1.01) translateY(-5px)'" 
                            onmouseout="this.style.transform='scale(1) translateY(0)'">
                        <div class="rounded d-flex justify-content-center align-items-center p-3 text-white" style="width: 100%; height: 100%">
                            <i class="fa-solid fa-plus fs-1"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- transfer -->
        <div>
            <div class="mb-4 d-flex align-items-center">
                <h4>Data Transfers</h4>
                <div class="ms-auto">
                    <a href="" class="d-flex align-items-center justify-content-center rounded font-medium text-white" style="background-color: #1abc9c; width: 2.5rem; height: 2.5rem;" data-bs-toggle="modal" data-bs-target="#transferModal" title="Tambah data transfer" id="transferTooltip">
                        <i class="fa-solid fs-4 fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="row row-cols-2 g-2">
                <div class="col-sm col-md-4">
                    <div class="d-flex align-items-center justify-content-md-center justify-content-lg-start flex-column flex-sm-column flex-md-row flex-lg-row flex-xl-row flex-xxl-row gap-3 p-3 rounded h-100 shadow bg-white"
                            onmouseover="this.style.transform='scale(1.03) translateY(-9px)'" 
                            onmouseout="this.style.transform='scale(1) translateY(0)'" 
                            style="transition: .2s linear;">

                        <div class="rounded-circle d-flex justify-content-center align-items-center p-3 text-white" style="background-color: #1abc9c;width: 4rem; height: 4rem;">
                            <i class="fa-solid fa-money-bill-transfer fs-2"></i>
                        </div>
                        <div class="text-center text-sm-center text-md-start text-xl-start text-xxl-start">
                            <h5 class="text-muted">CIMB <i class="fa-solid fa-arrow-right-arrow-left mx-1"></i> Mandiri</h5>
                            <div class="d-flex flex-column">
                                <small class="fw-medium mb-2">Rp 100.000</small>
                                <small class="text-muted">12 Juli 2025</small>
                                <small class="text-muted">Lorem ipsum dolor sit amet.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-4">
                    <div class="d-flex align-items-center justify-content-md-center justify-content-lg-start flex-column flex-sm-column flex-md-row flex-lg-row flex-xl-row flex-xxl-row gap-3 p-3 rounded h-100 shadow bg-white"
                            onmouseover="this.style.transform='scale(1.03) translateY(-9px)'" 
                            onmouseout="this.style.transform='scale(1) translateY(0)'" 
                            style="transition: .2s linear;">

                        <div class="rounded-circle d-flex justify-content-center align-items-center p-3 text-white" style="background-color: #1abc9c;width: 4rem; height: 4rem;">
                            <i class="fa-solid fa-money-bill-transfer fs-2"></i>
                        </div>
                        <div class="text-center text-sm-center text-md-start text-xl-start text-xxl-start">
                            <h5 class="text-muted">CIMB <i class="fa-solid fa-arrow-right-arrow-left mx-1"></i> BRI</h5>
                            <div class="d-flex flex-column">
                                <small class="fw-medium mb-2">Rp 100.000</small>
                                <small class="text-muted">12 Juli 2025</small>
                                <small class="text-muted">Lorem ipsum dolor sit amet.</small>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>


<!-- Modal Tambah/Edit Tabungan Target -->
<div class="modal fade" id="dompetModal" tabindex="-1" role="dialog" aria-labelledby="targetSavingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="targetSavingsModalLabel">Catat Pemasukan</h5>
                <div>
                    <a type="button" class="text-light fs-4 me-2" style="display:none;" id="btn-hapus">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                    <a type="button" class="text-light fs-4" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="modal-body" style="background-color: var(--bs-bg)">
                <form action="<?= base_url('/dompet/add') ?>" method="post" id="addIncomeForm">
                    <input type="hidden" id="targetSavingsId">

                    <div class="mb-3">
                        <label for="dompet" class="form-label">Dompet</label>
                        <input type="text" class="form-control" id="dompet" name="dompet" placeholder="Ex: Cash, Bri, dll">
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="pemasukan" class="form-label">Saldo</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                                <input type="text" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" id="saldo" value="" name="saldo">
                            </div>
                        </div>
                        <div class="col">
                            <label for="cicilan" class="form-label">Saldo awal</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                                <input type="text" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" id="saldo-awal" value="" readonly name="saldo-awal">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" class="form-control" rows="3"></textarea>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
                    </div>    
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal transaksi transfer -->
<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="targetSavingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="targetSavingsModalLabel">Form Catat Transferan</h5>
                <div>
                    <a type="button" class="text-light fs-4 me-2" style="display:none;" id="btn-hapus">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                    <a type="button" class="text-light fs-4" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="modal-body overflow-x-hidden" style="background-color: var(--bs-bg)">
                <form action="<?= base_url('/dompet/add') ?>" method="post" id="addIncomeForm">
                    <input type="hidden" id="targetSavingsId">

                    <div class="mb-3">
                        <label for="dompet" class="form-label">Jumlah Transfer</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                            <input type="text" class="form-control" id="jmlTrf" name="dompet" placeholder="Ex: Cash, Bri, dll" inputmode="numeric">
                        </div>
                    </div>

                    <div class="row mb-3 position-relative">
                        <div class="col">
                            <label for="pemasukan" class="form-label">from Dompet</label>
                            <select name="fromDompet" id="fromDompet" class="form-select">
                                <option value="">--- Pilih Dompet ---</option>
                                <?php foreach($dompet as $d): ?>
                                <option value="<?= $d['id'] ?>"><?= $d['nama_dompet'] . " - Rp" . number_format($d['saldo'],0,'.','.') ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="position-absolute text-muted" style="bottom: 10%; left: 46%;">
                            <i class="fa-solid fa-arrow-right-arrow-left fs-6"></i>
                        </div>
                        <div class="col">
                            <label for="cicilan" class="form-label">to Dompet</label>
                            <div class="input-group">
                                <select name="toDompet" id="toDompet" class="form-select">
                                    <option value="">--- Pilih Dompet ---</option>
                                    <?php foreach($dompet as $d): ?>
                                        <option value="<?= $d['id'] ?>"><?= $d['nama_dompet'] ?> - Rp<?= number_format($d['saldo'],0,'.','.') ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Transaksi</label>
                        <input type="date" name="tanggaltrf" id="tanggaltrf" class="form-control" inputmode="date">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" class="form-control" rows="3"></textarea>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
                    </div>    
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // let denganRupiah = document.querySelector('.jml-keluar')
    let saldo = document.querySelector('#saldo')
    let saldoAwal = document.querySelector('#saldo-awal')
    let jmlTrf = document.querySelector('#jmlTrf')

    const formatRupiahMan = (angka, prefix)=>{
        let  number_string = angka.replace(/[^,\d]/g, '').toString(),
        split    = number_string.split(','),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
        
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
        
    saldo.addEventListener('keyup', function(e){
        saldo.value = formatRupiahMan(this.value)
        saldoAwal.value = saldo.value
    })

    saldoAwal.addEventListener('keyup', function(e){
        saldoAwal.value = formatRupiahMan(this.value)
    })

    jmlTrf.addEventListener('keyup', function(e){
        this.value = formatRupiahMan(this.value)
    })
</script>

<script>
    $(document).ready(function(){
        let isHidden = true;

        $('.poin').each(function(){
            let oriValue = $(this).text().trim();
            $(this).data('original', oriValue);
            $(this).text('*'.repeat(oriValue.length))
        })

        $('.eye').on('click', (e)=>{
            let samar = ''
            let targetId = $(e.currentTarget).data('target')
            let nominalTarget = $('#'+targetId)

            let icon = $(e.currentTarget).find('i')
            
            
            if(icon.hasClass('fa-eye')){
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
                nominalTarget.text(nominalTarget.data('original'))
            }else{
                icon.removeClass('fa-eye-slash').addClass('fa-eye')
                nominalTarget.text('*'.repeat(nominalTarget.data('original').length))
            }
        })

        $('#toggleAll').on('click', function() {
            if (isHidden) {
                $('.poin').each(function() {
                    $(this).text($(this).data('original')); // Tampilkan saldo asli
                });
                $('.eye i').removeClass('fa-eye').addClass('fa-eye-slash'); // Update ikon semua mata
                $('#toggleAll i').removeClass('fa-eye').addClass('fa-eye-slash'); // Update ikon tombol utama
                // $('#toggleAll').prepend('<i class="fa-solid fs-4 fa-eye-slash"></i>');
            } else {
                $('.poin').each(function() {
                    $(this).text('*'.repeat($(this).data('original').length)); // Sembunyikan dengan bintang
                });
                $('.eye i').removeClass('fa-eye-slash').addClass('fa-eye'); // Update ikon semua mata
                $('#toggleAll i').removeClass('fa-eye-slash').addClass('fa-eye'); // Update ikon tombol utama
                // $('#toggleAll').prepend('<i class="fa-solid fs-4 fa-eye"></i>');
            }
            isHidden = !isHidden; // Toggle status
        });
    })
</script>

<!-- tooltip -->
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const tooltipTrigger = document.getElementById('transferTooltip')
        const tooltip = new bootstrap.Tooltip(tooltipTrigger)
    })
</script>

<?= $this->endSection() ?>