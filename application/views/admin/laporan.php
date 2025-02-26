<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- PUSH BY RHEZA16-01-2025 0:32 -->
</head>
<style>
    .nav-link {
        font-family: 'Montserrat', sans-serif;
        font-size: 1rem;
        color: white !important;
        text-decoration: none;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: yellow !important;
        text-decoration: none;
    }

    .nav-link.active {
        font-weight: bold;
        color: #ffd700 !important;
        background-color: transparent !important; /* Menghilangkan background biru */
    }

    ::-webkit-scrollbar {
        display: none;
    }

    /* Styling untuk container utama */
    .content-container {
        margin-left: 280px;
        padding: 20px;
    }

    /* Styling untuk tabel agar lebih rapi */
    #uploadTable {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #uploadTable th, #uploadTable td {
        border-color: #00705a;
    }

    #uploadTable tbody tr:hover {
        background-color: #d1f0e6;
    }
    /* Styling untuk sidebar agar tetap di tempat */
.col-auto {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh; /* Menjaga sidebar sepanjang tinggi viewport */
    z-index: 1050; /* Agar sidebar tetap di atas konten */
    padding-top: 20px; /* Memberikan ruang agar tidak terlalu rapat ke atas */
}

/* Mengatur ruang untuk konten utama */
.col.py-3 {
    margin-left: 230px; /* Memberikan ruang agar konten utama tidak tertutup sidebar */
}

.bg-gradient-primary {
            background: linear-gradient(135deg, #007bff, #00aaff);
        }
        .bg-gradient-secondary {
            background: linear-gradient(135deg, #6c757d, #adb5bd);
        }
        .bg-gradient-success {
            background: linear-gradient(135deg, #28a745, #34d058);
        }
        .bg-gradient-info {
            background: linear-gradient(135deg, #17a2b8, #20c997);
        }
        .card {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
 .card {
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #3c3c3c;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .chart-container {
            position: relative;
            height: 400px;
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        :root {
            --primary-color: #00705a;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1, h2, h3 {
            color: var(--primary-color);
        }

        table th {
            background-color: var(--primary-color);
            color: #ffffff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e6f7f3;
        }

        .btn-custom {
            background-color: var(--primary-color);
            color: white;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-custom:hover {
            background-color: #005846;
            transform: translateY(-2px);
        }

       @media print {
    /* Menyembunyikan elemen lain selain tabel saat print */
    body * {
        visibility: hidden;
    }

    /* Membuat tabel terlihat saat print */
    .tab-content .table,
    .tab-content .table * {
        visibility: visible;
    }

    /* Mengatur tabel agar lebih besar dan terpusat */
    .tab-content .table {
        width: 100%;  /* Membuat tabel mengisi seluruh lebar halaman */
        margin: 0 auto;  /* Memastikan tabel berada di tengah */
        border-collapse: collapse;  /* Menjaga garis border tetap rapi */
    }

    /* Membuat font lebih besar agar lebih mudah dibaca */
    .tab-content .table th, .tab-content .table td {
        padding: 12px 18px;  /* Menambah padding agar lebih luas */
        font-size: 14px;  /* Ukuran font yang lebih besar */
        border: 1px solid #000;  /* Garis border lebih jelas */
    }

    /* Mengatur margin halaman agar lebih leluasa */
    @page {
        size: A4;
        margin: 20mm;  /* Memberikan margin lebih besar */
    }

    /* Mengatur font default untuk seluruh halaman cetak */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        font-size: 12px;  /* Ukuran font yang lebih besar di seluruh halaman */
    }

    /* Menyembunyikan tombol print saat di print */
    button {
        display: none;
    }

    /* Agar tabel bisa mengisi halaman penuh */
    .tab-content .table th, .tab-content .table td {
        text-align: left;
    }
}
.nav-pills .nav-link {
    background-color: #00705a;
    color: white;
    border-radius: 10px;
    transition: all 0.3s ease;
    padding: 10px 15px;
}

/* Efek hover */
/* .nav-pills .nav-link:hover {
    background-color: #005d4a;
    color: #e0fff4;
    transform: scale(1.05);
} */

/* Gaya tombol aktif */
.nav-pills .nav-link.active {
    background-color: #005d4a;
    box-shadow: 0 4px 10px rgba(0, 112, 90, 0.5);
    color: #e0fff4;
}

/* Margin antar tombol */
.nav-item {
    margin-right: 10px;
}

 .total-pendapatan {
            font-size: 2rem;
            background:#00705a;
            border: 2px solid #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .total-pendapatan:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .total-pendapatan span {
            color: #ffdd57;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
</style>
<body>
    <div class="container-fluid">
    <div class="row flex-nowrap">
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #00705a; height: 100vh; overflow-y: auto;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
               <img src="<?= base_url('assets/logo.png')?>" width="130px">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="<?= site_url('dashboard')?>" class="nav-link px-0 align-middle">
                           <i class="fs-4 bi bi-house-fill"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="<?= site_url('Dokter/admin')?>" class="nav-link px-0 align-middle">
                           <i class="fs-4 bi-person-fill-add"></i> <span class="ms-1 d-none d-sm-inline">Dokter</span> </a>
                    </li>
                    <li>
                        <a href="<?= site_url('Gallery/admin')?>" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-image-fill"></i> <span class="ms-1 d-none d-sm-inline">Gallery</span></a>
                    </li>
                    <li>
                        <a href="<?= site_url('Profile/admin')?>" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-person-bounding-box"></i><span class="ms-1 d-none d-sm-inline">Profile</span></a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-folder-fill"></i> <span class="ms-1 d-none d-sm-inline">Data</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="<?= site_url('login/dataU')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data User</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('pasien')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Pasien</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('penyakit')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Penyakit</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('obat')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Obat</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('pengobatan')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Pengobatan</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('resep')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Resep</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('message')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Message</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= site_url('laporan') ?>" class="nav-link px-0 align-middle active">
                        <i class="fs-4 8 bi bi-file-bar-graph-fill"></i><span class="ms-1 d-none d-sm-inline">Laporan</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                       <i class="bi bi-person-circle"></i>
                        <span class="d-none d-sm-inline mx-1"><?php echo $this->session->userdata('username'); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                           <center> <?php echo $this->session->userdata('role'); ?></p> </center>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-center" href="<?= site_url('login/logout')?>">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
<div class="col py-3">
     <div class="container">
    <h1 class="text-center mb-4">Laporan Klinik</h1>

    <!-- Tombol Navigasi -->
    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-obat-tab" data-bs-toggle="pill" data-bs-target="#pills-obat" type="button" role="tab" aria-controls="pills-obat" aria-selected="true">
                Laporan Pemakaian Obat
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-customer-tab" data-bs-toggle="pill" data-bs-target="#pills-customer" type="button" role="tab" aria-controls="pills-customer" aria-selected="false">
                Laporan Data Customer
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-pendapatan-tab" data-bs-toggle="pill" data-bs-target="#pills-pendapatan" type="button" role="tab" aria-controls="pills-pendapatan" aria-selected="false">
                Laporan Pendapatan
            </button>
        </li>
    </ul>

    <!-- Konten Laporan -->
    <div class="tab-content" id="pills-tabContent">
        <!-- Laporan Pemakaian Obat -->
        <div class="tab-pane fade show active" id="pills-obat" role="tabpanel" aria-labelledby="pills-obat-tab">
            <h2>Pemakaian Obat</h2>
            <button onclick="window.print()" class="btn btn-custom mb-4">
            Print Laporan
        </button>
            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Jumlah Pemakaian</th>
                        <th>Terakhir Digunakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pemakaian_obat as $obat): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $obat['nama_obat']; ?></td>
                        <td><?= $obat['jumlah_pemakaian']; ?></td>
                        <td><?= $obat['terakhir_digunakan']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Laporan Data Customer -->
        <div class="tab-pane fade" id="pills-customer" role="tabpanel" aria-labelledby="pills-customer-tab">
            <h2>Data Customer (Pasien)</h2>
            <button onclick="window.print()" class="btn btn-custom mb-4">
            Print Laporan
        </button>
            <table id="dataTable2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Lahir</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Jumlah Kunjungan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($data_customer as $customer): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $customer['nama']; ?></td>
                        <td><?= $customer['tanggal_lahir']; ?></td>
                        <td><?= $customer['nomor_telepon']; ?></td>
                        <td><?= $customer['alamat']; ?></td>
                        <td><?= $customer['jumlah_kunjungan']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Laporan Pendapatan -->
        <div class="tab-pane fade" id="pills-pendapatan" role="tabpanel" aria-labelledby="pills-pendapatan-tab">
            <h2>Pendapatan Pengobatan</h2>
            <button onclick="window.print()" class="btn btn-custom mb-4">
            Print Laporan
        </button>
            <table id="dataTable3" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Pengobatan</th>
                        <th>Biaya</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pendapatan_pengobatan as $pendapatan): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pendapatan['nama']; ?></td>
                        <td><?= $pendapatan['tgl_pengobatan']; ?></td>
                        <td>Rp. <?= number_format($pendapatan['total_biaya'], 0, ',', '.'); ?></td>
                        <td class="text-center"><?= $pendapatan['status_bayar'] == 'Sudah Dibayar' ? '<span class="text-success">Sudah Dibayar</span>' : '<span class="text-danger">Belum Dibayar</span>' ?></td>                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3 class="total-pendapatan text-center p-3 mb-4 bg-gradient-primary text-white rounded shadow">
                        Total Pendapatan: <span class="fw-bold">Rp.<?= number_format($total_pendapatan, 0, ',', '.'); ?></span>
            </h3>       
         </div>
    </div>
</div>

</div>
</body>
  <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        $(document).ready(function() {
            $('#dataTable2').DataTable();
        });
        $(document).ready(function() {
            $('#dataTable3').DataTable();
        });
        $(document).ready(function() {
            $('.total-pendapatan span').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>


