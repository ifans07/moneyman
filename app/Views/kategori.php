<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<!-- Toast Notification -->
<!-- <div id="toastNotification" class="toast align-items-center text-bg-success border-0 position-fixed bottom-0 end-0 p-3" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            Operasi berhasil!
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div> -->

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
                <a href="<?= base_url('/') ?>" class="btn btn-primary"><i class="fa-solid fa-home"></i> Home</a>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" onclick="openAddModal()">
                  <i class="fa-solid fa-plus"></i> Kategori
                </button>
                
            </div>
            <div class="mt-3">

                <!-- table kategori -->
                <h2>Kategori Income</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th>Ikon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTableBody1">
                        <!-- Data kategori akan dimuat di sini secara dinamis -->
                    </tbody>
                </table>

                <h2>Kategori Expenses</h2>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th>Ikon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTableBody2">
                        <!-- Data kategori akan dimuat di sini secara dinamis -->
                    </tbody>
                </table>


                <!-- Modal -->
                <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <form id="categoryForm">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-light" id="categoryModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn text-light fs-4" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body h-100" style="background-color: var(--bs-bg)">
                    <div class="modal-isi">
                            <!-- Tipe Kategori -->
                            <input type="hidden" id="categoryId">
                            <div class="form-group">
                                <label for="categoryType" class="form-label">Tipe Kategori</label>
                                <input type="hidden" class="form-control" id="changeCategoryType" readonly>
                                <select class="form-select" id="categoryType" name="category_type" required>
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                </select>
                            </div>
                            
                            <!-- Nama Kategori -->
                            <div class="form-group">
                                <label for="categoryName" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="categoryName" name="category_name" required>
                            </div>
                            
                            <!-- Ikon Kategori -->
                            <div class="form-group">
                                <label for="selectedIcon" class="form-label">Ikon Kategori</label>
                                <div class="input-group">
                                    <div class="w-100 fs-2">
                                        <i class="fa-solid fa-icons" id="ikon-tampil"></i>
                                    </div>
                                    <input type="text" class="form-control" id="selectedIcon" name="icon_class" readonly required onclick="openIconModal()">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-secondary" onclick="openIconModal()">Pilih Ikon</button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Tombol Simpan -->
                            <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                             </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                            <button type="submit" class="btn btn-primary fw-medium"><i class="fa-solid fa-save"></i> Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Modal Pilih Ikon -->
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="iconModalLabel">Pilih Ikon</h5>
                <button type="button" class="btn text-light fs-4" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
            <div class="modal-body" style="background-color: var(--bs-bg)">
                <div class="d-flex justify-content-around gap-2 flex-wrap" id="iconList">
                    <!-- Daftar ikon akan dimuat melalui AJAX -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {

    // Fungsi untuk memuat data kategori saat halaman dimuat
    loadCategories();

    // Fungsi untuk memuat data kategori
    function loadCategories() {
        $.getJSON('<?= base_url('api/kategori'); ?>', function (categories) {
            let tableBody1 = $('#categoryTableBody1');
            tableBody1.empty();
            let tableBody2 = $('#categoryTableBody2');
            tableBody2.empty();
            categories.k_income.forEach((category, index) => {
                tableBody1.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${category.kategori}</td>
                        <td>${category.slug}</td>
                        <td><i class="fas ${category.icon}"></i> ${category.icon}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editCategory(${category.id}, 'income')"><i class="fa-solid fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="deleteCategory(${category.id}, 'income')"><i class="fa-solid fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `);
            });
            categories.k_expense.forEach((category, index) => {
                tableBody2.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${category.kategori}</td>
                        <td>${category.slug}</td>
                        <td><i class="fas ${category.icon}"></i> ${category.icon}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editCategory(${category.id}, 'expense')"><i class="fa-solid fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="deleteCategory(${category.id}, 'expense')"><i class="fa-solid fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `);
            });
        });
    }


    // Fungsi membuka modal Tambah Kategori
    window.openAddModal = function () {
        $('#categoryModalLabel').text('Tambah Kategori');
        $('#categoryId').val('');
        $('#changeCategoryType').attr('type', 'hidden');
        $('#categoryType').show();
        $('#categoryType').val('income');
        $('#categoryName').val('');
        $('#selectedIcon').val('');
        $('#categoryModal').modal('show');
    };


    // Fungsi membuka modal Pilih Ikon
    window.openIconModal = function () {
        $('#iconModal').modal('show');
        let iconList = $('#iconList');
        iconList.empty();  // Kosongkan daftar ikon sebelum dimuat ulang

        $.getJSON('<?= base_url('ikon'); ?>', function (icons) {
            icons.forEach(icon => {
                iconList.append(`
                    <div class="text-center rounded-4 shadow-custom d-flex flex-column align-items-center justify-content-around icon-width" onclick="selectIcon('${icon.icon_class}')" style="width: 13%; height: 100px; background-color: #fafafa; cursor: pointer;">
                        <i class="fa-solid ${icon.icon_class}" style="font-size: 32px; color:var(--bs-primary)"></i>
                        <p class="small-text">${icon.name}</p>
                    </div>
                `);
            });
        });
    };

    // Set ikon yang dipilih
    window.selectIcon = function(iconClass) {
        $('#selectedIcon').val(iconClass);
        $('#iconModal').modal('hide');  // Tutup modal setelah ikon dipilih
        $('#ikon-tampil').attr('class','fa-solid '+iconClass);
    };

    // Fungsi mengirim data ke server untuk menyimpan kategori
    $('#categoryForm').on('submit', function (e) {
        e.preventDefault();
        const id = $('#categoryId').val();
        const url = id ? `<?= base_url('api/kategori'); ?>/${id}` : '<?= base_url('api/kategori'); ?>';
        const type = id ? 'POST' : 'POST';

        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: {
                name: $('#categoryName').val(),
                type: $('#categoryType').val(),
                icon_class: $('#selectedIcon').val()
            },
            success: function (response) {
                $('#categoryModal').modal('hide');
                loadCategories();
                showToast(id ? 'Kategori di '+ $('#categoryType').val() +' berhasil diperbarui!' : 'Kategori '+ $('#categoryType').val() +' berhasil ditambahkan!', 'success');
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                    icon: "success",
                    title: (id ? "Updated in successfully" : "Add data in successfully")
                });
            },
            error: function () {
                showToast('Gagal menyimpan kategori.', 'danger');
            }
        });
    });


    // Fungsi untuk mengedit kategori
    window.editCategory = function (id, type) {
        console.log(id)
        $.getJSON(`<?= base_url('api/kategori'); ?>/${id}/${type}`, function (category) {
            console.log(category)
            $('#categoryModalLabel').text('Edit Kategori');
            $('#categoryId').val(category.id);
            $('#changeCategoryType').val(type);
            $('#changeCategoryType').attr('type', 'text');
            $('#categoryType').val(type);
            $('#categoryType').hide();
            $('#categoryName').val(category.kategori);
            $('#selectedIcon').val(category.icon);
            $('#ikon-tampil').attr('class','fa-solid '+category.icon );
            $('#categoryModal').modal('show');
        });
    };

    // Fungsi untuk menghapus kategori
    window.deleteCategory = function (id, type) {
        Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Kategori ini akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fa-solid fa-check"></i> Ya, hapus!',
        cancelButtonText: '<i class="fa-solid fa-times"></i> Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `<?= base_url('api/kategori'); ?>/${id}/${type}`,
                type: 'DELETE',
                success: function () {
                    loadCategories();
                    showToast('Kategori berhasil dihapus!', 'success');
                    Swal.fire(
                        'Dihapus!',
                        'Kategori telah dihapus.',
                        'success'
                    );
                },
                error: function () {
                    showToast('Gagal menghapus kategori.', 'danger');
                    Swal.fire(
                        'Gagal!',
                        'Kategori tidak dapat dihapus.',
                        'error'
                    );
                }
            });
        }
    });
        
    };

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

<?= $this->endSection() ?>