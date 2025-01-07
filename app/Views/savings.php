<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

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
                <h2><i class="fa-solid fa-piggy-bank"></i> Tabungan Target</h2>
            </div>
            <div class="my-3">
                <a href="<?= base_url('/beranda') ?>" class="btn btn-primary fw-medium"><i class="fa-solid fa-home"></i> Home</a>
                <button class="btn btn-primary" onclick="openAddModal()">Tambah Tabungan Target</button>
            </div>
            <div>
                <!-- table savings -->
        <div class="d-flex">
        <div class="btn-group mb-4 ms-auto" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked onclick="showGrid('detail')" style="">
            <label class="btn btn-outline-primary" for="btnradio1" style="border: 1px #384c57 solid;"><i class="fa-solid fa-list"></i></label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" onclick="showGrid('square')">
            <label class="btn btn-outline-primary" for="btnradio2" style="border: 1px #384c57 solid;"><i class="fa-solid fa-th-large"></i></label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" onclick="showGrid('rectangle')">
            <label class="btn btn-outline-primary" for="btnradio3" style="border: 1px #384c57 solid;"><i class="fa-solid fa-chart-bar"></i></label>
        </div>
        </div>

        <!-- Grid Panjang (Detail) -->
        <div id="grid-detail" class="row row-cols-1 g-2 d-none">

            <div class="col">
                <div class="card shadow-sm p-3" style="border-radius: 12px;">
                    <!-- Titik Hover -->
                    <div class="hover-dots position-absolute">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- Kotak Ikon di sebelah kiri -->
                        <div class="icon-box">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <!-- Informasi Tabungan Minimalis -->
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Nama Tabungan</h6>
                            <small class="text-muted d-block mb-1">Rp5,000,000 / Rp12,000,000</small>
                            <div class="progress mt-2 mb-0" style="height: 6px; border-radius: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 42%; background-color: #384c57;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">42% tercapai</small>
                        </div>
                        <!-- Estimasi waktu -->
                        <div class="text-end" style="font-size: 12px;">
                            <small>Estimasi Selesai</small>
                            <br>
                            <strong>23 bulan</strong>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Grid Kotak (Persegi) -->
        <div id="grid-square" class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2 d-none">
            <!-- Card Kotak -->

            <div class="col">
                <div class="card card-square shadow-sm">
                    <!-- Kotak Ikon -->
                    <div class="icon-box mx-auto mb-3">
                        <i class="fas fa-piggy-bank"></i>
                    </div>
                    <!-- Informasi Tabungan -->
                    <div>
                        <h6 class="mb-1">Nama Tabungan</h6>
                        <small class="text-muted d-block mb-1">Rp5,000,000 / Rp12,000,000</small>
                        <!-- Progress Bar -->
                        <div class="progress mx-auto" style="width: 80%;">
                            <div class="progress-bar" role="progressbar" style="width: 42%; background-color: #384c57;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">42% tercapai</small>
                    </div>
                    <!-- Tooltip untuk Estimasi -->
                    <div class="mt-2" data-bs-toggle="tooltip" title="Estimasi selesai dalam 23 bulan">
                        <i class="fas fa-calendar-alt text-secondary"></i>
                        <small class="text-secondary"> 23 bulan lagi</small>
                    </div>
                </div>
            </div>
            <!-- Tambahkan lebih banyak card di sini jika diperlukan -->
        </div>

        <!-- Grid Persegi Panjang -->
        <div id="grid-rectangle" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2 d-none">
            <!-- Card Persegi Panjang -->
            <div class="col">
                <div class="card shadow-sm" style="border-radius: 12px;">
                    <div class="card-body d-flex align-items-center">
                        <!-- Ikon di sebelah kiri -->
                        <div class="icon-container icon-box me-3" style="font-size: 30px; color: #6c757d;">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <!-- Informasi Tabungan -->
                        <div class="flex-grow-1">
                            <h6 class="card-title">Nama Tabungan</h6>
                            <small class="card-text mb-0 text-muted d-block text-form">Rp5,000,000 / Rp12,000,000</small>
                            <small class="card-text text-muted text-form mb-0"><i class="fa-solid fa-calendar-alt"></i> 23 bulan lagi</small>
                        </div>
                        <!-- Lingkaran Progress di sebelah kanan -->
                        <div class="circular-progress ms-3 shadow-sm" style="background: conic-gradient(#384c57 22%, #e0e0e0 22%);">
                            <span>42%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tambahkan lebih banyak card di sini jika diperlukan -->
        </div>


            </div>
        </div>
    </div>
    
</section>


<!-- Modal Tambah/Edit Tabungan Target -->
<div class="modal fade" id="targetSavingsModal" tabindex="-1" role="dialog" aria-labelledby="targetSavingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="targetSavingsModalLabel">Tambah Tabungan Target</h5>
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
                <form id="targetSavingsForm">
                    <input type="hidden" id="targetSavingsId">
                    <div class="form-group mb-2">
                        <label for="targetSavingsName" class="form-label">Nama Tabungan</label>
                        <input type="text" class="form-control" id="targetSavingsName" required>
                    </div>
                    <!-- <div class="form-group mb-2">
                        <label for="targetAmount" class="form-label">Jumlah Target</label>
                        <input type="number" class="form-control" id="targetAmount" required>
                    </div> -->
                    <div class="mb-2">
                        <label for="targetAmount" class="form-label">Jumlah Target</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                            <input type="text" class="form-control" placeholder="Nominal" aria-label="Username" aria-describedby="basic-addon1" id="targetAmount">
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="savedAmount" class="form-label">Jumlah Tersimpan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                            <input type="text" class="form-control" placeholder="Nominal" aria-label="Username" aria-describedby="basic-addon1" id="savedAmount">
                        </div>
                    </div>
                    <!-- <div class="form-group mb-2">
                        <label for="savedAmount" class="form-label">Jumlah Tersimpan</label>
                        <input type="number" class="form-control" id="savedAmount" required>
                    </div> -->
                    <div class="form-group mb-2">
                        <label for="period" class="form-label">Periode Angsuran</label>
                        <select class="form-select" id="period">
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="bulanan">Bulanan</option>
                            <!-- <option value="yearly">Tahunan</option> -->
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="selectedIcon" class="form-label" onclick="openIconModal()">Ikon Tabungan</label>
                        <div class="input-group">
                            <div class="w-100" onclick="openIconModal()">
                                <i class="fa-solid fa-user py-2 px-2 shadow-sm" style="font-size: 32px; background-color: #fafafa; color: var(--bs-primary)" id="icon-tampil"></i>
                            </div>
                            <input type="text" class="form-control" id="selectedIcon" readonly required onclick="openIconModal()" value="fa-user">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary" onclick="openIconModal()">Pilih Ikon</button>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 form-text">
                        <span class="" onclick="openKalkulatorTargetModal()" style="cursor: pointer">Hitung dengan kalkulator target</span>
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

<!-- Modal Pilih Ikon -->
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="iconModalLabel">Pilih Ikon</h5>
                <button type="button" class="btn text-light fs-4" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
            <div class="modal-body" style="background-color: var(--bs-bg)">
                <div class="icon-grid d-flex justify-content-around flex-wrap gap-2" id="iconGrid">
                    <!-- Ikon FontAwesome akan dimuat secara dinamis di sini -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Kalkulator Target -->
<div class="modal fade" id="kalkulatorModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="iconModalLabel">Kalkulator Target</h5>
                <button type="button" class="btn text-light fs-4" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
            <div class="modal-body" style="background-color: var(--bs-bg)">
                <div class="" id="kalkulator">
                    <div class="mb-3">
                        <label for="targetKalkulator" class="form-label">Nominal Target</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                            <input type="text" class="form-control" placeholder="Nominal" aria-label="Username" aria-describedby="basic-addon1" id="targetKalkulator">
                        </div>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="toggleSwitch">
                        <label class="form-check-label" for="toggleSwitch">Rencana Pengisian</label>
                    </div>
                    <div class="mb-3" id="tabunganTarget">
                        <label for="cicilanKalkulator" class="form-label">Nominal Cicilan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                            <input type="text" class="form-control" placeholder="Nominal" aria-label="Username" aria-describedby="basic-addon1" id="cicilanKalkulator">
                        </div>
                    </div>
                    <div class="row" id="rencanaPengisian" style="display: none;">
                        <div class="mb-3 col">
                            <label for="tanggalMulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggalMulai" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="mb-3 col">
                            <label for="tanggalTercapai" class="form-label">Tanggal Tercapai</label>
                            <input type="date" class="form-control" id="tanggalTercapai" placeholder="d/m/Y">
                        </div>
                    </div>
                    <div class="float-end mb-5">
                        <button class="btn btn-primary" id="calculate-button"><i class="fa-solid fa-calendar-alt"></i> Calculate</button>
                    </div>

                    <div id="resultsTabunganTarget" class="mt-5" style="display: none;"> 
                        <h3>Hasil</h3> 
                        <p>Frekuensi Cicilan Harian: <span id="daily_time"></span></p>
                        <p>Frekuensi Cicilan Mingguan: <span id="weekly_time"></span></p>
                        <p>Frekuensi Cicilan Bulanan: <span id="monthly_time"></span></p>
                        <p>Tahun: <span id="tahun"></span></p>
                    </div>
                    <div class="mt-5" id="resultsRencanaPengisian" style="display: none;">
                        <h3>Rencana Pengisian</h3>
                        <p><strong>Harian:</strong> <span id="rencanaHarian"></span></p>
                        <p><strong>Mingguan:</strong> <span id="rencanaMingguan"></span></p>
                        <p><strong>Bulanan:</strong> <span id="rencanaBulanan"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let targetAmount = document.getElementById('targetAmount');
    let savedAmount = document.getElementById('savedAmount');

    targetAmount.addEventListener('keyup', function(e){
       targetAmount.value = formatRupiah(this.value)
    })

    savedAmount.addEventListener('keyup', function(e){
        savedAmount.value = formatRupiah(this.value)
    })

    const formatRupiah = (angka, prefix)=>{
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

    // targetsavings.js
$(document).ready(function () {
    
    // Submit form untuk menambah atau mengedit target savings
    $('#targetSavingsForm').submit(function (event) {
        event.preventDefault();

        let id = $('#targetSavingsId').val();
        let url = id ? `<?= base_url('/api/targetsavings/') ?>${id}` : `<?= base_url('/api/saving') ?>`;
        let method = id ? 'POST' : 'POST';
        // console.log(id, url, method)

        $.ajax({
            url: url,
            method: method,
            data: {
                name: $('#targetSavingsName').val(),
                target_amount: $('#targetAmount').val(),
                jml_cicilan: $('#savedAmount').val(),
                icon_class: $('#selectedIcon').val(),
                period: $('#period').val(),
            },
            success: function (e) {
                console.log(e)
                $('#targetSavingsModal').modal('hide');
                fetchTargetSavings();
                showToast(id ? 'Tabungan '+ $('#targetSavingsName').val() +' berhasil diperbarui!' : 'Tabungan '+ $('#targetSavingsName').val() +' berhasil ditambahkan!', 'success');
            },
            error: ()=>{
                console.log('error')
            }
        });
    });

    // Function untuk membuka modal tambah
    window.openAddModal = function () {
        $('#targetSavingsModalLabel').text('Tambah Tabungan Target');
        $('#targetSavingsForm')[0].reset();
        $('#targetSavingsId').val('');
        $('#targetSavingsModal').modal('show');
        $('#btn-hapus').hide()
    };

    // Function untuk membuka modal edit
    window.openEditModal = function (id) {
        $.ajax({
            url: `/api/targetsavings/${id}`,
            method: "GET",
            success: function (data) {
                $('#targetSavingsModalLabel').text('Edit Tabungan Target');
                $('#targetSavingsId').val(data.id);
                $('#targetSavingsName').val(data.goal_name);
                $('#targetAmount').val(formatRupiah(data.target_amount));
                $('#savedAmount').val(formatRupiah(data.jml_cicilan));
                $('#selectedIcon').val(data.icon);
                $('#period').val(data.frequency);
                $('#icon-tampil').attr('class', 'fa-solid '+data.icon+' py-2 px-2 shadow-sm')
                $('#btn-hapus').show()
                $('#btn-hapus').attr('onClick',`deleteTargetSaving(${data.id})`);
                $('#targetSavingsModal').modal('show');
            }
        });
    };

    // Function untuk menghapus target savings
    // window.deleteTargetSaving = function (id) {
    //     if (confirm("Apakah Anda yakin ingin menghapus tabungan target ini?")) {
    //         $.ajax({
    //             url: `/api/targetsavings/${id}`,
    //             method: "DELETE",
    //             success: function () {
    //                 fetchTargetSavings();
    //             }
    //         });
    //     }
    // };
    // Fungsi untuk menghapus kategori
    window.deleteTargetSaving = function (id) {
        $('#targetSavingsModal').modal('hide')
        Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Tabungan ini akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fa-solid fa-check"></i> Ya, hapus!',
        cancelButtonText: '<i class="fa-solid fa-times"></i> Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `<?= base_url('api/targetsavings'); ?>/${id}`,
                type: 'DELETE',
                success: function () {
                    fetchTargetSavings();
                    showToast('Tabungan berhasil dihapus!', 'success');
                    Swal.fire(
                        'Dihapus!',
                        'Tabungan telah dihapus.',
                        'success'
                    );
                    $('#targetSavingsModal').modal('hide')
                },
                error: function () {
                    showToast('Gagal menghapus tabungan.', 'danger');
                    Swal.fire(
                        'Gagal!',
                        'Tabungan tidak dapat dihapus.',
                        'error'
                    );
                }
            });
        }else{
            $('#targetSavingsModal').modal('show')
        }
    });
        
    };

    // Function untuk membuka modal ikon
    window.openIconModal = function () {
        $('#iconModal').modal('show');
        let iconList = $('#iconGrid')
        iconList.empty()
        fetchIcons();
    };

    // Fetch ikon dari server
    function fetchIcons() {
        $.ajax({
            url: "<?= base_url('/ikon') ?>",
            method: "GET",
            success: function (icons) {
                
                let iconHtml = '';
                icons.forEach(icon => {
                    iconHtml += `
                        <div onclick="selectIcon('${icon.icon_class}')" class="d-flex justify-content-around align-items-center flex-column icon-width" style="height: 100px; width: 15%; cursor: pointer">
                            <i class="fa ${icon.icon_class} icon-choice" style="font-size: 32px; color: var(--bs-primary)"></i>
                            <p class="small-text mt-2">${icon.name}</p>
                        </div>
                    `;
                });
                $('#iconGrid').html(iconHtml);
            }
        });
    }

    // Function untuk memilih ikon
    window.selectIcon = function (iconClass) {
        $('#selectedIcon').val(iconClass);
        $('#iconModal').modal('hide');
        $('#icon-tampil').attr('class', 'fa-solid '+iconClass+' py-2 px-2 shadow-sm')
    };

    window.openKalkulatorTargetModal = function(e){
        $('#kalkulatorModal').modal('show');
    }


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
});        
</script>

<script>
    function calculateSavings() { 
        var totalSavings = parseFloat($('#targetKalkulator').val()); 
        var installment = parseFloat($('#cicilanKalkulator').val()); 
        var daysToComplete = totalSavings / installment; 
        var weeksToComplete = totalSavings / installment; 
        var monthsToComplete = totalSavings / installment;
        const tahun = Math.floor(monthsToComplete/12)
        const bulan = monthsToComplete % 12;
        
        $('#total_savings_result').text(totalSavings); 
        $('#installment_result').text(installment); 
        $('#daily_time').text(`${Math.ceil(daysToComplete)} hari`); 
        $('#weekly_time').text(`${Math.ceil(weeksToComplete)} minggu`); 
        $('#monthly_time').text(`${Math.ceil(monthsToComplete)} bulan`);
        $('#tahun').text(`${tahun} Tahun ${bulan} Bulan`)
        $('#resultsTabunganTarget').show();
    } 

    const calculateRencanaPengisian = ()=>{
        const targetTabungan = parseFloat($("#targetKalkulator").val());
        const tanggalMulai = new Date($("#tanggalMulai").val());
        const tanggalTercapai = new Date($("#tanggalTercapai").val());

        if (isNaN(targetTabungan) || targetTabungan <= 0 || isNaN(tanggalMulai) || isNaN(tanggalTercapai)) {
            $("#rencanaHarian").text("Masukkan data yang valid.");
            $("#rencanaMingguan").text("Masukkan data yang valid.");
            $("#rencanaBulanan").text("Masukkan data yang valid.");
            return;
        }

        // Hitung total hari antara tanggalMulai dan tanggalTercapai
        const totalHari = Math.ceil((tanggalTercapai - tanggalMulai) / (1000 * 60 * 60 * 24));

        if (totalHari <= 0) {
            $("#rencanaHarian").text("Tanggal target harus lebih besar dari tanggal mulai.");
            $("#rencanaMingguan").text("Tanggal target harus lebih besar dari tanggal mulai.");
            $("#rencanaBulanan").text("Tanggal target harus lebih besar dari tanggal mulai.");
            return;
        }

        // Hitung rencana pengisian
        const pengisianHarian = Math.ceil(targetTabungan / totalHari);
        const totalMinggu = Math.ceil(totalHari / 7);
        const pengisianMingguan = Math.ceil(targetTabungan / totalMinggu);
        const totalBulan = Math.ceil(totalHari / 30);
        const pengisianBulanan = Math.ceil(targetTabungan / totalBulan);

        console.log(pengisianHarian);

        // Tampilkan hasil
        $("#rencanaHarian").text(`Rp${pengisianHarian} selama ${totalHari} hari`);
        $("#rencanaMingguan").text(`Rp${pengisianMingguan} selama ${totalMinggu} minggu`);
        $("#rencanaBulanan").text(`Rp${pengisianBulanan} selama ${totalBulan} bulan`);
        $('#resultsRencanaPengisian').show()
    }

    $(document).ready(function() {
        $("#toggleSwitch").on("change", function () {
            if ($(this).is(":checked")) {
                $("#tabunganTarget").hide();
                $("#rencanaPengisian").show();
                $("#resultsRencanaPengisian").hide()
                $("#resultsTabunganTarget").hide()
            } else {
                $("#tabunganTarget").show();
                $("#rencanaPengisian").hide();
                $("#resultsRencanaPengisian").hide()
                $("#resultsTabunganTarget").hide()
            }
        });

        $('#calculate-button').click(function() { 
            if($('#toggleSwitch').is(':checked')){
                calculateRencanaPengisian()
                $('#resultsTabunganTarget').hide()
            }else{
                calculateSavings();
                $('#resultsRencanaPengisian').hide()
            }
        }); 
    });
</script>

<script>
    function fetchTargetSavings() {
    $.ajax({
        url: "<?= base_url('api/savings') ?>",
        method: "GET",
        success: function (data) {
            let detailView = '';
            let squareView = '';
            let rectangleView = '';

            data.forEach(function (target, index) {
                if(target.frequency == "harian"){
                    frequency = "Hari"
                }else if(target.frequency == "mingguan"){
                    frequency = "Minggu"
                }else{
                    frequency = "Bulan"
                }
                // Menghitung estimasi waktu
                let remainingAmount = (target.total_saved>0)?target.target_amount - target.total_saved:target.target_amount;
                // let monthlyInstallment = (target.total_saved>0)?target.total_saved || 0;
                let monthlyInstallment = (target.total_saved>0)?target.total_saved : target.jml_cicilan;
                // let monthsRemaining = monthlyInstallment > 0 ? Math.ceil(remainingAmount / monthlyInstallment) : 'N/A';
                let monthsRemaining = monthlyInstallment>0?Math.ceil(remainingAmount/monthlyInstallment):Math.ceil(target.target_amount/target.jml_cicilan);

                const progress = ((target.total_saved / target.target_amount) * 100).toFixed(2);

                // Tampilan Grid Panjang (Detail)
                detailView += `
                    <div class="col" onClick="openEditModal(${target.id})" style="cursor:pointer">
                <div class="card shadow-sm p-3 position-relative" style="border-radius: 12px;">
                
                <a href="<?= base_url('savings/detail/') ?>${target.id}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Informasi detail" class="position-absolute rounded-circle d-flex justify-content-center align-items-center" onclick="handleDotsClick('rectangle')" style="z-index:99; top: 5px; right: 5px; font-size:16px;">
                    <i class="fa-solid fa-circle-info"></i>
                </a>
                    <div class="d-flex align-items-center">
                        <!-- Kotak Ikon di sebelah kiri -->
                        <div class="icon-box">
                            <i class="fa-solid ${target.icon}"></i>
                        </div>
                        <!-- Informasi Tabungan Minimalis -->
                        <div class="flex-grow-1">
                            <h6 class="mb-1">${target.goal_name}</h6>
                            <small class="text-muted d-block mb-1">Rp${formatRupiah(target.total_saved)} / Rp${formatRupiah(target.target_amount)}</small>
                            <div class="progress mt-2 mb-0" style="height: 6px; border-radius: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: ${progress}%; background-color: #384c57;" aria-valuenow="${progress}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">${progress}% tercapai</small>
                        </div>
                        <!-- Estimasi waktu -->
                        <div class="text-end" style="font-size: 12px;">
                            <small>Estimasi Selesai</small>
                            <br>
                            <strong>${monthsRemaining} ${frequency}</strong>
                        </div>
                    </div>
                </div>
            </div>
                `;

                // Tampilan Grid Kotak (Persegi)
                squareView += `
                    <div class="col" onClick="openEditModal(${target.id})" style="cursor:pointer">
                <div class="card card-square shadow-sm position-relative">
                
                <a href="<?= base_url('savings/detail/') ?>${target.id}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Informasi detail" class="position-absolute rounded-circle d-flex justify-content-center align-items-center" onclick="handleDotsClick('rectangle')" style="z-index:99; top: 5px; right: 5px; font-size:16px;">
                    <i class="fa-solid fa-circle-info"></i>
                </a>
                    <!-- Kotak Ikon -->
                    <div class="icon-box mx-auto mb-3">
                        <i class="fa-solid ${target.icon}"></i>
                    </div>
                    <!-- Informasi Tabungan -->
                    <div>
                        <h6 class="mb-1">${target.goal_name}</h6>
                        <small class="text-muted d-block mb-1">Rp${formatRupiah(target.total_saved)} / Rp${formatRupiah(target.target_amount)}</small>
                        <!-- Progress Bar -->
                        <div class="progress mx-auto" style="width: 80%;">
                            <div class="progress-bar" role="progressbar" style="width: ${progress}%; background-color: #384c57;" aria-valuenow="${progress}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">${progress}% tercapai</small>
                    </div>
                    <!-- Tooltip untuk Estimasi -->
                    <div class="mt-2" data-bs-toggle="tooltip" title="Estimasi selesai dalam ${monthsRemaining} ${frequency}">
                        <i class="fas fa-calendar-alt text-secondary"></i>
                        <small class="text-secondary"> ${monthsRemaining} ${frequency} lagi</small>
                    </div>
                </div>
            </div>
                `;

                // Tampilan Grid Persegi Panjang
                rectangleView += `
                    <div class="col" style="cursor:pointer" onClick="openEditModal(${target.id})">
                    <div class="card shadow-custom position-relative" style="border-radius: 12px; background-color:#f7f9fa;">

            <a href="<?= base_url('savings/detail/') ?>${target.id}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Informasi detail" class="position-absolute rounded-circle d-flex justify-content-center align-items-center" onclick="handleDotsClick('rectangle')" style="z-index:99; top: 5px; right: 5px; font-size:16px;">
                <i class="fa-solid fa-circle-info"></i>
            </a>
                    <div class="card-body d-flex align-items-center">
                        <!-- Ikon di sebelah kiri -->
                        <div class="icon-container icon-box me-3" style="font-size: 30px; color: #6c757d;">
                            <i class="fa-solid ${target.icon}"></i>
                        </div>
                        <!-- Informasi Tabungan -->
                        <div class="flex-grow-1">
                            <h6 class="card-title">${target.goal_name}</h6>
                            <small class="card-text mb-0 text-muted d-block text-form">Rp${formatRupiah(target.total_saved)} / Rp${formatRupiah(target.target_amount)}</small>
                            <small class="card-text text-muted text-form mb-0"><i class="fa-solid fa-calendar-alt"></i> ${monthsRemaining} ${frequency} lagi</small>
                        </div>
                        <!-- Lingkaran Progress di sebelah kanan --!>
                        <div class="circular-progress ms-3 shadow-sm" style="background: conic-gradient(#384c57 ${progress}%, #e0e0e0 ${progress}%);">
                            <span>${progress}%</span>
                        </div>
                    </div>
                </div>
            </div>
                `;
            });

            // Mengisi kontainer dengan hasil tampilan grid
            $('#grid-detail').html(detailView);
            $('#grid-square').html(squareView);
            $('#grid-rectangle').html(rectangleView);

            // Inisialisasi tooltip untuk elemen yang baru ditambahkan
            $('[data-bs-toggle="tooltip"]').tooltip();
        }
    });
}

        function showGrid(gridType) {
            // Menyembunyikan semua grid
            $("#grid-detail, #grid-square, #grid-rectangle").addClass("d-none");

            // Menampilkan grid sesuai pilihan
            switch (gridType) {
                case 'detail':
                    $("#grid-detail").removeClass("d-none");
                    break;
                case 'square':
                    $("#grid-square").removeClass("d-none");
                    break;
                case 'rectangle':
                    $("#grid-rectangle").removeClass("d-none");
                    break;
            }
        }

        // Memilih grid default saat halaman pertama kali dimuat
        $(document).ready(function() {
            showGrid('detail'); // Atur grid awal yang akan tampil
            fetchTargetSavings(); // Memuat data pertama kali
            setInterval(fetchTargetSavings, 5000); // Memperbarui data setiap 5 detik
            $('[data-bs-toggle="tooltip"]').tooltip(); // Inisialisasi tooltip
        });

        function handleDotsClick(gridType){
            $('#targetSavingsModal').modal('hide')
        }
    </script>

<?= $this->endSection() ?>