<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 
    $remainingAmount = ($savings['total_saved']>0)?$savings['target_amount'] - $savings['total_saved']:$savings['target_amount'];
    $monthlyInstallment = ($savings['total_saved'] > 0)?$savings['jml_cicilan']:$savings['jml_cicilan'];
    // $monthlyInstallment = ($savings['total_saved'] > 0)?$savings['total_saved']:$savings['jml_cicilan'];
    // estimasi bulanan
    $monthsRemaining = ($monthlyInstallment > 0) ? ceil($remainingAmount/$monthlyInstallment):ceil($savings['target_amount']/$savings['jml_cicilan']);

    // Menghitung estimasi waktu dalam minggu dan hari
    $weeksRemaining = $monthlyInstallment > 0 ? ceil(($remainingAmount / $monthlyInstallment) * 4.34524) : ceil(($remainingAmount / $savings['jml_cicilan']) * 4.34524); // 1 bulan ≈ 4.34524 minggu
    $daysRemaining = $monthlyInstallment > 0 ? ceil(($remainingAmount / $monthlyInstallment) * 30.44) : ceil(($remainingAmount / $savings['jml_cicilan']) * 30.44);    // 1 bulan ≈ 30.44 hari

    $progress = ($savings['total_saved']>0)? number_format(($savings['total_saved']/$savings['target_amount'])*100,2):0;

    if($savings['frequency'] == "harian"){
        $frequency = "Hari";
    }else if($savings['frequency'] == "mingguan"){
        $frequency = "Minggu";
    }else{
        $frequency = "Bulan";
    }

    $kalimat = $savings['goal_name'];
    $ubah_kalimat = strtolower($kalimat);
    $goal_name = ucwords($ubah_kalimat);
?>

<!-- Then put toasts within -->
<div id="toastNotification" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header" style="background-color: var(--bs-primary)">
    <!-- <img src="..." class="rounded me-2" alt="..."> -->
    <div class="rounded me-2 bg-success" style="width: 20px; height: 20px;"></div>
    <strong class="me-auto text-light">MoneyMan Notif</strong>
    <!-- <small class="text-body-secondary"></small> -->
    <button type="button" class="btn" data-bs-dismiss="toast" aria-label="Close">
        <i class="fa-solid fa-times fs-4 text-light"></i>
    </button>
    </div>
    <div class="toast-body">
        See? Just like this.
    </div>
</div>

<section>
    <div class="container">
        <div>
            <div>
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-box">
                        <i class="fa-solid <?= $savings['icon'] ?>"></i> 
                    </div>
                    <div class="lh-1">
                        <h2>Savings Detail</h2>
                        <div style="margin-top:-3px">
                            <small class="text-muted fs-5"><?= $goal_name ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-2 mb-2">
                <div class="col-md-6">
                    <div class="shadow-custom rounded-3 mb-2 p-3 h-100" style="background-color:var(--bs-bg-card)">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="lh-1">
                                <h3>Rp<?= number_format($savings['target_amount'],0,'.','.') ?></h3>
                                <small class="text-muted fs-6">Rp<?= number_format($savings['jml_cicilan'],0,'.','.') ?> Per<?= $frequency ?></small>
                            </div>
                            <div>
                                <button class="btn icon-box me-0" onclick="openInstallmentModal(<?= $savings['id'] ?>)"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="flex-grow-1 mb-1" id="progress">
                            <div class="progress mt-2 mb-0" style="height: 6px; border-radius: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: <?= $progress ?>%; background-color: #384c57;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted"><?= $progress ?>% tercapai</small>
                        </div>
                        <hr>
                        <div class="d-flex flex-column">
                            <small><span class="text-muted">Dibuat:</span> <?= $savings['start_date'] ?></small>
                            <small><span class="text-muted">Estimasi:</span> <span id="estimasi-bulan"><?= $monthsRemaining ?></span> <?= $frequency ?> Lagi</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row h-100">
                        <div>
                            <div class="shadow-custom rounded-3 p-3 mb-2" style="background-color:var(--bs-bg-card)">
                                <h3>Estimasi</h3>
                                <div class="d-flex flex-column">
                                    <small><span class="text-muted">Bulanan :</span> <span id="estimasi2-bulan"><?= $monthsRemaining ?></span> Bulan</small>
                                    <small><span class="text-muted">Mingguan :</span> <span><?= $weeksRemaining ?></span> Minggu</small>
                                    <small><span class="text-muted">Harian :</span> <span><?= $daysRemaining ?></span> Hari</small>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="shadow-custom rounded-3 p-3 d-flex justify-content-around" style="background-color:var(--bs-bg-card)">
                                <div class="d-flex flex-column align-items-center w-50" style="border-right:2px solid #e0e0e0;">
                                    <small class="text-muted">Terkumpul</small>
                                    <small class="fw-medium fs-4 text-success" id="terkumpul">Rp<?= number_format($savings['total_saved'],0,'.','.') ?></small>
                                </div>
                                <div class="d-flex flex-column align-items-center w-50">
                                    <small class="text-muted">Kekurangan</small>
                                    <small class="fw-medium fs-4 text-danger" id="kekurangan">Rp<?= number_format($remainingAmount,0,'.','.') ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div>
                <div class="shadow-custom rounded-3 mb-2 p-3 d-flex justify-content-around" style="background-color:var(--bs-bg-card)">
                    <div class="d-flex flex-column align-items-center w-50" style="border-right:2px solid #e0e0e0;">
                        <small class="text-muted">Terkumpul</small>
                        <small class="fw-medium fs-4 text-success" id="terkumpul">Rp<?= number_format($savings['total_saved'],0,'.','.') ?></small>
                    </div>
                    <div class="d-flex flex-column align-items-center w-50">
                        <small class="text-muted">Kekurangan</small>
                        <small class="fw-medium fs-4 text-danger" id="kekurangan">Rp<?= number_format($remainingAmount,0,'.','.') ?></small>
                    </div>
                </div>
            </div>

            <div class="" style="border-radius: 12px;">
    <div class="">
        <!-- Riwayat Cicilan -->
        <div>
            <h5>Riwayat Cicilan</h5>
            <div class="list-group shadow-custom rounded-3" id="list-cicilan">
                <!-- Item Riwayat -->
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Rp1,000,000</strong>
                        <br>
                        <small class="text-muted">01 Nov 2024</small>
                    </div>
                    <span class="badge bg-success">✔</span>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Rp500,000</strong>
                        <br>
                        <small class="text-muted">15 Nov 2024</small>
                    </div>
                    <span class="badge bg-success">✔</span>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Rp2,000,000</strong>
                        <br>
                        <small class="text-muted">30 Nov 2024</small>
                    </div>
                    <span class="badge bg-success">✔</span>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</section>

<!-- Modal Tambah/Edit Tabungan Target -->
<div class="modal fade" id="installmentModal" tabindex="-1" role="dialog" aria-labelledby="targetSavingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="targetSavingsModalLabel">Tambah Cicilan</h5>
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
                <form id="addInstallmentForm">
                    <input type="hidden" id="targetSavingsId">
                    <div class="mb-2">
                        <label for="cicilan" class="form-label">Jumlah</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                            <input type="text" class="form-control" placeholder="Nominal" aria-label="Username" aria-describedby="basic-addon1" id="cicilan" value="<?= number_format($savings['jml_cicilan'],0,'.','.') ?>">
                        </div>
                    </div>

                    <div>
                        <label for="">Catatan</label>
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

<script>
    let cicilan = document.getElementById('cicilan');

    cicilan.addEventListener('keyup', function(e){
    cicilan.value = formatRupiah(this.value)
    })

    const formatRupiah = (angka, prefix)=>{
            angka = angka.toString()
            let  number_string = angka.replace(/[^,\d]/g, ''),
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
    
    window.openInstallmentModal = (savingId)=>{
        $('#savingId').val(savingId);
        $('#installmentHistory').html('');
        $.get('<?= base_url('savings/cicilan') ?>/' + savingId, function (data) {
            // console.log(data);
            // data.forEach(function (installment) {
            //     $('#installmentHistory').append(`<li class="list-group-item">
            //         <strong>Rp${installment.installment_amount}</strong> on ${installment.installment_date}
            //         <button class="btn btn-danger btn-sm float-end" onclick="deleteInstallment(${installment.id})">Delete</button>
            //     </li>`);
            // });
        });
        $('#installmentModal').modal('show');
    }

    
    $(document).ready(function(){
        $('#addInstallmentForm').on('submit', function (e) {
            let angka = $('#cicilan').val()
            let angkapisah = angka.split(".")
            let cicilan = angkapisah.join("")
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('/savings/installment/save') ?>",
                method: "POST",
                data: {
                    id: <?= $savings['id'] ?>,
                    jmlcicilan: cicilan,
                    catatan: $('#catatan').val(),
                },
                dataType: "JSON",
                success: (e)=>{
                    $('#installmentModal').modal('hide')
                    fetchSavingsDetail()
                    fetchSavings()
                    showToast('Tabungan berhasil ditambahkan!', 'success');
                }
            })
        });

        function fetchSavingsDetail(){
        $.ajax({
            url: "<?= base_url('savings/cicilan/'.$savings['id']) ?>",
            method: "GET",
            dataType: "JSON",
            success: (data)=>{
                $('#list-cicilan').html('')
                if(data.length == 0){
                    return $('#list-cicilan').append(`
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted" style="font-size: 14px;">Belum ada riwayat!</small>
                            </div>
                            <span class="badge">❌</span>
                        </div>
                    `)
                }
                
                data.forEach((e)=>{
                    $('#list-cicilan').append(`
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Rp${formatRupiah(e.jml_cicilan)}</strong>
                                <br>
                                <small class="text-muted">${e.tanggal}</small>
                            </div>
                            <span class="badge bg-success">✔</span>
                        </div>
                    `)
                })
            }
        })
        }

        const fetchSavings = ()=>{
            $.ajax({
                url: "<?= base_url('/savings/fetchsavings/'.$savings['id']) ?>",
                method: "GET",
                dataType: "JSON",
                success: (target)=>{
                    // Menghitung estimasi waktu
                    let remainingAmount = (target.total_saved>0)?target.target_amount - target.total_saved:target.target_amount;
                    let monthlyInstallment = (target.total_saved>0)?target.jml_cicilan : 0;
                    // let monthlyInstallment = (target.total_saved>0)?parseInt(target.total_saved) : parseInt(target.jml_cicilan);
                    // let monthsRemaining = monthlyInstallment > 0 ? Math.ceil(remainingAmount / monthlyInstallment) : 'N/A';
                    let monthsRemaining = monthlyInstallment>0?Math.ceil(remainingAmount/monthlyInstallment):Math.ceil(target.target_amount/target.jml_cicilan);

                    const progress = ((target.total_saved / target.target_amount) * 100).toFixed(2);
                    
                    $('#estimasi-bulan').html(monthsRemaining)
                    $('#estimasi2-bulan').html(monthsRemaining)
                    $('#terkumpul').text(`Rp${formatRupiah(target.total_saved)}`)
                    $('#kekurangan').text(`Rp${formatRupiah(remainingAmount)}`)
                    $('#progress').html(`
                        <div class="progress mt-2 mb-0" style="height: 6px; border-radius: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: ${progress}%; background-color: #384c57;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">${progress}% tercapai</small>
                    `)
                }
            })
        }


        // toast
        function showToast(message, type = 'success') {
            const toastEl = document.getElementById('toastNotification');
            const toastBody = toastEl.querySelector('.toast-body');
            
            // Atur pesan dan warna berdasarkan tipe
            toastBody.textContent = message;
            toastEl.classList.remove('text-bg-success', 'text-bg-danger');
            toastEl.classList.add(`text-bg-${type}`);

            // Tampilkan toast
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }

        fetchSavingsDetail()
        fetchSavings()
    })
</script>

<?= $this->endSection() ?>