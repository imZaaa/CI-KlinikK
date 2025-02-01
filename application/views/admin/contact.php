<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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


    /* Styling untuk container utama */
    .content-container {
        margin-left: 280px;
        padding: 20px;
    }

    /* Styling untuk tabel agar lebih rapi */
    #dataTable {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #dataTable th, #dataTable td {
        border-color: #00705a;
    }

    #dataTable tbody tr:hover {
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
    margin-left: 280px; /* Memberikan ruang agar konten utama tidak tertutup sidebar */
}

        ::-webkit-scrollbar{
            display: none;
        }      

/* Button */
.btn-custom {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-custom:hover {
    background-color: #0056b3;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Alert Styles */
.alert {
    border-radius: 5px;
    padding: 10px;
    font-size: 0.9rem;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Mengubah warna latar belakang dan border form */
.form-container {
    padding: 30px;
    border-radius: 8px;
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
}

/* Menambahkan warna hijau pada label */
.form-label {
    color: #00705a;
    font-weight: bold;
}

/* Menambahkan warna hijau pada input dan textarea */
.form-control {
    border-color: #00705a;
    border-radius: 4px;
}

/* Mengubah warna border pada input saat fokus */
.form-control:focus {
    border-color: #005740; /* Lebih gelap saat fokus */
    box-shadow: 0 0 5px rgba(0, 112, 90, 0.5);
}

/* Menambahkan warna hijau pada tombol kirim */
.btn-custom {
    background-color: #00705a;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 6px;
    font-size: 16px;
}

.btn-custom:hover {
    background-color: #005740; /* Efek hover yang lebih gelap */
    box-shadow: 0 4px 6px rgba(0, 112, 90, 0.3);
}

/* Menambahkan margin bawah pada form */
.mb-3 {
    margin-bottom: 15px;
}
.col.py-3 {
    margin-left: 230px; /* Memberikan ruang agar konten utama tidak tertutup sidebar */
}

</style>
<body>
     <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #00705a;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
               <img src="<?= base_url('assets/logo.png')?>" width="130px">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="<?= site_url('dashboard')?>" class="nav-link px-0 align-middle">
                           <i class="fs-4 bi-clipboard-data-fill"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
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
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle active">
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
                                <a href="<?= site_url('obat')?>" class="nav-link px-0 "> <span class="d-none d-sm-inline">Data Obat</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('pengobatan')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Pengobatan</span></a>
                            </li>
                            <li class="w-100">
                                <a href="#" class="nav-link px-0 active"> <span class="d-none d-sm-inline">Contact</span></a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="<?= site_url('laporan') ?>" class="nav-link px-0 align-middle">
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
  <div class="container mt-5">
    <h3 class="text-center" style="color: #00705a;">Data Pesan</h3>

    <!-- Menampilkan pesan flash setelah berhasil mengirim pesan -->
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-success text-center">
            <?= htmlspecialchars($this->session->flashdata('message')); ?>
        </div>
    <?php endif; ?>

    <!-- Tabel untuk menampilkan data pesan -->
    <?php if (isset($messages) && is_array($messages) && !empty($messages)): ?>
        <table id="dataTable" class="table table-bordered table-striped" style="border-color: #00705a;">
    <thead style="background-color: #00705a; color: white;">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($messages as $message): ?>
            <tr style="transition: all 0.3s ease; background-color: #eaf7f3; border-color: #00705a;"
                onmouseover="this.style.backgroundColor='#d5efe5';" 
                onmouseout="this.style.backgroundColor='#eaf7f3';">
                <td style="border-color: #00705a;"><?= $no++; ?></td>
                <td style="border-color: #00705a;"><?= htmlspecialchars($message['name']); ?></td>
                <td style="border-color: #00705a;"><?= htmlspecialchars($message['email']); ?></td>
                <td style="border-color: #00705a;"><?= nl2br(htmlspecialchars($message['message'])); ?></td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center" style="font-style: italic; color: #666; background-color: #f9f9f9; border-color: #00705a;">
                    Belum ada pesan yang diterima.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</div>
</div>
  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "paging": true,      // Pagination
            "lengthChange": true, // Opsi untuk memilih jumlah entri per halaman
            "searching": true,   // Pencarian data
            "ordering": true,    // Pengurutan data
            "info": true,        // Menampilkan informasi jumlah data yang ada
            "autoWidth": false,  // Menonaktifkan auto-width untuk menyesuaikan lebar kolom
            "columnDefs": [{
                "targets": 0,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('font-weight', 'bold'); // Memberikan font tebal untuk kolom ID
                }
            }]
        });
    });
</script>
</html>