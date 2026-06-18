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
    // if($expenseDay['amount'] == null){
    //     $expenseHari = 0;
    // }else{
    //     $expenseHari = number_format($expenseDay['amount'],0,'.','.');
    // }
    // if($incomeDay['amount'] == null){
    //     $incomeHari = 0;
    // }else{
    //     $incomeHari = number_format($incomeDay['amount'],0,'.','.');
    // }

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


<div class="col-md-6 mb-5">
    <div style="margin-bottom: 1.4rem;" class="d-lg-flex justify-content-lg-between flex-wrap lh-1 align-items-lg-center">
        <h2 style="color: #333333; font-size: 28px;">Transaksi Saat Ini</h2>
        <span class="text-muted form-text">Jumlah transaksi: <?= $jmltrx ?></span>
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
                    <div class="d-flex gap-2">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 3rem; height: 3rem; background-color: #bad6ca; color: #fafafa;">
                            <i class="fa-solid <?= $ei['icon'] ?>" style="color: #384c57;"></i>
                        </div>
                        <div class="lh-1">
                            <h5 style="font-size: 18px" class="mb-1 p-0"><?= $ei['name'] ?></h5>
                            <small class="potong m-0 p-0 form-text w-100 text-truncate d-sm-block d-block d-lg-block" style="font-size: 12px;"><?= $ei['description'] ?></small>
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