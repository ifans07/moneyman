<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auth
$routes->get('/auth/login', 'Auth::index');
$routes->get('/auth/daftar', 'Auth::daftar');
$routes->post('/auth/daftar/save', 'Auth::save');
$routes->post('/auth/login/proses', 'Auth::loginAuth');
$routes->get('/auth/lupa-password', 'Auth::lupaPassword');
$routes->get('/auth/logout', 'Auth::logout');
$routes->post('/auth/generatetoken', 'Auth::generateResetToken');
$routes->get('/auth/resetform', 'Auth::resetForm');
$routes->post('/auth/resetpassword', 'Auth::resetPassword');

// user
$routes->get('/user/profil', 'Users::profilPengguna', ['filter' => 'auth']);

// Home
$routes->get('/beranda', 'Home::index', ['filter' => 'auth']);

// Kategori
$routes->get('/kategori', 'Home::kategori', ['filter' => 'auth']);
$routes->get('/api/kategori', 'Home::fetchCategory');
$routes->post('/api/kategori', 'Home::createCategory');
$routes->get('/api/kategori/(:num)/(:segment)', 'Home::update/$1/$2');
$routes->post('/api/kategori/(:num)', 'Home::createCategory/$1');
$routes->delete('api/kategori/(:num)/(:segment)', 'Home::delete/$1/$2');

// Savings
$routes->get('/savings', 'Home::savings', ['filter' => 'auth']);
$routes->get('/api/savings', 'Home::fetchSavings');
$routes->post('/api/targetsavings', 'Home::createSavings');
$routes->get('/api/targetsavings/(:num)','Home::updateSavings/$1');
$routes->post('/api/targetsavings/(:num)', 'Home::createSavings/$1');
$routes->delete('/api/targetsavings/(:num)', 'Home::deleteSavings/$1');
$routes->get('/savings/detail/(:num)', 'Savings::index/$1', ['filter' => 'auth']);

$routes->post('/api/saving', 'Savings::createSavings');

// savings detail
$routes->get('/savings/fetchsavings/(:num)', 'Savings::fetchSavings/$1');
$routes->get('/savings/cicilan/(:num)', 'Savings::savingdetail/$1');
$routes->post('/savings/installment/save', 'Savings::saveInstallment');

// expense
$routes->get('/expenses', 'Expenses::index', ['filter' => 'auth']);
$routes->post('/api/expenses', 'Expenses::fetchExpenses');
$routes->get('/api/expenses/(:segment)/(:segment)', 'Expenses::fetchExpenses/$1/$2');
$routes->post('/expenses/save', 'Expenses::saveExpenses');

$routes->post('/api/topkategori', 'Expenses::getTopKategori');
$routes->post('/api/expenseskategori', 'Expenses::getExpensesKategori');
$routes->post('/api/expenses/analysis', 'Expenses::getAnalysisExpenses');
$routes->get('/api/comparisonexpenses', 'Expenses::getComparisonData');

// income
$routes->get('/income', 'Income::index', ['filter' => 'auth']);
$routes->post('/api/income', 'Income::fetchIncome');
// $routes->get('/api/income/(:segment)/(:segment)', 'Income::fetchExpenses/$1/$2');
$routes->post('/income/save', 'Income::saveIncome');

$routes->post('/api/topkategori/income', 'Income::getTopKategori');
$routes->post('/api/incomekategori', 'Income::getIncomeKategori');
$routes->post('/api/income/analysis', 'Income::getAnalysisIncome');
$routes->get('/api/comparisonincome', 'Income::getComparisonData');

// icons
$routes->get('/ikon', 'Home::getIcons');

// landing
$routes->get('/', 'Users::index');

// dashboard
$routes->post('/saving/transaksi', 'Home::savingTransaksi');
$routes->get('/kalendar', 'Home::kalendarAnalisis', ['filter' => 'auth']);
$routes->get('/dataanalisiskalendar', 'Home::dataAnalisisKalendar');
$routes->post('/delete/transaksi', 'Home::deletedTransaksi');


// pakai
$routes->get('/pakai', 'Pakai::index', ['filter' => 'auth']);
$routes->post('/pakai/save', 'Pakai::savePakai');
$routes->post('/pakai/update', 'Pakai::updatePakai');
$routes->post('/pakai/delete', 'Pakai::hapusPakai');

// soft delete
$routes->post('/delete/expense', 'Expenses::deletedTransaksiExpense');
$routes->post('/delete/income', 'Income::deletedTransaksiIncome');