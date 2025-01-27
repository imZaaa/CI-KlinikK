<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Link ke jQuery, digunakan untuk DataTables dan interaksi DOM -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Link ke DataTables JS untuk menambah fungsionalitas tabel interaktif -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Tambahkan ini di dalam <head> untuk memuat CSS SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
    <!-- Tambahkan ini sebelum penutupan </body> untuk memuat JavaScript SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>

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


        ::-webkit-scrollbar{
            display: none;
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
                           <i class="fs-4 bi-clipboard-data-fill"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle active">
                           <i class="fs-4 bi-person-fill-add"></i> <span class="ms-1 d-none d-sm-inline">Dokter</span> </a>
                    </li>
                    <li>
                        <a href="<?= site_url('gallery/admin')?>" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-image-fill"></i> <span class="ms-1 d-none d-sm-inline">Gallery</span></a>
                    </li>
                     <li>
                        <a href="<?= site_url('Profile/admin')?>" class="nav-link px-0 align-middle">
                             <i class="fs-4 bi-person-bounding-box"></i></i> <span class="ms-1 d-none d-sm-inline">Profile</span></a>
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
                                <a href="<?= site_url('obat')?>" class="nav-link px-0 "> <span class="d-none d-sm-inline">Data Obat</span></a>
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
         <?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '<?= $this->session->flashdata('success'); ?>'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?= $this->session->flashdata('error'); ?>'
        });
    </script>
<?php endif; ?>

        <!-- Judul dan tombol untuk menambah data -->
        <div class="mb-4">
            <h2 class="text-center" style="color: #00705a;">Data Dokter</h2>
            <!-- Tombol untuk menambah data baru, mengarah ke halaman create -->
            <a href="<?= site_url('Dokter/create'); ?>" class="btn btn-success btn-sm mt-3">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>

        <!-- Tabel yang menampilkan data upload, dengan ID untuk DataTables -->
        <table id="uploadTable" class="table table-bordered table-striped table-hover" 
       style="border-color: #00705a; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <thead style="background-color: #00705a; border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <tr>
            <th class="text-white" style="background-color: #00705a; text-align: center; font-weight: bold;">Nomor</th>
            <th class="text-white" style="background-color: #00705a; text-align: center; font-weight: bold;">Gambar</th>
            <th class="text-white" style="background-color: #00705a; text-align: center; font-weight: bold;">Nama</th>
            <th class="text-white" style="background-color: #00705a; text-align: center; font-weight: bold;">Pelayanan</th>
            <th class="text-white" style="background-color: #00705a; text-align: center; font-weight: bold;">Jadwal</th>
            <th class="text-white" style="background-color: #00705a; text-align: center; font-weight: bold;">Jam Praktek</th>
            <th  style="background-color: #00705a; text-align: center; font-weight: bold;">Tarif</th>
            <th style="background-color: #00705a; text-align: center; font-weight: bold;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($uploads)): ?>
            <?php $no = 1; ?>
            <?php foreach ($uploads as $upload): ?>
                <tr style="background-color: #eaf7f3; border-color: #00705a; border-radius: 8px; transition: all 0.3s ease-in-out;">
                    <td style="border-color: #00705a; text-align: center;"><?= $no++; ?></td>
                    <td class="text-center" style="border-color: #00705a;">
                        <?php if (!empty($upload['gambar'])): ?>
                            <img src="<?= base_url('assets/'.$upload['gambar']); ?>" class="img-thumbnail" width="90px" style="border-radius: 8px;">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada gambar</span>
                        <?php endif; ?>
                    </td>
                    <td style="border-color: #00705a;"><?= !empty($upload['nama']) ? $upload['nama'] : '-'; ?></td>
                    <td style="border-color: #00705a;"><?= !empty($upload['spesialis']) ? $upload['spesialis'] : '-'; ?></td>
                    <td style="border-color: #00705a;">
                       <?php 
                            if (!empty($upload['jadwal'])) {
                                // Mengubah string jadwal yang dipisahkan koma menjadi array
                                $jadwal_array = explode(',', $upload['jadwal']);
                                // Menggabungkan jadwal hari yang dipilih menjadi satu string dengan koma sebagai pemisah
                                echo implode(', ', $jadwal_array);
                            } else {
                                echo '-'; // Menampilkan tanda '-' jika jadwal hari kosong
                            }
                        ?>
                    </td>
                    <td style="border-color: #00705a;"><?= !empty($upload['jam_praktek']) ? $upload['jam_praktek'] : '-'; ?></td>
                    <td style="border-color: #00705a;"><?= !empty($upload['tarif']) ? $upload['tarif'] : '-'; ?></td>

                    <td class="text-center" style="border-color: #00705a;">
                        <a href="<?= site_url('dokter/edit/'.$upload['id']); ?>" class="btn btn-warning btn-sm" 
                           style="color: #00705a; background-color: #fff; border-color: #00705a; border-radius: 5px; padding: 5px 10px; transition: all 0.3s ease;">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="<?= site_url('dokter/delete/'.$upload['id']); ?>" class="btn btn-danger btn-sm" 
                           style="color: #ffffff; background-color: #00705a; border-color: #00705a; border-radius: 5px; padding: 5px 10px; transition: all 0.3s ease;" 
                           onclick="return confirm('Yakin ingin menghapus data ini?');">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center" style="border-color: #00705a; font-style: italic; color: #666;">Tidak ada data tersedia</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
    </div>
    </div>
</div>
</body>
<script type="text/javascript">
        $(document).ready(function(){
            // Inisialisasi DataTables dengan konfigurasi
            $('#uploadTable').DataTable({
                responsive: true, // Menyusun ulang tabel agar responsif
                autoWidth: false, // Menonaktifkan lebar otomatis
                language: {
                    search: "Cari:", // Label untuk kolom pencarian
                    lengthMenu: "Tampilkan _MENU_ entri", // Pilihan jumlah entri yang tampil
                    info: "Menampilkan _START_ ke _END_ dari _TOTAL_ entri", // Info tentang jumlah entri yang ditampilkan
                    paginate: {
                        first: "Pertama", // Label untuk tombol pertama
                        last: "Terakhir", // Label untuk tombol terakhir
                        next: "Berikutnya", // Label untuk tombol berikutnya
                        previous: "Sebelumnya" // Label untuk tombol sebelumnya
                    }
                }
            });
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>