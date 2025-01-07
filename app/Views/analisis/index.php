<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <section style="margin-top: -2rem">
        <div class="container container-sm container-md container-lg container-xl container-xxl container-fluid">
            <div>
                <div>
                    <h2>Kalender</h2>
                </div>
                <div class="shadow-custom bg-light p-2 rounded-3 mt-4">
                    <div id="calendar"></div>
                </div>
                
                <div class="mt-4">
                    <h2>Analisis</h2>
                </div>

                <div class="row g-2 mt-4">

                    <div class="col-md-4">
                        <div class="card bg-success shadow-custom" style="background-color: #fff !important;">
                            <div class="card-body text-center">
                                <h5>Total Income</h5>
                                <h3 class="text-success">Rp <?= number_format($totalIncome, 0, ',', '.') ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-danger shadow-custom" style="background-color: #fff !important;">
                            <div class="card-body text-center">
                                <h5>Total Expense</h5>
                                <h3 class="text-danger">Rp <?= number_format($totalExpense, 0, ',', '.') ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-primary shadow-custom" style="background-color: #fff !important;">
                            <div class="card-body text-center">
                                <h5>Savings</h5>
                                <h3>Rp <?= number_format($savings, 0, ',', '.') ?></h3>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row g-2 mt-1">

                    <div class="col-md-6">
                        <div class="card shadow-custom" style="background-color: #fff !important;">
                            <div class="card-body text-center">
                                <h5>Predicted Savings</h5>
                                <h3>Rp <?= number_format($predictedSavings, 0, ',', '.') ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-dark shadow-custom" style="background-color: #fff !important;">
                            <div class="card-body text-center">
                                <h5>Expense Alert</h5>
                                <p><?= `<span class="text-danger">$alert</span>` ?: '<span class="text-success">Semua dalam kendali.</span>' ?></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-4">
                    <h2>Chart</h2>
                </div>

                <div class="row g-2 mt-4">

                    <div class="col-md-6 shadow-custom p-2 bg-light rounded-3">
                        <canvas id="incomeChart"></canvas>
                    </div>
                    <div class="col-md-6 shadow-custom p-2 bg-light rounded-3">
                        <canvas id="expenseChart"></canvas>
                    </div>
                    
                    <div class="col-md-12 shadow-custom p-2 bg-light rounded-3">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <script>
    const incomeTrends = <?= json_encode($incomeTrends) ?>;
    const expenseTrends = <?= json_encode($expenseTrends) ?>;

    new Chart(document.getElementById('trendChart'), {
        type: 'line',
        data: {
            labels: incomeTrends.map(d => d.bulan), // Gunakan bulan sebagai label
            datasets: [
                {
                    label: 'Income',
                    data: incomeTrends.map(d => d.total),
                    borderColor: '#4caf50',
                    fill: false,
                },
                {
                    label: 'Expense',
                    data: expenseTrends.map(d => d.total),
                    borderColor: '#f44336',
                    fill: false,
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Monthly Income and Expense Trends'
                }
            }
        }
    });
</script>

    <script>
        const incomeData = <?= json_encode($incomeCategories) ?>;
        const expenseData = <?= json_encode($expenseCategories) ?>;

        new Chart(document.getElementById('incomeChart'), {
            type: 'pie',
            data: {
                labels: incomeData.map(d => d.kategori),
                datasets: [{
                    data: incomeData.map(d => d.total),
                    backgroundColor: ['#006ba6', '#0496ff', '#ffbc42', '#d81159','#8f2d56'],
                    borderColor: ['#006ba6', '#0496ff', '#ffbc42', '#d81159','#8f2d56']
                }]
            }
        });

        new Chart(document.getElementById('expenseChart'), {
            type: 'pie',
            data: {
                labels: expenseData.map(d => d.kategori),
                datasets: [{
                    data: expenseData.map(d => d.total),
                    // backgroundColor: ['#f44336', '#e57373', '#ff5722'],
                    // borderColor: ['#f44336', '#e57373', '#ff5722']
                    backgroundColor: ['#74b3ce', '#09bc8a', '#508991','#004346','#172a3a'],
                    borderColor: ['#74b3ce', '#09bc8a', '#508991','#004346','#172a3a']
                }]
            }
        });
    </script>

    <script>
    // document.addEventListener('DOMContentLoaded', function () {
    //     var calendarEl = document.getElementById('calendar');
    //     var calendar = new FullCalendar.Calendar(calendarEl, {
    //         initialView: window.innerWidth <= 768 ? 'listMonth' : 'dayGridMonth', // Responsif
    //         headerToolbar: {
    //             left: 'prev,next today',
    //             center: 'title',
    //             right: window.innerWidth <= 768 ? 'listMonth' : 'dayGridMonth'
    //         },
    //         events: function (fetchInfo, successCallback, failureCallback) {
    //             const calendarData = <?php //echo $calendarData ?>;
    //             const events = [];

    //             for (const [date, data] of Object.entries(calendarData)) {
    //                 const expense = data.expense ? `Expense: Rp${data.expense}` : 'Tidak ada';
    //                 const income = data.income ? `Income: Rp${data.income}` : 'Tidak ada';
    //                 const title = [expense, income].filter(Boolean).join('\n');
    //                 console.log(title)

    //                 events.push({
    //                     title: title,
    //                     start: date,
    //                     color: data.expense > data.income ? 'red' : 'green'
    //                 });
    //             }

    //             successCallback(events);
    //         },
    //         eventContent: function (info) {
    //             const title = info.event.title || '';
    //             // console.log(title.split('\n')[1])
    //             if (window.innerWidth <= 768) {
    //                 return {
    //                     html: `<div>
    //                                 <b>${title.split('\n')[0]}</b><br>
    //                                 <span>${title.split('\n')[1]}</span>
    //                         </div>`
    //                 };
    //             } else {
    //                 return {
    //                     html: `<div><b>${title}</b></div>`
    //                 };
    //             }
    //         }
    //     });

    //     calendar.render();

    //     // Update tampilan kalender saat ukuran layar berubah
    //     window.addEventListener('resize', function () {
    //         calendar.changeView(window.innerWidth <= 768 ? 'listMonth' : 'dayGridMonth');
    //     });
    // });


document.addEventListener('DOMContentLoaded', function () {
    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', { 
            style: 'currency', 
            currency: 'IDR',
            minimumFractionDigits: 0, // Tidak ada angka di belakang koma
            maximumFractionDigits: 0  // Tidak ada angka di belakang koma 
        }).format(number);
    }

    const url = window.location.origin

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        initialView: 'dayGridMonth',
        selectable: true,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listMonth'
        },
        events: function (fetchInfo, successCallback, failureCallback) {
            fetch(url+'/dataanalisiskalendar') // Sesuaikan dengan route Anda
                .then(response => response.json())
                .then(data => {
                    const events = data.map(item => ({
                        title: `${item.status == 1 ? 'Income' : 'Expense'}: ${formatRupiah(item.total)}`,
                        start: item.tanggal,
                        color: item.status == 1 ? 'rgba(75, 192, 192, 1)' : 'rgba(255, 99, 132, 1)',
                        textColor: 'white'
                    }));
                    successCallback(events);
                })
                .catch(error => {
                    console.error('Error fetching calendar data:', error);
                    failureCallback(error);
                });
        }
    });

    calendar.render();

    window.addEventListener('resize', function () {
        calendar.changeView(window.innerWidth <= 768 ? 'listMonth' : 'dayGridMonth');
    });
});
</script>

<?= $this->endSection() ?>