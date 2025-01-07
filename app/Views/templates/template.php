<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <meta name="description" content="The small framework with powerful features">

    <link rel="shortcut icon" type="image/png" href="<?= base_url('/icons/icons8-coin-wallet.png') ?>">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="<?= base_url('/css/responsive.css') ?>">

    <!-- jquery -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.10/index.global.min.js'></script>
    <script src="<?= base_url('node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- fullcalender -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.css" rel="stylesheet">

    <style>
        /* Gaya untuk track (background) scrollbar */
::-webkit-scrollbar {
    width: 8px; /* Lebar scrollbar */
}

::-webkit-scrollbar-track {
    background: #f1f1f1; /* Warna background track */
    border-radius: 5px; /* Membuat track lebih rounded */
}

/* Gaya untuk handle atau thumb scrollbar */
::-webkit-scrollbar-thumb {
    background: #888; /* Warna handle scrollbar */
    border-radius: 5px; /* Membuat handle lebih rounded */
}

/* Gaya untuk handle scrollbar saat di-hover */
::-webkit-scrollbar-thumb:hover {
    background: #555; /* Warna handle saat di-hover */
}

/* Mengganti warna border dan teks pada btn-outline-primary */
/* Mengganti warna border dan teks pada btn-outline-primary */
.btn-outline-primary {
            color: #384c57;
            border-color: #384c57;
        }
        
        /* Efek hover */
        .btn-outline-primary:hover {
            background-color: #384c57;
            color: #fff;
        }

        /* Mengubah warna latar belakang dan teks saat tombol diklik atau aktif */
        .btn-outline-primary:active, 
        .btn-outline-primary:checked + label,
        .btn-check:checked + .btn-outline-primary {
            background-color: #384c57;
            color: #fff;
            border-color: #384c57;
        }

        /* Gaya teks berdasarkan persentase */
        .circular-progress[data-percentage="high"] span {
            color: #e0e0e0; /* Warna teks kontras jika progress sudah melewati 50% */
        }

        .month-carousel-wrapper {
            position: relative;
            width: 100%;
            /* overflow: hidden; */
        }

        .month-carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px 0;
            scrollbar-width: none; /* Hide scrollbar for Firefox */
        }

        .month-carousel::-webkit-scrollbar {
            display: none; /* Hide scrollbar for Chrome, Safari, and Edge */
        }

        .month-item {
            flex: 0 0 auto;
            /* width: 80px;
            height: 80px; */
            padding: 12px 34px;
            margin: 0 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            border-radius: 15%;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .month-item.active {
            /* background-color: #007bff; */
            background-color: var(--bs-primary);
            color: white;
            box-shadow: 0 4px 8px rgba(56, 76, 87, 0.4);
            transform: scale(1.1);
        }

        .month-item:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            font-size: 32px;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            /* background-color: #007bff; */
            background-color: transparent;
            color: (--bs-primary);
            border: none;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); */
            transition: background-color 0.3s, transform 0.3s;
            z-index: 100;
        }

        .carousel-btn:hover {
            /* background-color: #0056b3; */
            /* transform: scale(1.1); */
            /* transform: translateY(0px); */
        }

        .carousel-btn.left {
            left: -40px;
        }

        .carousel-btn.right {
            right: -40px;
        }

        /* .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #expensesChart {
            max-width: 600px;  
            max-height: 300px; 
            width: 100%;      
            height: auto;     
            margin: 0 auto;
        } */

        .grp-hapus{
            position: absolute;
            top: 0px;
            right: -100%;
            /* right: 0; */
            /* background-color: rgba(255, 255, 255, 1); */
            /* background-color:rgb(215, 225, 235, 0.9); */
            background-color: rgba(255, 255, 255, 0.7);
            height: 100%;
            width: 100%;
            padding: 0 4rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: .8rem;
            transition: right .3s ease-in-out;
        }
        .grp-hapus-trx{
            position: absolute;
            top: -105%;
            right: 0px;
            /* right: 0; */
            /* background-color: rgba(255, 255, 255, 1); */
            /* background-color:rgb(215, 225, 235, 0.9); */
            background-color: rgba(255, 255, 255, 0.7);
            height: 100%;
            width: 100%;
            padding: 0 4rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: .8rem;
            transition: top .3s ease-in-out;
        }
        .wrp-hapus:hover .grp-hapus{
            right: 0px;
            transition: right .4s ease-in-out;
        }
        .wrp-hapus-trx:hover .grp-hapus-trx{
            top: 0px;
            transition: top .4s ease-in-out;
        }
        
    </style>

</head>

<body style="background-color: #d7e1eb">

    <?= $this->include('templates/header') ?>

    <main id="main">
        <?php if($title != 'Login' && $title != 'Dashboard'): ?>
            <section id="hero" class="hero" style="background:linear-gradient(rgba(215,225,235,0.8), rgba(215,225,235,0.4)), url('<?= base_url('/assets/hero/hero1.jpg') ?>'), fixed center center; background-size:cover; background-repeat: no-repeat;">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="text-center text-secondary">
                            <h2 class="fw-bold">MoneyMan</h2>
                            <h3>Codeigniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h3>
                            <p>Web pengelolaan pengeluaran dan pemasukan</p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <?php if($title != 'Login'): ?>
        <?= $this->include('templates/footer') ?>
    <?php endif; ?>

    <!-- SCRIPTS -->
    <script src="<?= base_url('js/script.js') ?>"></script>
    <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.bundle.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }

        // tooltip
        const tooltipTrigger = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTrigger].map(tooltipTriggerEl => new bootstrap.Tooltip(
            tooltipTriggerEl))
    })
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function(){


    let denganRupiah = document.querySelector('.jml-keluar')
    let jmlTf = document.querySelector('.jml-tf')
    let jmlMsk = document.querySelector('.jml-msk')

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
        
    denganRupiah.addEventListener('keyup', function(e){
        denganRupiah.value = formatRupiah(this.value)
    })

    jmlTf.addEventListener('keyup', function(e){
        jmlTf.value = formatRupiah(this.value)
    })

        const rupiah = (number)=>{
        return new Intl.NumberFormat("id-ID", {
            style: "decimal", // format angka biasa atau default
            // style: "currency", // format mata uang seperti RP, $, dll
            // style: "percent" // format persen
            currency: "IDR"
            }).format(number);
        }

    console.log(rupiah(12000))

    $(document).ready(function() {
        let base_url = window.location.origin
        // form pengeluaran
        $('#dompet-keluar').on('change', function(e) {
            let idDompet = $(this).val()
            $.ajax({
                url: '/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#saldo').val(rupiah(data.hasil.saldo))
                }
            })
        })


        // form pemasukan
        $('#dompet-masuk').on('change', function(e) {
            let idDompet = $(this).val()
            $.ajax({
                url: base_url+'/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#saldo-masuk').val(formatRupiah(data.hasil.saldo))
                }
            })
        })

        // transfer dari
        $('#dompet-1-transfer').on('change', function(e) {
            let idDompet1 = $(this).val()
            $.ajax({
                url: base_url+'/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet1
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data)
                    $('#saldo-1-transfer').val(rupiah(data.hasil.saldo))
                }
            })
        })

        // transfer ke
        $('#dompet-2-transfer').on('change', function(e) {
            let idDompet2 = $(this).val()
            $.ajax({
                url: base_url+'/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet2
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data)
                    $('#saldo-2-transfer').val(formatRupiah(data.hasil.saldo))
                }
            })
        })
    })
})
</script>
</body>

</html>