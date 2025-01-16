<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
</style>
<body>
    <div class="container-fluid">
    <div class="row flex-nowrap">
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #00705a; height: 100vh; overflow-y: auto;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
               <img src="<?= base_url('assets/logo.png')?>" width="130px">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="#" class="nav-link px-0 align-middle active">
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
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
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
    <div class="row g-4">
        <!-- Card Total Admin -->
        <div class="col-md-3">
    <a href="<?= site_url('login/dataU')?>" style="text-decoration: none;">
        <div class="card text-dark bg-white shadow">
            <div class="card-body text-center">
                <i class="bi bi-person-badge-fill fs-1 mb-3"></i>
                <h5 class="card-title">Total Admin</h5>
                <p class="card-text fs-3 fw-bold"><?= $admin_count; ?></p>
            </div>
        </div>
    </a>
</div>

<!-- Card Total User -->
<div class="col-md-3">
    <a href="<?= site_url('login/dataU')?>" style="text-decoration: none;">
        <div class="card text-dark bg-white shadow">
            <div class="card-body text-center">
                <i class="bi bi-people-fill fs-1 mb-3"></i>
                <h5 class="card-title">Total User</h5>
                <p class="card-text fs-3 fw-bold"><?= $user_count; ?></p>
            </div>
        </div>
    </a>
</div>

<!-- Card Total Pasien -->
<div class="col-md-3">
    <a href="<?= site_url('pasien')?>" style="text-decoration: none;">
        <div class="card text-dark bg-white shadow">
            <div class="card-body text-center">
                <i class="bi bi-person-lines-fill fs-1 mb-3"></i>
                <h5 class="card-title">Total Pasien</h5>
                <p class="card-text fs-3 fw-bold"><?= $patient_count; ?></p>
            </div>
        </div>
    </a>
</div>

<!-- Card Total Dokter -->
<div class="col-md-3">
    <a href="<?= site_url('dokter/admin')?>" style="text-decoration: none;">
        <div class="card text-dark bg-white shadow">
            <div class="card-body text-center">
                <i class="bi bi-heart-pulse-fill fs-1 mb-3"></i>
                <h5 class="card-title">Total Dokter</h5>
                <p class="card-text fs-3 fw-bold"><?= $doctor_count; ?></p>
            </div>
        </div>
    </a>
</div>

     <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chart-container">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
</body>
 <script>
    // Chart untuk Line
    // Chart untuk Line
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line', // Mengubah tipe grafik menjadi line
    data: {
        labels: ['Admin', 'User', 'Pasien', 'Dokter'],
        datasets: [{
            label: 'Jumlah Data',
            data: [
                <?= $admin_count; ?>,
                <?= $user_count; ?>,
                <?= $patient_count; ?>,
                <?= $doctor_count; ?>
            ],
            fill: true, // Mengisi area di bawah garis
            backgroundColor: 'rgba(93, 173, 226, 0.2)', // Warna latar belakang area
            borderColor: 'rgba(93, 173, 226, 1)', // Warna garis
            borderWidth: 2
        }]
    },
    options: {
    responsive: true,
    plugins: {
        title: {
            display: true,
            text: 'Jumlah Data Berdasarkan Kategori',
            font: {
                size: 16,
                family: 'Montserrat',
                weight: 'bold',
            },
            padding: {
                top: 10,
                bottom: 30
            }
        }
    },
    scales: {
        y: {
            beginAtZero: false, // Tidak mulai dari 0
            min: 1, // Mulai dari 1
            max: 4, // Berakhir di 4
            ticks: {
                stepSize: 1 // Setiap langkahnya 1
            }
        }
    }
}

});

// Chart untuk Pie
const ctxPie = document.getElementById('myPieChart').getContext('2d');
const myPieChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: ['Admin', 'User', 'Pasien', 'Dokter'],
        datasets: [{
            label: 'Distribusi Data',
            data: [
                <?= $admin_count; ?>,
                <?= $user_count; ?>,
                <?= $patient_count; ?>,
                <?= $doctor_count; ?>
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(255, 99, 132, 0.7)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Distribusi Data Pengguna Berdasarkan Kategori',
                font: {
                    size: 16,
                    family: 'Montserrat',
                    weight: 'bold',
                },
                padding: {
                    top: 10,
                    bottom: 30
                }
            }
        }
    }
});

</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
