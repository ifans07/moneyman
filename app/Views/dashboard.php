<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php
    $totalKategoriExpense = 0;
    $totalKategoriIncome = 0;
    foreach($kategori as $gori){
        if($gori['status'] == 1){
            $totalKategoriIncome += $gori['total_income'];
        }else{
            $totalKategoriExpense += $gori['total_expenses'];
        }
    }

    // $expenseHari = 0;
    if($expenseDay['amount'] == null){
        $expenseHari = 0;
    }else{
        $expenseHari = number_format($expenseDay['amount'],0,'.','.');
    }
    if($incomeDay['amount'] == null){
        $incomeHari = 0;
    }else{
        $incomeHari = $incomeDay['amount'];
    }

    $totalIncome = 0;
    $totalExpense = 0;
    $total = 0;
    $value = [];
    $label = [];
    $label = ['income', 'expense'];
    foreach($bigToSmall as $exin){
        $total+=$exin['amount'];
    }
    foreach($allIncome as $ai){
        $totalIncome += $ai['amount'];
    }
    
    foreach($allExpense as $ae){
        $totalExpense += $ae['amount'];
    }
    if($total != 0){
        $value[] = number_format(($totalIncome/$totalAmount)*100,0);
        $value[] = number_format(($totalExpense/$totalAmount)*100,0);
    }
    // dd($value);
?>

    <section class="rounded-4 rounded-top-0 shadow" style="background-color: #384c57; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s; padding: 100px 0;">

        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <div style="width: 200px; height: 200px; background-color: #bad6ca; border-radius: 50%; overflow:hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;" class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user" style="font-size: 12rem; margin-top: 2rem; color: #223642;"></i>
                        </div>
                        <p class="text-center fw-medium" style="font-size: 28px; color:#fafafa;"><?= session()->get('username') ?></p>
                    </div>
                    <div class="mt-1">
                        <a href="<?= base_url('user/profil') ?>" class="btn btn-dark fw-medium w-100" style="background-color: #bad6ca; color: #333333;">Lihat Profil</a>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div>
                        <h2 style="font-size: 28px; color: #fafafa;">Income</h2>
                        <div class="d-flex flex-column gap-3">
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Hari ini: Rp<?= $incomeHari ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Bulan ini: Rp<?= number_format((int) $incomeMonth['amount'],0,'.','.') ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Tahun ini: Rp<?= number_format((int) $incomeYear['amount'],0,'.','.') ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Total : Rp<?= number_format($totalIncome,0,'.','.') ?></span>
                        </div>
                        <div class="mt-4">
                            <a href="<?= base_url('/income') ?>" class="btn btn-secondary fw-medium w-100" style="background-color: #bad6ca; color: #333333;">Selengkapnya &raquo;</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-5">
                    <div>
                        <h2 style="font-size: 28px; color: #fafafa;">Expenses</h2>
                        <div class="d-flex flex-column gap-3">
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Hari ini: Rp<?= $expenseHari ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Bulan ini: Rp<?= number_format((int) $expenseMonth['amount'],0,'.','.') ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Tahun ini: Rp<?= number_format((int) $expenseYear['amount'],0,'.','.' ?? 0) ?></span>
                            <span class="btn btn-secondary text-start" style="background-color: #dae2ed; color:#333333;">Total: Rp<?= number_format($totalExpense,0,'.','.') ?></span>
                        </div>
                        <div class="mt-4">
                            <a href="<?= base_url('/expenses') ?>" class="btn btn-secondary fw-medium w-100" style="background-color: #bad6ca; color: #333333;">Selengkapnya &raquo;</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div>
                        <canvas id="myPieChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="row g-2 mt-3" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                <div class="col-md-6" style="height: 400px; width: 400px;">
                    <canvas id="incomeChart"></canvas>
                </div>
                <div class="col-md-6" style="height: 400px; width: 400px;">
                    <canvas id="expenseChart"></canvas>
                </div>
            </div>
        </div>

    </section>

    <section style="margin-top: 2rem; margin-bottom: 2rem;">
        <div class="container">

            <!-- Custom Period Input -->
            <div class="row mb-5 g-2" id="customPeriod">
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

            <div class="row">
                <div class="col-md-6 mb-5">
                    <div style="margin-bottom: 1.4rem;">
                        <h2 style="color: #333333; font-size: 28px;">Transaksi Saat Ini</h2>
                    </div>
                    <div>
                        <div class="mb-3">
                            <?php if(count($expenseIncome) != 0): ?>
                            <?php foreach($expenseIncome as $ei): ?>
                                <div class="d-flex align-items-center justify-content-between p-3 rounded-3 mb-2 position-relative overflow-hidden wrp-hapus" style="background-color: #f7f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                    <div class="grp-hapus">
                                        <button class="btn" onclick="hapusTransaksi('<?= $ei['slug'] ?>','<?= $ei['status'] ?>')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus"><i class="fa-solid fa-trash fs-2 text-danger"></i></button>
                                        <button class="btn disabled" style="border: none;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="coming soon">
                                            <i class="fa-solid fa-edit fs-2 text-secondary"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 3rem; height: 3rem; background-color: #384c57; color: #fafafa;">
                                            <i class="fa-solid <?= $ei['icon'] ?> text-warning"></i>
                                        </div>
                                        <div class="lh-1">
                                            <h5 style="font-size: 18px" class="mb-1 p-0"><?= $ei['name'] ?></h5>
                                            <small class="m-0 p-0 form-text" style="font-size: 12px"><?= $ei['description'] ?></small><br>
                                            <small class="text-muted" style="font-size: 12px"><?= $ei['tanggal'] ?></small>
                                        </div>
                                    </div>
                                    <div>
                                        <span style="font-size: 1.2rem;" class="fw-medium <?= ($ei['status'] == 1)?"text-success":"text-danger" ?>">Rp<?= number_format($ei['amount'],0,'.','.') ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                                <div class="shadow-custom p-3 bg-light rounded-3">Belum ada transaksi!</div>
                            <?php endif; ?>
                        </div>

                       <!-- Pagination Data A -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center shadow-custom p-3 rounded-3" style="background-color: #384c57">
                                <li class="page-item <?= ($pagerA['currentPage'] <= 1) ? 'disabled' : '' ?> shadow-custom rounded-3">
                                    <a class="page-link" href="?pageA=<?= $pagerA['currentPage'] - 1 ?>&pageB=<?= $pagerB['currentPage'] ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $pagerA['totalPages']; $i++): ?>
                                    <li class="page-item <?= ($pagerA['currentPage'] == $i) ? 'active' : '' ?> shadow-custom">
                                        <a class="page-link" href="?pageA=<?= $i ?>&pageB=<?= $pagerB['currentPage'] ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?= ($pagerA['currentPage'] >= $pagerA['totalPages']) ? 'disabled' : '' ?> shadow-custom rounded-3">
                                    <a class="page-link" href="?pageA=<?= $pagerA['currentPage'] + 1 ?>&pageB=<?= $pagerB['currentPage'] ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="rounded-3" style="background-color: #bad6ca; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                        <div class="py-1 px-3">
                            <h2 class="text-center" style="color:#333333; font-size:28px;">Savings Goal</h2>
                            <div class="row justify-content-center align-items-center text-center g-3">
                                <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                                    <div class="d-flex align-items-center justify-content-center p-3" style="background-color: #384c57; border-radius: 50%; height: 90px; width: 90px;">
                                        <h3 style="font-size: 34px; color: #fafafa" class="text-success">
                                            <?php if($total != 0): ?>
                                                <?= number_format(($totalIncome/$totalAmount)*100,0) ?>%
                                            <?php else: ?>
                                                0%
                                            <?php endif; ?>
                                        </h3>
                                    </div>
                                    <div>
                                        <h3 class="" style="font-size:28px;">Income</h3>
                                        <small class="form-text">Total Rp<?= number_format($totalIncome,0,'.','.') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                                    <div class="d-flex align-items-center justify-content-center flex-column p-3" style="background-color: #384c57; border-radius: 50%; height: 90px; width: 90px;">
                                        <h3 style="font-size: 34px; color: #fafafa;" class="text-danger">
                                            <?php if($total != 0): ?>
                                                <?= number_format(($totalExpense/$totalAmount)*100,0) ?>%
                                            <?php else: ?>
                                                0%
                                            <?php endif; ?>
                                        </h3>
                                    </div>
                                    <div>
                                        <h3 class="" style="font-size:28px;">Expenses</h3>
                                        <small class="form-text">Total Rp<?= number_format($totalExpense,0,'.','.') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-3 mb-3">
                            <h2 style="font-size: 28px;">Jumlah Transaksi Terbanyak</h2>
                        </div>
                        <div class="mb-3">
                            <ul class="list-group rounded-3" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(17, 10, 10, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                                <?php if(count($bigToSmall) != 0): ?>
                                <?php foreach($bigToSmall as $bts): ?>
                                <li class="list-group-item <?= ($bts['status'] == 1)?"text-success":"text-danger" ?>">Rp<?= number_format($bts['amount'],0,'.','.') ?> - <?= $bts['kategori'] ?> - <?= $bts['name'] ?></li>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <li class="list-group-item">Belum ada Transaksi!</li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <!-- Pagination Data B -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center p-3 shadow-custom rounded-3" style="background-color: #384c57">
                                <li class="page-item <?= ($pagerB['currentPage'] <= 1) ? 'disabled' : '' ?> shadow-custom rounded-3">
                                    <a class="page-link" href="?pageA=<?= $pagerA['currentPage'] ?>&pageB=<?= $pagerB['currentPage'] - 1 ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $pagerB['totalPages']; $i++): ?>
                                    <li class="page-item <?= ($pagerB['currentPage'] == $i) ? 'active' : '' ?> shadow-custom">
                                        <a class="page-link" href="?pageA=<?= $pagerA['currentPage'] ?>&pageB=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?= ($pagerB['currentPage'] >= $pagerB['totalPages']) ? 'disabled' : '' ?> shadow-custom rounded-3">
                                    <a class="page-link" href="?pageA=<?= $pagerA['currentPage'] ?>&pageB=<?= $pagerB['currentPage'] + 1 ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
                
                <div class="col-md-2 mb-3">
                    <div class="rounded-3 p-2 py-4 shadow-custom mb-3" style="background-color: #fafafa">
                        <?php $saving = $totalIncome - $totalExpense ?>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-text text-center" style="font-size: 12px">
                                    Total Income
                                </div>
                                <div class="text-center">
                                    <?= number_format($totalIncome,0,'.','.') ?>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-text text-center" style="font-size: 12px">
                                    Total Expense:
                                </div>
                                <div class="text-center">
                                    <?= number_format($totalExpense,0,'.','.') ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <div class="form-text">Saving</div>
                            <?php if($saving < 0): ?>
                                <strong class="text-danger fs-5"><?= number_format($saving,0,'.','.') ?></strong>
                            <?php else: ?>
                                <strong class="text-success"><?= number_format($saving,0,'.','.') ?></strong>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="rounded-3 tmb-trx" style="background-color: #384c57; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s;">
                        <a class="d-flex align-items-center justify-content-center flex-column p-3" onclick="transaksiModal()" style="cursor: pointer">
                            <i class="fa-solid fa-piggy-bank" style="font-size: 76px; color: #bad6ca"></i>
                             <!-- <img src="<?= base_url('/icons/logoayam.webp') ?>" alt="" width="50" height="50" style="border-radius: 50%"> -->
                            <p style="color:#fafafa; font-size: 18px" class="fw-medium mt-3">Add Transaksi</p>
                        </a>
                    </div>
                    <div class="mt-3 rounded-3 p-1" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); transition: transform 0.2s; background-color: #fafafa">
                        <div>
                            <h2 style="font-size: 24px;">Kategori</h2>
                        </div>
                        <ul class="list-group">
                            <?php foreach($kategori as $k): ?>
                                <li class="list-group-item d-flex justify-content-between <?= ($k['status'] == 1)?"text-success":"text-danger" ?>"><span><?= $k['kategori'] ?></span> <span><?= ($k['status'] == 1)?number_format(($k['total_income']/$totalKategoriIncome)*100,2,'.','.'):number_format(($k['total_expenses']/$totalKategoriExpense)*100,2,'.','.'); ?>%</span></li>
                                <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="mt-3">
                        <a href="<?= base_url('/kalendar') ?>" class="btn btn-dark fw-medium w-100 rounded-3" style="background-color: #384c57" id="tes"><i class="fa-solid fa-chart-pie"></i> Analisis</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="">
                <h2>Grafik Income & Expense</h2>
                <div class="shadow-custom rounded-3 p-3 bg-light">
                    <canvas id="myLineChart" style="width: 100%; height: 80vh;"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah/Edit Tabungan Target -->
<div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="targetSavingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="targetSavingsModalLabel">Catat Transaksi</h5>
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
            
                <div role="tabpanel">
                    <!-- List group -->
                    <div class="row list-group list-group-horizontal" id="list-tab" role="tablist">
                        <div class="col-md-6 text-center">
                            <a class="list-group-item list-group-item-action active" id="expenseForm" data-bs-toggle="list" href="#addExpenseForm" role="tab">Expense</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <a class="list-group-item list-group-item-action" id="incomeForm" data-bs-toggle="list" href="#addIncomeForm" role="tab">Income</a>
                        </div>
                    </div>
                </div>
                
                <hr>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="addExpenseForm">
                        <form action="<?= base_url('saving/transaksi') ?>" method="post">
                            <?= csrf_field() ?>
                                <!-- <input type="hidden" id="targetSavingsId"> -->
            
                                <div>
                                    <label for="tanggl" class="form-label">Tanggal Keluar</label>
                                    <input type="date" class="form-select" id="tanggal-keluar" name="tanggal-keluar" value="<?= date('Y-m-d') ?>">
                                </div>
            
                                <div>
                                    <label for="pengeluaran" class="form-label">Nama pengeluaran</label>
                                    <input type="text" class="form-control" id="name" name="nama-pengeluaran">
                                </div>
            
                                <div class="">
                                    <label for="cicilan" class="form-label">Jumlah</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                                        <input type="text" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" id="nominal-pengeluaran" value="" name="jml">
                                    </div>
                                </div>
            
                                <div>
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select id="kategori" class="form-select" name="kategori-pengeluaran" required>
                                        <option value="">--- Pilih Kategori ---</option>
                                        <?php foreach($kategori_expense as $ke): ?>
                                            <option value="<?= $ke['id'] ?>"><?= $ke['kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
            
                                <div>
                                    <label for="" class="form-label">Catatan</label>
                                    <textarea id="catatan" class="form-control" name="catatan-pengeluaran"></textarea>
                                </div>
                                <div class="mt-5">
                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                                        <button type="submit" class="btn btn-primary" name="save-pengeluaran"><i class="fa-solid fa-save"></i> Simpan</button>
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>

                <div class="tab-pane fade d-none" id="addIncomeForm">
                    <form action="<?= base_url('saving/transaksi') ?>" method="post">
                        <?= csrf_field() ?>
                            <!-- <input type="hidden" id="targetSavingsId"> -->
                            <div>
                                <label for="tanggl" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-select" id="tanggal-keluar" name="tanggal-masuk" value="<?= date('Y-m-d') ?>">
                            </div>
        
                            <div>
                                <label for="pengeluaran" class="form-label">Nama pemasukan</label>
                                <input type="text" class="form-control" id="name" name="nama-pemasukan">
                            </div>
        
                            <div class="">
                                <label for="cicilan" class="form-label">Jumlah</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                                    <input type="text" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" id="nominal-pemasukan" value="" name="jml">
                                </div>
                            </div>
        
                            <div>
                                <label for="kategori" class="form-label">Kategori</label>
                                <select id="kategori" class="form-select" name="kategori-pemasukan" required>
                                    <option value="">--- Pilih Kategori ---</option>
                                    <?php foreach($kategori_income as $ki): ?>
                                        <option value="<?= $ki['id'] ?>"><?= $ki['kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
        
                            <div>
                                <label for="" class="form-label">Catatan</label>
                                <textarea id="catatan" class="form-control" name="catatan-pemasukan"></textarea>
                            </div>
                            
                            <div class="mt-5">
                                <div class="float-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                                    <button type="submit" class="btn btn-primary" name="save-pemasukan"><i class="fa-solid fa-save"></i> Simpan</button>
                                </div>    
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
        const incomeDataC = <?= json_encode($incomeCategories) ?>;
        const expenseData = <?= json_encode($expenseCategories) ?>;

        new Chart(document.getElementById('incomeChart'), {
            type: 'pie',
            data: {
                labels: incomeDataC.map(d => d.kategori),
                datasets: [{
                    data: incomeDataC.map(d => d.total),
                    // backgroundColor: ['#006ba6', '#0496ff', '#ffbc42', '#d81159','#8f2d56'],
                    // borderColor: ['#006ba6', '#0496ff', '#ffbc42', '#d81159','#8f2d56']
                    backgroundColor: [
                        "rgba(255, 188, 66, .7)",
                        "rgba(162, 210, 255, .7)", 
                        "rgba(255, 200, 221, .7)", 
                        "rgba(189, 224, 254, .7)",
                        "rgba(255, 175, 204, .7)",
                        // '#ffbc42',
                        // '#a2d2ff',
                        // '#ffc8dd', 
                        // '#bde0fe',
                        // '#ffafcc'
                    ],
                    borderColor: [
                        '#ffbc42', 
                        '#a2d2ff', 
                        '#ffc8dd', 
                        '#bde0fe',
                        '#ffafcc'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
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
                    },
                },
                // onHover: (event, elements) => {
                // if (elements.length) {
                //     const index = elements[0].index;
                //     centerText = `${data.datasets[0].data[index]}%`; // Menampilkan label dan nilai pada hover
                // } else {
                //     centerText = '100%'; // Default text
                // }
                //     myPieChart.update(); // Update chart untuk merender teks
                // }
            },
        });

        new Chart(document.getElementById('expenseChart'), {
            type: 'pie',
            data: {
                labels: expenseData.map(d => d.kategori),
                datasets: [{
                    data: expenseData.map(d => d.total),
                    // backgroundColor: ['#f44336', '#e57373', '#ff5722'],
                    // borderColor: ['#f44336', '#e57373', '#ff5722']
                    // backgroundColor: ['#74b3ce', '#09bc8a', '#508991','#004346','#172a3a'],
                    backgroundColor: [
                        "rgba(9, 188, 138, 0.7)",
                        "rgba(220, 53, 69, 0.7)",
                        "rgba(33, 150, 243, 0.7)",
                        "rgba(75, 192, 192, 0.7)",
                        "rgba(255, 99, 132, 0.7)",
                        // "rgba(76, 175, 80, 0.7)",
                        // "rgba(244, 67, 54, 0.7)",
                        // "#4CAF50",
                        // "#F44336",
                        // "#2196F3",
                        // "#198754",
                        // "#dc3545",
                    ],
                    borderColor: [
                        "rgba(9, 188, 138, 1)",
                        "rgba(220, 53, 69, 1)",
                        "rgba(33, 150, 243,1)",
                        "rgba(75, 199, 132, 1)",
                        "rgba(255, 99, 132, 1)",
                        // "rgba(76, 175, 80, 1)",
                        // "rgba(244, 67, 54, 1)",
                        // "#4CAF50",
                        // "#F44336",
                        // "#2196F3",
                        // "#198754",
                        // "#dc3545",
                    ],
                    // borderColor: ['#74b3ce', '#09bc8a', '#508991','#004346','#172a3a']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
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
                // onHover: (event, elements) => {
                // if (elements.length) {
                //     const index = elements[0].index;
                //     centerText = `${data.datasets[0].data[index]}%`; // Menampilkan label dan nilai pada hover
                // } else {
                //     centerText = '100%'; // Default text
                // }
                //     myPieChart.update(); // Update chart untuk merender teks
                // }
            },
        });
    </script>

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

<script>
        let nominalPemasukan = document.getElementById('nominal-pemasukan')
        let nominalPengeluaran = document.getElementById('nominal-pengeluaran')

        nominalPemasukan.addEventListener('keyup', function(e){
            nominalPemasukan.value = formatRupiah(this.value)
        })

        nominalPengeluaran.addEventListener('keyup', function(e){
            nominalPengeluaran.value = formatRupiah(this.value)
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

    function transaksiModal(){
        $('#transaksiModal').modal('show')
    }

    $('#incomeForm').on('click', function(){
        $('#addIncomeForm').removeClass('d-none')
    })
    $('#expenseForm').on('click', function(){
        $('#addIncomeForm').addClass('d-none')
    })
</script>

    <?php if(session()->getFlashdata('successLogin')): ?>
        <script>
                Swal.fire({
                    icon: 'success',
                    title: 'MoneyMan😊',
                    html: '<?= session()->getFlashdata('successLogin'); ?> '+'<strong><?= session()->get('username') ?></strong>. Semoga harimu menyenangkan!😊',
                    showConfirmButton: true, // Tombol konfirmasi
                    confirmButtonText: 'Terima Kasih🙏' // Teks pada tombol
                });
        </script>
    <?php endif; ?>

    <script>
        $(document).ready(function(){
            $('#tes').on('click', function(){
                Swal.fire({
                    icon: 'success',
                    title: 'MoneyMan😊',
                    html: 'selamat datang ' + '<strong><?= session()->get('username') ?></strong>. ' + 'Semoga harimu menyenangkan😊',
                    showConfirmButton: true, // Tombol konfirmasi
                    confirmButtonText: 'Terima Kasih🙏'  // Teks pada tombol
                }); 
            })
        })
    </script>

    <script>
        const ctx = document.getElementById('myPieChart').getContext('2d');

        // Data untuk Pie Chart
        const data = {
            // labels: ['expenses', 'income', 'savings'],
            labels: <?php echo json_encode($label) ?>,
            datasets: [{
                label: "Financial Distribution%",
                // data: ['50','30','20'],  // Persentase untuk setiap kategori
                data: <?php echo json_encode($value) ?>,  // Persentase untuk setiap kategori
                backgroundColor: [
                    // "#4CAF50", // Hijau untuk income
                    // "#F44336", // Merah untuk expenses
                    // "#2196F3"  // Biru untuk savings
                    // "#198754",
                    // "#dc3545",
                    "rgba(75, 192, 192, 1)",
                    "rgba(255, 99, 132, 1)",

                ],
                borderColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)',], // Warna border
                borderWidth: 2,
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
                        textY = height / 2.2;

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

<script>
        // Data for the chart
        const incomeData = <?= $monthlyincome ?>;
        const expensesData = <?= $monthlyexpenses ?>;
        const labels = <?= $labels; ?>;
        const year = new Date().getFullYear()
        // const incomeData = [5000, 7000, 8000, 6000, 9000, 11000, 10000, 9500, 12000, 13000, 12500, 14000];
        // const expensesData = [3000, 4000, 5000, 3500, 4500, 6000, 5000, 4800, 5200, 5800, 5700, 6000];
        // const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Chart.js configuration
        const ctxLine = document.getElementById('myLineChart').getContext('2d');
        const lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: labels, // X-axis labels
                datasets: [
                    {
                        label: 'Income',
                        data: incomeData,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.4,
                        fill: true,
                    },
                    {
                        label: 'Expenses',
                        data: expensesData,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        tension: 0.4,
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,
                // maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                console.log(tooltipItem)
                                return `${tooltipItem.dataset.label}: Rp${tooltipItem.formattedValue}`;
                            }
                        }
                    },
                    zoom: {
                        pan: {
                            enabled: true,
                            mode: 'x', // Pan hanya pada sumbu x
                        },
                        zoom: {
                            wheel: {
                                enabled: true,
                            },
                            pinch: {
                                enabled: true
                            },
                            mode: 'x', // Zoom hanya pada sumbu x
                        }
                    }
                },
                scales: {
                    x: {
                        type: 'category',
                        title: {
                            display: true,
                            text: 'Months '+ year,
                        },
                        ticks: {
                            maxTicksLimit: 12 // Maksimum tick yang ditampilkan
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Amount (Rp)',
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

<?= $this->endSection() ?>
