<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="icon-box">
                        <i class="fa-solid fa-box"></i>
                    </div>
                    <h2>Pakai</h2>
                </div>    
                <div>
                    <button class="btn icon-box" onclick="openPakaiModal()"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
        </div>

        <div>
            <!-- Custom Period Input -->
            <div class="row mb-3 g-3" id="customPeriod">
                <div class="col-md-5">
                    <label for="startDate" class="form-label">Start Date:</label>
                    <input type="date" id="startDate" class="form-control" value="<?= date('Y-m-01') ?>">
                </div>
                <div class="col-md-5">
                    <label for="endDate" class="form-label">End Date:</label>
                    <input type="date" id="endDate" class="form-control" value="<?= date('Y-m-t') ?>">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <div class="input-group">
                        <select name="" id="" class="form-control" style="border-right: none;">
                            <option value="">Kategori</option>
                            <option value="">Tertinggi</option>
                            <option value="">Terendah</option>
                            <option value="">expense</option>
                            <option value="">income</option>
                        </select>
                        <span class="input-group-text bg-light" id="basic-addon1" style="border-left: none;"><i class="fa-solid fa-filter"></i></span>
                    </div>
                </div>
            </div>

            <div>
                <h2>List</h2>
                <!-- Grid Persegi Panjang -->
                <!-- <div id="" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2"> -->
                <div class="row row-cols-1 row-cols-lg-2 g-2">
                    <!-- Card Persegi Panjang -->
                    <?php foreach($pakai as $p): ?>
                        <?php 
                            $startDate = $p['tanggal_mulai'];
                            if($p['tanggal_selesai'] == '0000-00-00'){
                                $endDate = date('Y-m-d');
                            }else{
                                $endDate  = $p['tanggal_selesai'];
                            }
                            
                            $date1 = new DateTime($startDate);
                            $date2 = new DateTime($endDate);

                            $interval = $date1->diff($date2);
                        ?>
                    <div class="col" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?= $startDate . " s/d ". $endDate ?>">
                        <div class="p-3 shadow-custom rounded-4 position-relative btn-pakai overflow-hidden" style="background-color: #fafafa">
                            <?php if($p['tanggal_selesai'] != '0000-00-00'): ?>
                            <div class="tutup rounded-3"></div>
                            <?php endif; ?>
                            <div class="card-body d-flex align-items-center">
                                <!-- Ikon di sebelah kiri -->
                                <div class="icon-container icon-box me-3" style="font-size: 30px; color: #6c757d;">
                                    <i class="fa-solid <?= $p['icon'] ?>"></i>
                                </div>
                                <!-- Informasi Tabungan -->
                                <div class="flex-grow-1">
                                    <h6 class="card-title"><?= $p['nama'] ?></h6>
                                    <small class="card-text mb-0 text-muted d-block text-form"><?= $p['catatan'] ?></small>
                                    <small class="card-text text-muted text-form mb-0"><i class="fa-solid fa-calendar-alt"></i> <?= $interval->y ?> tahun <?= $interval->m ?> bulan <?= $interval->d ?> hari (<?= $interval->days ?>)</small>
                                </div>
                                <!-- Lingkaran Progress di sebelah kanan -->
                                <div class="circular-progress ms-3 me-1 shadow-sm" style="background: conic-gradient(#384c57 100%, #e0e0e0 100%);" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hari">
                                    <span><?= $interval->days ?></span>
                                </div>
                                <div class="">
                                    <div class="d-sm-flex <?= ($p['tanggal_selesai'] == '0000-00-00')? "con-pakai":"con-pakai-sudah"; ?> rounded-3">
                                        <?php if($p['tanggal_selesai'] == '0000-00-00'): ?>
                                            <div class="circular-progress me-1" style="background: conic-gradient(#384c57 100%, #e0e0e0 100%); cursor: pointer;" onclick="updatePakaiModal(<?= $p['id'] ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="edit">
                                                <i class="fa-solid fa-pen"></i>
                                            </div>
                                        <?php else: ?>
                                            <div class="circular-progress me-1" style="background: conic-gradient(#384c57 100%, #e0e0e0 100%); cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Done">
                                                <i class="fa-solid fa-check"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div class="circular-progress" style="background: conic-gradient(#384c57 100%, #e0e0e0 100%); cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus" onclick="hapus('<?= $p['slug'] ?>')">
                                            <i class="fa-solid fa-trash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <!-- Tambahkan lebih banyak card di sini jika diperlukan -->
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah/Edit Tabungan Target -->
<div class="modal fade" id="pakaiModal" tabindex="-1" role="dialog" aria-labelledby="targetSavingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="targetSavingsModalLabel">Catat Periode</h5>
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
                <form id="addPakaiForm" action="<?= base_url('/pakai/save') ?>" method="post">
                    <input type="hidden" id="targetSavingsId">

                    <div>
                        <label for="tanggl" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-select" id="tanggal-keluar" name="tanggal_mulai" value="<?= date('Y-m-d') ?>">
                    </div>

                    <div>
                        <label for="pemasukan" class="form-label">Nama Barang/Kegiatan</label>
                        <input type="text" class="form-control" id="name" name="nama" placeholder="ex: token listrik">
                    </div>

                    <div>
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option value="">--- Pilih Kategori ---</option>
                            <?php foreach($kategori as $k): ?>
                                <option value="<?php echo $k['id'] ?>"><?php echo $k['kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" class="form-control"></textarea>
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

<!-- Modal selesai Target -->
<div class="modal fade" id="pakaiUpdateModal" tabindex="-1" role="dialog" aria-labelledby="targetSavingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="targetSavingsModalLabel">Catat Periode</h5>
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
                <form id="updatePakaiForm">
                    <input type="hidden" id="targetSavingsId">

                    <div>
                        <label for="tanggl" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-select" id="tanggal-selesai" name="tanggal_mulai" value="<?= date('Y-m-d') ?>">
                    </div>

                    <div>
                        <label for="" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan-update" class="form-control"></textarea>
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
    window.openPakaiModal = ()=>{
        $('#pakaiModal').modal('show')
        $('#addPakaiForm')[0].reset()
    }
    window.updatePakaiModal = (i)=>{
        $('#pakaiUpdateModal').modal('show')
        $('#updatePakaiForm')[0].reset()
        id = i
        $('#updatePakaiForm').off('submit').on('submit', function(e){
            e.preventDefault()
            tanggalSelesai = $('#tanggal-selesai').val()
            catatan = $('#catatan-update').val()
            $.ajax({
                url: "<?= base_url('/pakai/update') ?>",
                method: "post",
                data: {id: id, tanggal: tanggalSelesai, catatan: catatan},
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        $('#pakaiUpdateModal').modal('hide')
                        location.reload()
                    }else{
                        alert('error:' + response.message)
                    }
                },
                error: function(){

                }
            })
        })
    }
</script>
<script>
    window.hapus = (e)=>{
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
                    url:"<?= base_url('/pakai/delete') ?>",
                    data:{slug: e},
                    method: 'post',
                    dataType: 'json',
                    success: function(data){
                        console.log(data)
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success",
                            allowOutsideClick: false,
                        }).then((result)=>{
                            if(result.isConfirmed){
                                location.reload()
                            }
                        }).finally(()=>{
                            location.reload()
                        });
                    },
                    error: function(){

                    }
                })
            }
        });
    }
</script>


<?= $this->endSection() ?>