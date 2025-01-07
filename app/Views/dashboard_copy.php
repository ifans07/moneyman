<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php
    if($expenseDay['amount'] == null){
        $expenseHari = 0;
    }
    if($incomeDay['amount'] == null){
        $incomeHari = 0;
    }
?>

    <section class="rounded-4 rounded-top-0 shadow" style="background-color: #384c57; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">

        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <div style="width: 200px; height: 200px; background-color: #bad6ca; border-radius: 50%; overflow:hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;" class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user" style="font-size: 12rem; margin-top: 2rem; color: #223642;"></i>
                        </div>
                        <p class="text-center fw-medium" style="font-size: 28px; color:#fafafa;">User 1</p>
                    </div>
                    <div class="mt-1">
                        <button class="btn btn-dark fw-medium w-100" style="background-color: #bad6ca; color: #333333;">Lihat Profil</button>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div>
                        <h2 style="font-size: 28px; color: #fafafa;">Income</h2>
                        <div class="d-flex flex-column gap-3">
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Hari ini: Rp<?= $incomeHari ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Bulan ini: Rp<?= number_format($incomeMonth['amount'],0,'.','.') ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Tahun ini: Rp<?= number_format($incomeYear['amount'],0,'.','.') ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Tahun ini: </span>
                        </div>
                        <div class="mt-4">
                            <a href="<?= base_url('/income') ?>" class="btn btn-secondary fw-medium w-100" style="background-color: #bad6ca; color: #333333;">Selengkapnya &raquo;</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                <div>
                        <h2 style="font-size: 28px; color: #fafafa;">Expenses</h2>
                        <div class="d-flex flex-column gap-3">
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Hari ini: Rp<?= $expenseHari ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Bulan ini: Rp<?= number_format($expenseMonth['amount'],0,'.','.') ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Tahun ini: Rp<?= number_format($expenseYear['amount'],0,'.','.') ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Tahun ini: </span>
                        </div>
                        <div class="mt-4">
                            <a href="<?= base_url('/expenses') ?>" class="btn btn-secondary fw-medium w-100" style="background-color: #bad6ca; color: #333333;">Selengkapnya &raquo;</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mt-5">
                    <div>
                        <canvas id="myPieChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section style="margin-top: -2rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div style="margin-bottom: 1.4rem;">
                        <h2 style="color: #333333; font-size: 28px;">Transaksi Saat Ini</h2>
                    </div>
                    <div>
                        <div>
                            <?php foreach($expenseIncome as $ei): ?>
                                <div class="d-flex align-items-center justify-content-between p-2 rounded-4 mb-1" style="background-color: #f7f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="d-flex align-items-center justify-content-center rounded-4" style="width: 3rem; height: 3rem; background-color: #384c57; color: #fafafa;">
                                            <i class="fa-solid <?= $ei['icon'] ?>"></i>
                                        </div>
                                        <div class="lh-1">
                                            <h5 style="font-size: 18px" class="m-0 p-0"><?= $ei['name'] ?></h5>
                                            <small class="m-0 p-0 form-text" style="font-size: 12px"><?= $ei['description'] ?></small><br>
                                            <small class="text-muted"><?= $ei['tanggal'] ?></small>
                                        </div>
                                    </div>
                                    <div>
                                        <span style="font-size: 1.2rem;" class="fw-medium <?= ($ei['status'] == 1)?"text-success":"text-danger" ?>">Rp<?= number_format($ei['amount'],0,'.','.') ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div class="d-flex align-items-center justify-content-between p-2 rounded-4 mb-1" style="background-color: #f7f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                <div class="d-flex gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-4" style="width: 3rem; height: 3rem; background-color: #384c57; color: #fafafa;">
                                        <i class="fa-solid fa-1"></i>
                                    </div>
                                    <div class="lh-1">
                                        <h3 style="font-size: 24px" class="m-0 p-0">Total Income</h3>
                                        <small class="m-0 p-0 form-text" style="font-size: 12px">Lorem ipsum dolor sit amet.</small>
                                    </div>
                                </div>
                                <div>
                                    <span style="font-size: 1.2rem;" class="fw-medium text-success">Rp25.000</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded-4 mb-1" style="background-color: #f7f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                <div class="d-flex gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-4" style="width: 3rem; height: 3rem; background-color: #384c57; color: #fafafa;">
                                        <i class="fa-solid fa-1"></i>
                                    </div>
                                    <div class="lh-1">
                                        <h3 style="font-size: 24px" class="m-0 p-0">Total Income</h3>
                                        <small class="m-0 p-0 form-text" style="font-size: 12px">Lorem ipsum dolor sit amet.</small>
                                    </div>
                                </div>
                                <div>
                                    <span style="font-size: 1.2rem;" class="fw-medium text-success">Rp25.000</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded-4 mb-1" style="background-color: #f7f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                <div class="d-flex gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-4" style="width: 3rem; height: 3rem; background-color: #384c57; color: #fafafa;">
                                        <i class="fa-solid fa-1"></i>
                                    </div>
                                    <div class="lh-1">
                                        <h3 style="font-size: 24px" class="m-0 p-0">Total Income</h3>
                                        <small class="m-0 p-0 form-text" style="font-size: 12px">Lorem ipsum dolor sit amet.</small>
                                    </div>
                                </div>
                                <div>
                                    <span style="font-size: 1.2rem;" class="fw-medium text-success">Rp25.000</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded-4 mb-1" style="background-color: #f7f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                <div class="d-flex gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-4" style="width: 3rem; height: 3rem; background-color: #384c57; color: #fafafa;">
                                        <i class="fa-solid fa-1"></i>
                                    </div>
                                    <div class="lh-1">
                                        <h3 style="font-size: 24px" class="m-0 p-0">Total Income</h3>
                                        <small class="m-0 p-0 form-text" style="font-size: 12px">Lorem ipsum dolor sit amet.</small>
                                    </div>
                                </div>
                                <div>
                                    <span style="font-size: 1.2rem;" class="fw-medium text-success">Rp25.000</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded-4 mb-1" style="background-color: #f7f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                <div class="d-flex gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-4" style="width: 3rem; height: 3rem; background-color: #384c57; color: #fafafa;">
                                        <i class="fa-solid fa-1"></i>
                                    </div>
                                    <div class="lh-1">
                                        <h3 style="font-size: 24px" class="m-0 p-0">Total Income</h3>
                                        <small class="m-0 p-0 form-text" style="font-size: 12px">Lorem ipsum dolor sit amet.</small>
                                    </div>
                                </div>
                                <div>
                                    <span style="font-size: 1.2rem;" class="fw-medium text-success">Rp25.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="rounded-4" style="background-color: #bad6ca; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                        <div class="py-1 px-3">
                            <h2 class="text-center" style="color:#333333; font-size:28px;">Savings Goal</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center justify-content-center p-3" style="background-color: #384c57; border-radius: 50%; height: 90px; width: 90px;">
                                        <h3 style="font-size: 34px; color: #fafafa" class="text-success">50%</h3>
                                    </div>
                                    <div>
                                        <h3 class="" style="font-size:28px;">Income</h3>
                                        <small class="form-text">Total Rp100.000</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center justify-content-center flex-column p-3" style="background-color: #384c57; border-radius: 50%; height: 90px; width: 90px;">
                                        <h3 style="font-size: 34px; color: #fafafa;" class="text-danger">50%</h3>
                                    </div>
                                    <div>
                                        <h3 class="" style="font-size:28px;">Expenses</h3>
                                        <small class="form-text">Total Rp100.000</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-3 mb-3">
                            <h2 style="font-size: 28px;">Transaksi</h2>
                        </div>
                        <div>
                            <ul class="list-group rounded-4" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A fourth item</li>
                                <li class="list-group-item">And a fifth one</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="rounded-4" style="background-color: #384c57; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                        <a href="" class="d-flex align-items-center justify-content-center flex-column p-3">
                            <i class="fa-solid fa-bolt" style="font-size: 76px; color: #bad6ca"></i>
                            <p style="color:#fafafa; font-size: 18px" class="fw-medium mt-3">Add Transaksi</p>
                        </a>
                    </div>
                    <div class="mt-3 rounded-4 p-1" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s; background-color: #fafafa">
                        <div>
                            <h2 style="font-size: 24px;">Recognitions</h2>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                            <li class="list-group-item">A fourth item</li>
                            <li class="list-group-item">And a fifth one</li>
                        </ul>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-dark fw-medium w-100 rounded-4" style="background-color: #384c57"><i class="fa-solid fa-chart-pie"></i> Analisis</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const ctx = document.getElementById('myPieChart').getContext('2d');

        // Data untuk Pie Chart
        const data = {
            labels: ["Income", "Expenses", "Savings"],
            datasets: [{
                label: "Financial Distribution",
                data: [50, 30, 20],  // Persentase untuk setiap kategori
                backgroundColor: [
                    "#4CAF50", // Hijau untuk income
                    "#F44336", // Merah untuk expenses
                    "#2196F3"  // Biru untuk savings
                ],
                hoverOffset: 1
            }]
        };

        let centerText = '100%'

        // Konfigurasi Pie Chart
        const config = {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#fafafa',
                            font: {
                                size: 14
                            }
                        }
                    },
                    // tooltip: {
                    //     callbacks: {
                    //         label: function(context) {
                    //             const label = context.label || '';
                    //             const value = context.raw || '';
                    //             return label + ': ' + value + '%';
                    //         }
                    //     }
                    // }
                    tooltip: {
                        enabled: true
                    }
                },
                onHover: (event, elements) => {
                if (elements.length) {
                    const index = elements[0].index;
                    centerText = `${data.datasets[0].data[index]}%`; // Menampilkan label dan nilai pada hover
                } else {
                    centerText = '100%'; // Default text
                }
                    myPieChart.update(); // Update chart untuk merender teks
                }
            },
            plugins: [{
            id: 'centerText',
            beforeDraw: function(chart) {
                const width = chart.width,
                      height = chart.height,
                      ctx = chart.ctx;
                
                ctx.restore();
                const fontSize = (height / 130).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "middle";

                ctx.fillStyle = '#fafafa'
                const text = centerText,
                      textX = Math.round((width - ctx.measureText(text).width) / 2),
                      textY = height / 2.4;

                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        }]
        };

        // Inisialisasi Chart
        const myPieChart = new Chart(
            ctx,
            config
        );
    </script>

<?= $this->endSection() ?>
