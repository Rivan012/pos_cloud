<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Cloud - Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075); transition: all 0.3s; border-radius: 10px; }
        .card:hover { transform: translateY(-2px); box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); }
        .nav-tabs { border-bottom: none; }
        .nav-tabs .nav-link { border: none; color: #6c757d; font-weight: 500; padding: 1rem 1.5rem; }
        .nav-tabs .nav-link.active { color: #0d6efd; background-color: white; border-bottom: 3px solid #0d6efd; border-radius: 0; }
        .btn-primary { border-radius: 8px; }
        .table thead th { background-color: #f1f3f5; border-bottom: none; font-weight: 600; color: #495057; }
        .modal-content { border-radius: 15px; border: none; }
        .modal-header { border-bottom: 1px solid #f1f3f5; }
        .modal-footer { border-top: 1px solid #f1f3f5; }
        .total-display { font-size: 1.5rem; font-weight: bold; color: #0d6efd; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="fas fa-cash-register me-2"></i> POS CLOUD</a>
    </div>
</nav>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body p-0">
                    <ul class="nav nav-tabs" id="posTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="penjualan-tab" data-bs-toggle="tab" data-bs-target="#penjualan" type="button">
                                <i class="fas fa-shopping-cart me-1"></i> Penjualan
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="barang-tab" data-bs-toggle="tab" data-bs-target="#barang" type="button">
                                <i class="fas fa-box me-1"></i> Data Barang
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="kategori-tab" data-bs-toggle="tab" data-bs-target="#kategori" type="button">
                                <i class="fas fa-tags me-1"></i> Kategori
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="diskon-tab" data-bs-toggle="tab" data-bs-target="#diskon" type="button">
                                <i class="fas fa-percent me-1"></i> Diskon
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="kasir-tab" data-bs-toggle="tab" data-bs-target="#kasir" type="button">
                                <i class="fas fa-user-tie me-1"></i> Kasir
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="posTabsContent">
                <!-- Penjualan Tab -->
                <div class="tab-pane fade show active" id="penjualan" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold">Riwayat Transaksi</h4>
                        <button class="btn btn-primary px-4 shadow-sm" onclick="showAddPenjualanModal()">
                            <i class="fas fa-cart-plus me-1"></i> Transaksi Baru
                        </button>
                    </div>
                    <div class="card p-3 shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" id="tablePenjualan">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th>Barang</th>
                                        <th>Kasir</th>
                                        <th>Jumlah</th>
                                        <th>Diskon</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Barang Tab -->
                <div class="tab-pane fade" id="barang" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold">Manajemen Barang</h4>
                        <button class="btn btn-primary px-4 shadow-sm" onclick="showAddBarangModal()">
                            <i class="fas fa-plus me-1"></i> Tambah Barang
                        </button>
                    </div>
                    <div class="card p-3 shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" id="tableBarang">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Kategori Tab -->
                <div class="tab-pane fade" id="kategori" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold">Kategori Barang</h4>
                        <button class="btn btn-primary px-4 shadow-sm" onclick="showAddKategoriModal()">
                            <i class="fas fa-plus me-1"></i> Tambah Kategori
                        </button>
                    </div>
                    <div class="card p-3 shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" id="tableKategori">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Diskon Tab -->
                <div class="tab-pane fade" id="diskon" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold">Manajemen Diskon</h4>
                        <button class="btn btn-primary px-4 shadow-sm" onclick="showAddDiskonModal()">
                            <i class="fas fa-plus me-1"></i> Tambah Diskon
                        </button>
                    </div>
                    <div class="card p-3 shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" id="tableDiskon">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Diskon</th>
                                        <th>Jenis</th>
                                        <th>Nilai</th>
                                        <th>Mulai</th>
                                        <th>Berakhir</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Kasir Tab -->
                <div class="tab-pane fade" id="kasir" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold">Data Kasir</h4>
                        <button class="btn btn-primary px-4 shadow-sm" onclick="showAddKasirModal()">
                            <i class="fas fa-plus me-1"></i> Tambah Kasir
                        </button>
                    </div>
                    <div class="card p-3 shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" id="tableKasir">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Kasir</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Penjualan -->
<div class="modal fade" id="modalPenjualan" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formPenjualan">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Input Transaksi Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kode Transaksi</label>
                            <input type="text" class="form-control" id="kode_transaksi" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kasir</label>
                            <select class="form-select" id="penjualan_kasir_id" required></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Pilih Barang</label>
                            <select class="form-select" id="penjualan_barang_id" required onchange="calculateTotal()"></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Harga Satuan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="display_harga" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" value="1" min="1" required oninput="calculateTotal()">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Pilih Diskon (Opsional)</label>
                            <select class="form-select" id="penjualan_diskon_id" onchange="calculateTotal()"></select>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 text-muted">Subtotal</p>
                            <h5 id="display_subtotal">Rp 0</h5>
                        </div>
                        <div class="text-end">
                            <p class="mb-0 text-muted">Total Bayar</p>
                            <h3 class="total-display" id="display_total">Rp 0</h3>
                        </div>
                    </div>
                    <input type="hidden" id="subtotal">
                    <input type="hidden" id="total">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-5 fw-bold">Selesaikan Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Barang -->
<div class="modal fade" id="modalBarang" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formBarang">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalBarangTitle">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="barang_id">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" id="kategori_barang_id" required></select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga Beli</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="harga_beli" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga Jual</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="harga_jual" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan" placeholder="pcs, box, dll">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Kategori -->
<div class="modal fade" id="modalKategori" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formKategori">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalKategoriTitle">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="kategori_id">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Diskon -->
<div class="modal fade" id="modalDiskon" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formDiskon">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalDiskonTitle">Tambah Diskon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="diskon_id">
                    <div class="mb-3">
                        <label class="form-label">Nama Diskon</label>
                        <input type="text" class="form-control" id="nama_diskon" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis</label>
                            <select class="form-select" id="jenis_diskon" required>
                                <option value="Persentase">Persentase</option>
                                <option value="Nominal">Nominal</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nilai</label>
                            <input type="number" class="form-control" id="nilai_diskon" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Berakhir</label>
                            <input type="date" class="form-control" id="tanggal_berakhir" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="status" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Kasir -->
<div class="modal fade" id="modalKasir" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formKasir">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalKasirTitle">Tambah Kasir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="kasir_id">
                    <div class="mb-3">
                        <label class="form-label">Pilih User</label>
                        <select class="form-select" id="user_id" required></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Kasir</label>
                        <input type="text" class="form-control" id="nama_kasir" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" class="form-control" id="no_hp" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const API = {
        barang: '/api/barang',
        kategori: '/api/kategori-barang',
        diskon: '/api/diskon',
        kasir: '/api/kasir',
        users: '/api/users',
        penjualan: '/api/penjualan'
    };

    let cache = {
        barang: [],
        diskon: [],
        kasir: []
    };

    $(document).ready(function() {
        init();
        
        // Form Handlers
        $('#formBarang').submit(e => { e.preventDefault(); save('barang'); });
        $('#formKategori').submit(e => { e.preventDefault(); save('kategori'); });
        $('#formDiskon').submit(e => { e.preventDefault(); save('diskon'); });
        $('#formKasir').submit(e => { e.preventDefault(); save('kasir'); });
        $('#formPenjualan').submit(e => { e.preventDefault(); savePenjualan(); });
    });

    function init() {
        loadData('barang');
        loadData('kategori');
        loadData('diskon');
        loadData('kasir');
        loadData('penjualan');
        loadUsers();
    }

    function loadData(type) {
        $.get(API[type], function(response) {
            const data = type === 'penjualan' ? response.data : response;
            
            if (['barang', 'diskon', 'kasir'].includes(type)) {
                cache[type] = data;
                updateSelects(type);
            }
            
            renderTable(type, data);
            if (type === 'kategori') renderKategoriSelect(data);
        });
    }

    function updateSelects(type) {
        if (type === 'barang') {
            let options = '<option value="">Pilih Barang</option>';
            cache.barang.forEach(item => options += `<option value="${item.id}">${item.nama_barang} (Rp ${parseInt(item.harga_jual).toLocaleString()})</option>`);
            $('#penjualan_barang_id').html(options);
        } else if (type === 'diskon') {
            let options = '<option value="">Tanpa Diskon</option>';
            cache.diskon.filter(d => d.status === 'Aktif').forEach(item => {
                const nilai = item.jenis_diskon === 'Persentase' ? item.nilai_diskon + '%' : 'Rp ' + parseInt(item.nilai_diskon).toLocaleString();
                options += `<option value="${item.id}">${item.nama_diskon} (${nilai})</option>`;
            });
            $('#penjualan_diskon_id').html(options);
        } else if (type === 'kasir') {
            let options = '<option value="">Pilih Kasir</option>';
            cache.kasir.forEach(item => options += `<option value="${item.id}">${item.nama_kasir}</option>`);
            $('#penjualan_kasir_id').html(options);
        }
    }

    function renderTable(type, data) {
        let rows = '';
        data.forEach(item => {
            if (type === 'barang') {
                rows += `<tr>
                    <td>${item.id}</td>
                    <td class="fw-bold">${item.nama_barang}</td>
                    <td><span class="badge bg-secondary">${item.kategori ? item.kategori.nama_kategori : '-'}</span></td>
                    <td>Rp ${parseInt(item.harga_beli).toLocaleString()}</td>
                    <td class="text-primary fw-bold">Rp ${parseInt(item.harga_jual).toLocaleString()}</td>
                    <td>${item.stok}</td>
                    <td>${item.satuan || '-'}</td>
                    <td>
                        <button class="btn btn-sm btn-info text-white" onclick="edit('barang', ${item.id})"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="remove('barang', ${item.id})"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>`;
            } else if (type === 'kategori') {
                rows += `<tr>
                    <td>${item.id}</td>
                    <td class="fw-bold">${item.nama_kategori}</td>
                    <td>${item.deskripsi || '-'}</td>
                    <td>
                        <button class="btn btn-sm btn-info text-white" onclick="edit('kategori', ${item.id})"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="remove('kategori', ${item.id})"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>`;
            } else if (type === 'diskon') {
                rows += `<tr>
                    <td>${item.id}</td>
                    <td class="fw-bold">${item.nama_diskon}</td>
                    <td>${item.jenis_diskon}</td>
                    <td>${item.jenis_diskon === 'Persentase' ? item.nilai_diskon + '%' : 'Rp ' + parseInt(item.nilai_diskon).toLocaleString()}</td>
                    <td>${item.tanggal_mulai}</td>
                    <td>${item.tanggal_berakhir}</td>
                    <td><span class="badge ${item.status === 'Aktif' ? 'bg-success' : 'bg-danger'}">${item.status}</span></td>
                    <td>
                        <button class="btn btn-sm btn-info text-white" onclick="edit('diskon', ${item.id})"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="remove('diskon', ${item.id})"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>`;
            } else if (type === 'kasir') {
                rows += `<tr>
                    <td>${item.id}</td>
                    <td class="fw-bold">${item.nama_kasir}</td>
                    <td>${item.no_hp}</td>
                    <td>${item.alamat || '-'}</td>
                    <td>
                        <button class="btn btn-sm btn-info text-white" onclick="edit('kasir', ${item.id})"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="remove('kasir', ${item.id})"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>`;
            } else if (type === 'penjualan') {
                rows += `<tr>
                    <td>${item.id}</td>
                    <td class="fw-bold text-primary">${item.kode_transaksi}</td>
                    <td>${new Date(item.tanggal).toLocaleDateString()}</td>
                    <td>${item.barang ? item.barang.nama_barang : '-'}</td>
                    <td>${item.kasir ? item.kasir.nama_kasir : '-'}</td>
                    <td>${item.jumlah}</td>
                    <td>${item.diskon ? item.diskon.nama_diskon : '-'}</td>
                    <td class="fw-bold">Rp ${parseInt(item.total).toLocaleString()}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="remove('penjualan', ${item.id})"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>`;
            }
        });
        $(`#table${type.charAt(0).toUpperCase() + type.slice(1)} tbody`).html(rows);
    }

    function renderKategoriSelect(data) {
        let options = '<option value="">Pilih Kategori</option>';
        data.forEach(item => options += `<option value="${item.id}">${item.nama_kategori}</option>`);
        $('#kategori_barang_id').html(options);
    }

    function loadUsers() {
        $.get(API.users, function(data) {
            let options = '<option value="">Pilih User</option>';
            data.forEach(item => options += `<option value="${item.id}">${item.name} (${item.email})</option>`);
            $('#user_id').html(options);
        });
    }

    // Penjualan Specific
    function showAddPenjualanModal() {
        $('#formPenjualan')[0].reset();
        const code = 'TRX-' + Date.now();
        $('#kode_transaksi').val(code);
        $('#display_harga').val(0);
        $('#display_subtotal').text('Rp 0');
        $('#display_total').text('Rp 0');
        $('#modalPenjualan').modal('show');
    }

    function calculateTotal() {
        const barangId = $('#penjualan_barang_id').val();
        const qty = parseInt($('#jumlah').val()) || 0;
        const diskonId = $('#penjualan_diskon_id').val();
        
        const barang = cache.barang.find(b => b.id == barangId);
        if (!barang) return;

        $('#display_harga').val(barang.harga_jual);
        const subtotal = barang.harga_jual * qty;
        let total = subtotal;

        if (diskonId) {
            const diskon = cache.diskon.find(d => d.id == diskonId);
            if (diskon) {
                if (diskon.jenis_diskon === 'Persentase') {
                    total = subtotal - (subtotal * (diskon.nilai_diskon / 100));
                } else {
                    total = subtotal - diskon.nilai_diskon;
                }
            }
        }

        $('#subtotal').val(subtotal);
        $('#total').val(total < 0 ? 0 : total);
        $('#display_subtotal').text('Rp ' + subtotal.toLocaleString());
        $('#display_total').text('Rp ' + (total < 0 ? 0 : total).toLocaleString());
    }

    function savePenjualan() {
        const data = {
            kode_transaksi: $('#kode_transaksi').val(),
            barang_id: $('#penjualan_barang_id').val(),
            kasir_id: $('#penjualan_kasir_id').val(),
            jumlah: $('#jumlah').val(),
            diskon_id: $('#penjualan_diskon_id').val(),
            subtotal: $('#subtotal').val(),
            total: $('#total').val()
        };

        $.ajax({
            url: API.penjualan,
            method: 'POST',
            data: data,
            success: function() {
                $('#modalPenjualan').modal('hide');
                loadData('penjualan');
                loadData('barang'); // Update stock display
                Swal.fire('Berhasil!', 'Transaksi berhasil disimpan.', 'success');
            },
            error: function() {
                Swal.fire('Gagal!', 'Terjadi kesalahan sistem.', 'error');
            }
        });
    }

    // Generic CRUD Functions
    function showAddBarangModal() { $('#formBarang')[0].reset(); $('#barang_id').val(''); $('#modalBarangTitle').text('Tambah Barang'); $('#modalBarang').modal('show'); }
    function showAddKategoriModal() { $('#formKategori')[0].reset(); $('#kategori_id').val(''); $('#modalKategoriTitle').text('Tambah Kategori'); $('#modalKategori').modal('show'); }
    function showAddDiskonModal() { $('#formDiskon')[0].reset(); $('#diskon_id').val(''); $('#modalDiskonTitle').text('Tambah Diskon'); $('#modalDiskon').modal('show'); }
    function showAddKasirModal() { $('#formKasir')[0].reset(); $('#kasir_id').val(''); $('#modalKasirTitle').text('Tambah Kasir'); $('#modalKasir').modal('show'); }

    function edit(type, id) {
        $.get(`${API[type]}/${id}`, function(response) {
            const item = type === 'penjualan' ? response.data : response;
            $(`#modal${type.charAt(0).toUpperCase() + type.slice(1)}Title`).text(`Edit ${type.charAt(0).toUpperCase() + type.slice(1)}`);
            $(`#${type}_id`).val(item.id);
            
            if (type === 'barang') {
                $('#nama_barang').val(item.nama_barang);
                $('#kategori_barang_id').val(item.kategori_barang_id);
                $('#harga_beli').val(item.harga_beli);
                $('#harga_jual').val(item.harga_jual);
                $('#stok').val(item.stok);
                $('#satuan').val(item.satuan);
            } else if (type === 'kategori') {
                $('#nama_kategori').val(item.nama_kategori);
                $('#deskripsi').val(item.deskripsi);
            } else if (type === 'diskon') {
                $('#nama_diskon').val(item.nama_diskon);
                $('#jenis_diskon').val(item.jenis_diskon);
                $('#nilai_diskon').val(item.nilai_diskon);
                $('#tanggal_mulai').val(item.tanggal_mulai);
                $('#tanggal_berakhir').val(item.tanggal_berakhir);
                $('#status').val(item.status);
            } else if (type === 'kasir') {
                $('#user_id').val(item.user_id);
                $('#nama_kasir').val(item.nama_kasir);
                $('#no_hp').val(item.no_hp);
                $('#alamat').val(item.alamat);
            }
            $(`#modal${type.charAt(0).toUpperCase() + type.slice(1)}`).modal('show');
        });
    }

    function save(type) {
        const id = $(`#${type}_id`).val();
        const url = id ? `${API[type]}/${id}` : API[type];
        const method = id ? 'PUT' : 'POST';
        
        let data = {};
        if (type === 'barang') {
            data = {
                nama_barang: $('#nama_barang').val(),
                kategori_barang_id: $('#kategori_barang_id').val(),
                harga_beli: $('#harga_beli').val(),
                harga_jual: $('#harga_jual').val(),
                stok: $('#stok').val(),
                satuan: $('#satuan').val()
            };
        } else if (type === 'kategori') {
            data = { nama_kategori: $('#nama_kategori').val(), deskripsi: $('#deskripsi').val() };
        } else if (type === 'diskon') {
            data = {
                nama_diskon: $('#nama_diskon').val(),
                jenis_diskon: $('#jenis_diskon').val(),
                nilai_diskon: $('#nilai_diskon').val(),
                tanggal_mulai: $('#tanggal_mulai').val(),
                tanggal_berakhir: $('#tanggal_berakhir').val(),
                status: $('#status').val()
            };
        } else if (type === 'kasir') {
            data = {
                user_id: $('#user_id').val(),
                nama_kasir: $('#nama_kasir').val(),
                no_hp: $('#no_hp').val(),
                alamat: $('#alamat').val()
            };
        }

        $.ajax({
            url: url,
            method: method,
            data: data,
            success: function() {
                $(`#modal${type.charAt(0).toUpperCase() + type.slice(1)}`).modal('hide');
                loadData(type);
                if (type === 'kategori') loadData('barang');
                Swal.fire('Berhasil!', `Data ${type} telah disimpan.`, 'success');
            },
            error: function() {
                Swal.fire('Gagal!', 'Terjadi kesalahan sistem.', 'error');
            }
        });
    }

    function remove(type, id) {
        Swal.fire({
            title: 'Hapus data?',
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `${API[type]}/${id}`,
                    method: 'DELETE',
                    success: function() {
                        loadData(type);
                        if (type === 'kategori') loadData('barang');
                        Swal.fire('Terhapus!', 'Data telah dihapus.', 'success');
                    }
                });
            }
        });
    }
</script>

</body>
</html>
