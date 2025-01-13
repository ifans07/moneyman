<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 

    $bulan = ["Jan", 'Feb', "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

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
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-box">
                        <i class="fa-solid fa-piggy-bank"></i>
                    </div>
                    <h3>Income</h3>
                </div>
                <div class="">
                    <button class="btn icon-box" onclick="openIncomeModal()"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>

            <div>
                <div>
                    <div class="month-carousel-wrapper">
                        <!-- Button Prev -->
                        <button class="carousel-btn left" id="prevBtn">&#8249;</button>

                        <!-- Carousel -->
                        <div class="month-carousel" id="monthCarousel">
                            <?php 
                                $no=1;
                                for($i=0; $i<count($bulan); $i++):
                            ?>
                                <div class="month-item" data-month="<?= $no++ ?>"><?= $bulan[$i] ?></div>
                            <?php endfor; ?>
                        </div>

                        <!-- Button Next -->
                        <button class="carousel-btn right" id="nextBtn">&#8250;</button>
                    </div>
                </div>

                <!-- Custom Period Input -->
                <div class="row mb-3 g-2" id="customPeriod">
                    <div class="col-md-5">
                        <label for="startDate" class="form-label">Start Date:</label>
                        <input type="date" id="startDate" class="form-control" value="<?= date('Y-m-01') ?>">
                    </div>
                    <div class="col-md-5">
                        <label for="endDate" class="form-label">End Date:</label>
                        <input type="date" id="endDate" class="form-control" value="<?= date('Y-m-t') ?>">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-primary w-100 fw-medium" onclick="fetchIncome()" disabled><i class="fa-solid fa-filter"></i> Filter</button>
                    </div>
                </div>

                <!-- Highlights -->
                <div class="row text-center mb-3 g-2">
                    <div class="col-md-4">
                        <div class="bg-light p-3 rounded-3 shadow-custom h-100">
                            <div class="d-flex justify-content-center align-items-center flex-column h-100">
                                <h5 class="text-muted">Total Pemasukan</h5>
                                <p id="totalSpent" class="display-6 m-0 text-success">Rp0</p>
                                <small class="text-muted m-0" id="bulanSpent">testing</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light p-3 rounded-3 shadow-custom h-100">
                            <div class="d-flex align-items-center justify-content-center flex-column h-100">
                                <h5 class="text-muted">Top Kategori</h5>
                                <p id="topCategory" class="display-6 m-0 text-success">-</p>
                                <small id="kategoriName" class="text-muted m-0">Testing</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light p-3 rounded-3 shadow-custom h-100">
                            <div class="d-flex justify-content-center align-items-center flex-column h-100">
                                <h5 class="text-muted">Analisis</h5>
                                <small id="comparisonText" class="small text-start">-</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tombol grafik -->
                <div class="my-3 btn-grafik d-flex justify-content-end">
                    <div class="">
                        <button class="btn btn-primary" onClick="changeChartType('bar')" id="bar"><i class="fa-solid fa-chart-column"></i></button>
                        <button class="btn btn-primary" onClick="changeChartType('pie')" id="pie"><i class="fa-solid fa-chart-pie"></i></button>
                        <button class="btn btn-primary" onClick="changeChartType('doughnut')" id="doughnut"><i class="fa-regular fa-circle"></i></button>
                        <button class="btn btn-primary" onClick="changeChartType('line')" id="line"><i class="fa-solid fa-chart-line"></i></button>
                        <button class="btn btn-primary" id="minimize"><i class="fa-solid fa-window-minimize"></i></button>
                    </div>
                </div>

                <!-- Chart -->
                <div class="mb-3 chart-container bg-light shadow-custom rounded-3 p-3">
                    <canvas id="incomeChart" style="display: none"></canvas>
                </div>

                <div class="mb-3">
                    <div class="bg-light shadow-custom rounded-3 p-3">
                        <h5 class="tengah text-muted">Rekomendasi & saran</h5>
                        <ul id="rekomen" class="text-start"></ul>
                    </div>
                </div>

                <div class="mb-3">
                    <h5>Incomes List</h5>
                    <div id="listIncome" class="row g-2">
                        <div class="d-flex bg-light shadow-custom p-3 rounded-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="testing">
                            <div class="icon-box">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center flex-grow-1">
                                <div class="lh-1">
                                    <h6>Testing</h6>
                                    <small class="text-muted">Catatan</small><br>
                                    <small class="text-muted">Tanggal: <span class="fw-medium">24-12-24</span></small>
                                </div>
                                <div class="">
                                    <span class="fw-medium fs-5 text-success">Rp0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah/Edit Tabungan Target -->
<div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="targetSavingsModalLabel" aria-hidden="true">
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
                <form id="addIncomeForm">
                    <input type="hidden" id="targetSavingsId">

                    <div>
                        <label for="tanggl" class="form-label">Tanggal</label>
                        <input type="date" class="form-select" id="tanggal-keluar">
                    </div>

                    <div>
                        <label for="pemasukan" class="form-label">Nama pemasukan</label>
                        <input type="text" class="form-control" id="name">
                    </div>

                    <div class="">
                        <label for="cicilan" class="form-label">Jumlah</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                            <input type="text" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" id="nominal" value="">
                        </div>
                    </div>

                    <div>
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option value="">--- Pilih Kategori ---</option>
                            <?php foreach($kategori_income as $ke): ?>
                                <option value="<?= $ke['id'] ?>"><?= $ke['kategori'] ?></option>
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

<script>
    let nominal = document.getElementById('nominal');

    nominal.addEventListener('keyup', function(e){
        nominal.value = formatRupiah(this.value)
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
</script>

<!-- submit form -->
<script>
    let dari = $('#startDate').val()
    let sampai = $('#endDate').val()
    
    // Fungsi untuk mengubah format tanggal
    // Daftar bulan dalam bahasa Indonesia
    const bulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    function formatTanggal(date) {
        // Pisahkan tanggal berdasarkan "-"
        const [tahun, bulanIndex, tanggal] = date.split("-");

        // Format: DD [Nama Bulan] YYYY
        return `${parseInt(tanggal)} ${bulan[parseInt(bulanIndex) - 1]} ${tahun}`;
    }

    // income modal
    window.openIncomeModal = ()=>{
        $('#incomeModal').modal('show');
        $('#addIncomeForm')[0].reset()
    }

    const incomeFetch = (dari, sampai)=>{
        if(!dari && !sampai){
            let dari = $('#startDate').val()
            let sampai = $('#endDate').val()
        }
        let html = '';
        let total = 0;
        $.ajax({
            url: "<?= base_url('/api/income/') ?>",
            method: "POST",
            data: {
                tanggal1: dari,
                tanggal2: sampai,
            },
            dataType: "JSON",
            success: (data)=>{
                const month = new Date().getMonth()
                if(data.length > 0){
                    data.forEach((income)=>{
                    let tanggals = income.date_income.split(" ")
                    
                    let tanggal = tanggals[0]
                    total+=parseInt(income.amount)
                    html+=`
                        <div class="d-flex bg-light shadow-custom p-3 rounded-3 position-relative overflow-hidden wrp-hapus-trx" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" data-bs-title="Kategori: ${income.kategori}<br>${formatTanggal(tanggal)}">

                            <div class="grp-hapus-trx">
                                <button class="btn" onclick="hapusTrx('${income.slug}')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus"><i class="fa-solid fa-trash fs-2 text-danger"></i></button>
                                <button class="btn disabled" style="border: none;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="coming soon">
                                    <i class="fa-solid fa-edit fs-2 text-secondary"></i>
                                </button>
                            </div>

                            <div class="icon-box">
                                <i class="fa-solid ${income.icon}"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center flex-grow-1">
                                <div class="lh-1">
                                    <h6>${income.name_income}</h6>
                                    <small class="text-muted">${income.description}</small><br>
                                    <small class="text-muted">Tanggal: <span class="fw-semibold">${tanggal}</span></small>
                                </div>
                                <div class="">
                                    <span class="fw-medium fs-5 text-success">Rp${formatRupiah(income.amount)}</span>
                                </div>
                            </div>
                        </div>
                    `
                })
                $('#listIncome').html(html)
                // $('[data-bs-toggle="tooltip"]').tooltip();
                // Initialize tooltip
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
                $('#totalSpent').html(`Rp${formatRupiah(total)}`)
                $('#bulanSpent').html(`${bulan[month]}`)
            }else{
                $('#listIncome').html(`
                <ul class="list-group">
                <li class="list-group-item text-center text-muted shadow-custom">No income recorded on periode ${dari} - ${sampai}</li>
                </ul>
                `)
                $('#totalSpent').html(`Rp${formatRupiah(total)}`)
            }
            }
        })
    }

    window.hapusTrx = (slug)=>{
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
                    url: "<?= base_url('/delete/income') ?>",
                    method: 'post',
                    data: {slug: slug},
                    // dataType: 'json',
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

    // top kategori
    const topKategori = (dari, sampai)=>{
        $.ajax({
            url: "<?= base_url('api/topkategori/income') ?>",
            method: "post",
            data: {
                tanggal1: dari,
                tanggal2: sampai
            },
            dataType: "JSON",
            success: (e)=>{
                $('#topCategory').html('Rp'+formatRupiah(e.total_income))
                $('#kategoriName').html(e.kategori)
            },
            error: ()=>{
                $('#topCategory').html('Rp'+formatRupiah(0))
                $('#kategoriName').html("No top kategori")
            }
        })
    }

    $(document).ready(function(){
        $('#addIncomeForm').on('submit', function(e){
            e.preventDefault();
            let angka = $('#nominal').val()
            let angkapisah = angka.split(".")
            let nominal = angkapisah.join("")
            $.ajax({
                url: "<?= base_url('income/save') ?>",
                method: "POST",
                data: {
                    tanggal: $('#tanggal-keluar').val(),
                    name: $('#name').val(),
                    jumlah: nominal,
                    kategori: $('#kategori').val(),
                    catatan: $('#catatan').val(),
                },
                dataType: "JSON",
                success: (data)=>{
                    $('#incomeModal').modal('hide')
                    incomeFetch(dari, sampai)
                    showToast('Pemasukan sudah di catat!', 'success');
                    let timerInterval;
                    Swal.fire({
                    title: "Data berhasil di tambahkan!",
                    html: "I will close & reload in <b></b> milliseconds.",
                    timer: 2000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log("I was closed by the timer");
                            location.reload()
                        }
                    });
                }
            })
        })

        // topkategori

        // toast
        function showToast(message, type = 'success') {
            const toastEl = document.getElementById('toastNotification');
            const toastBody = toastEl.querySelector('.toast-body');
            
            // Atur pesan dan warna berdasarkan tipe
            toastBody.textContent = message;
            toastEl.classList.remove('text-bg-success', 'text-bg-success');
            toastEl.classList.add(`text-bg-${type}`);

            // Tampilkan toast
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }

        incomeFetch(dari, sampai)
        topKategori(dari, sampai)
    })
</script>

<!-- Grafik atau diagram -->
<script>
    // Variabel global untuk grafik
    let incomeChart;

    // Fungsi untuk membuat grafik
    function createChart(chartType, labels = [], values = []) {
        const ctx = document.getElementById('incomeChart').getContext('2d');

        // Hapus grafik sebelumnya jika ada
        if (incomeChart) {
            incomeChart.destroy();
        }

        const total = values.reduce((acc, com)=>parseInt(acc)+parseInt(com),0);

        // Buat grafik baru
        incomeChart = new Chart(ctx, {
            type: chartType,
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pemasukan (Rp)',
                    data: values,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                let percentage = (parseInt(tooltipItem.raw)/total)*100;
                                // return `Rp ${tooltipItem.raw.toLocaleString('id-ID')}`;
                                return `Rp ${tooltipItem.formattedValue} (${percentage.toFixed(2)}%)`;
                            }
                        }
                    }
                },
                scales: chartType !== 'pie' && chartType !== 'doughnut' ? { // Non-pie charts need scales
                    y: {
                        beginAtZero: true
                    }
                } : undefined
            }
        });
    }

    // Fungsi untuk mengambil data dari API
    function fetchIncomeData(chartType, dari, sampai) {
        $.ajax({
            url: '<?= base_url('/api/incomekategori') ?>', // Endpoint API
            method: 'POST',
            data: {
                tanggal1: dari,
                tanggal2: sampai
            },
            dataType: 'json',
            success: function (data) {
                createChart(chartType, data.labels, data.values);
                $('#incomeChart').show()
            },
            error: function (xhr, status, error) {
                console.error('Gagal mengambil data:', error);
            }
        });
    }

    // Fungsi untuk mengganti jenis grafik
    function changeChartType(chartType = 'bar') {
        $('#incomeChart').show()
        // $('.chart-container').show()
        let dari = $('#startDate').val()
        let sampai = $('#endDate').val()
        fetchIncomeData(chartType, dari, sampai);
    }

    $('#minimize').on('click', function(){
        $('#incomeChart').hide()
        // $('.chart-container').hide()
    })


    // Inisialisasi grafik default
    document.addEventListener('DOMContentLoaded', () => {

        let dari = $('#startDate').val()
        let sampai = $('#endDate').val()
        fetchIncomeData('bar', dari, sampai); // Grafik default adalah line
    });
</script>

<!-- analisis -->
<script>
    // $(document).ready(function () {
            // Ambil data analisis dari API
            function fetchAnalysis(dari,sampai) {
                $.ajax({
                    url: '<?= base_url('/api/income/analysis/') ?>',
                    method: 'POST',
                    data:{
                        tanggal1: dari,
                        tanggal2: sampai
                    },
                    dataType: 'json',
                    success: function (data) {
                        renderAnalysis(data);
                        let html = ''
                        data.forEach((d)=>{
                            html+=`
                                <li>${d.recommendation}</li>
                            `
                        })
                        $('#recommendation').html(html)
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching analysis:", error);
                    }
                });
            }

            // Render tabel analisis
            function renderAnalysis(data) {
                
                let html = ''
                data.forEach(item => {
                    html+=`
                        <li>${item.recommendation}</li>
                    `
                });
                $('#rekomen').html(html)
            }

            // Jalankan fungsi
            fetchAnalysis(dari,sampai);
        // });
</script>

<!-- comparison -->
<script>
    let comparisonChart;

// Fungsi untuk mengambil data dari API
function fetchComparisonData() {
    $.ajax({
        url: '<?= base_url('/api/comparisonincome') ?>', // Endpoint API
        method: 'GET',
        dataType: "JSON",
        success: function (data) {
            const { currentMonth, lastMonth } = data;

            // Tampilkan teks analisis
            const diff = currentMonth - lastMonth;
            const percentage = lastMonth !== 0 ? (diff / lastMonth * 100).toFixed(2) : 0;
            const comparisonText = document.getElementById('comparisonText');
            if (diff > 0) {
                comparisonText.innerHTML = `Pemasukan bulan ini <span class="fw-semibold">meningkat</span> sebesar <span class="text-success fw-semibold">Rp${diff.toLocaleString('id-ID')}</span> (${percentage}%) dibandingkan bulan lalu.`;
            } else if (diff < 0) {
                comparisonText.innerHTML = `Pemasukan bulan ini berkurang sebesar Rp${Math.abs(diff).toLocaleString('id-ID')} (${Math.abs(percentage)}%) dibandingkan bulan lalu.`;
            } else {
                comparisonText.innerHTML = `Pemasukan bulan ini sama dengan bulan lalu.`;
            }

            // Tampilkan grafik
            // createComparisonChart(lastMonth, currentMonth);
        },
        error: function (xhr, status, error) {
            console.error('Gagal mengambil data perbandingan:', error);
        }
    });
}
fetchComparisonData()
</script>

<!-- filter menggunakan form tanggal -->
<script>
    $(document).ready(function(){
        $('#startDate, #endDate').on('change', ()=>{
            let dari = $('#startDate').val()
            let sampai = $('#endDate').val()
            const chartType = incomeChart?.config?.type || 'bar';
            incomeFetch(dari,sampai)
            topKategori(dari, sampai)
            changeChartType(chartType);
            fetchAnalysis(dari,sampai)
            // setTanggal("tanggal", dari, sampai)
        })
        // $('#endDate').on('change', function(){
        //     let dari = $('#startDate').val()
        //     let sampai = $('#endDate').val()
        //     const chartType = incomeChart?.config?.type || 'bar';
        //     incomeFetch(dari,sampai)
        //     topKategori(dari, sampai)
        //     changeChartType(chartType);
        //     fetchAnalysis(dari,sampai)
        // })
    })
</script>

<!-- filter menggunakan tombol bulan -->
<script>
        const monthCarousel = document.getElementById('monthCarousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const monthItems = document.querySelectorAll('.month-item');

    // Get Current Month (1-12)
    const currentMonth = new Date().getMonth() + 1;

    // Scroll Buttons
    prevBtn.addEventListener('click', () => {
        monthCarousel.scrollBy({ left: -120, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', () => {
        monthCarousel.scrollBy({ left: 120, behavior: 'smooth' });
    });

    // Highlight Active Month
    function setActiveMonth(month) {
        monthItems.forEach(item => {
            const monthValue = parseInt(item.getAttribute('data-month'), 10);
            if (monthValue === month) {
                item.classList.add('active');
                // Scroll to the active month
                item.scrollIntoView({ inline: 'center', behavior: 'smooth' });
            } else {
                item.classList.remove('active');
            }
        });
    }

    // Set Active Month on Page Load
    setActiveMonth(currentMonth);

    // Handle Click on Month Items
    function padStartManual(number) {
        return number < 10 ? '0' + number : number;
    }
    monthItems.forEach(item => {
        item.addEventListener('click', () => {
            const selectedMonth = parseInt(item.getAttribute('data-month'), 10);
            setActiveMonth(selectedMonth);
            const tahun = new Date().getFullYear()
            const tanggalAkhir = new Date(tahun, selectedMonth, 0).getDate()

            // Format tanggal awal dan akhir
            const formattedBulan = padStartManual(selectedMonth);
            const tanggalAwal = `${tahun}-${formattedBulan}-01`;
            const tanggalAkhirFormatted = `${tahun}-${formattedBulan}-${tanggalAkhir}`;
            
            // chart
            const chartType = incomeChart?.config?.type || 'bar';
            $('#startDate').val(tanggalAwal)
            $('#endDate').val(tanggalAkhirFormatted)
            
            alert(`Selected month: ${item.textContent} (${tanggalAwal}) s/d (${tanggalAkhirFormatted})`);

            incomeFetch(tanggalAwal,tanggalAkhirFormatted)
            topKategori(tanggalAwal,tanggalAkhirFormatted)
            changeChartType(chartType);
            fetchIncomeData(chartType,tanggalAwal,tanggalAkhirFormatted)
            fetchAnalysis(tanggalAwal,tanggalAkhirFormatted)
            // setTanggal("bulan", tanggalAwal, tanggalAkhirFormatted)
        });
    });
</script>

<?= $this->endSection() ?>