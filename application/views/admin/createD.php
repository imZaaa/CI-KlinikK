<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter set yang digunakan adalah UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Menyesuaikan tampilan di perangkat mobile agar responsif -->
    <title>Tambah Data</title> <!-- Menampilkan judul halaman "Tambah Data" di tab browser -->
    <!-- Bootstrap CSS -->
             <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Mengimpor CSS Bootstrap untuk styling halaman -->
</head>
<body class="bg-light"> <!-- Menambahkan kelas 'bg-light' pada body untuk memberikan latar belakang terang -->

    <div class="container mt-5" style="width: 60%;"> <!-- Membuat container dengan margin top 5 untuk memberi jarak atas -->
        <div class="row justify-content-center"> <!-- Membuat row untuk menyusun elemen di tengah halaman -->
            <div class="col-md-6"> <!-- Menentukan lebar kolom menjadi 6 dari 12 kolom grid (50% lebar) -->
                <div class="card shadow-sm"> <!-- Membuat card dengan efek bayangan kecil -->
                    <div class="card-header text-center bg-primary text-white"> <!-- Header card dengan latar belakang biru dan teks putih, serta teks terpusat -->
                        <h4>Tambah Data</h4> <!-- Judul halaman "Tambah Data" -->
                    </div>
                    <div class="card-body"> <!-- Isi dari card -->
                        <!-- Form untuk mengupload data -->
                        <?php echo form_open_multipart('Dokter/create'); ?> <!-- Membuka form dengan action ke 'Dokter/create' untuk mengirim data via POST dan mendukung pengunggahan file -->

    <!-- Input untuk nama -->
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input 
            type="text" 
            name="nama" 
            id="nama" 
            class="form-control" 
            placeholder="Masukkan nama" 
            required>
    </div>                            

    <!-- Input untuk spesialis -->
    <div class="mb-3">
    <label for="spesialis" class="form-label">Jenis Dokter</label>
    <select name="spesialis" id="spesialis" class="form-control" required>
        <option value="" disabled selected>Pilih jenis dokter</option>
        <option value="umum" <?php echo (isset($data['spesialis']) && $data['spesialis'] == 'umum') ? 'selected' : ''; ?>>Umum</option>
        <option value="spesialis" <?php echo (isset($data['spesialis']) && $data['spesialis'] == 'spesialis') ? 'selected' : ''; ?>>Spesialis</option>
    </select>
</div>
                          

    <!-- Input untuk jadwal hari (checkbox) -->
    <div class="mb-3">
        <label class="form-label">Jadwal Hari</label><br>
        <?php 
        $hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
        foreach ($hari as $day): ?>
            <div class="form-check form-check-inline">
                <input 
                    class="form-check-input" 
                    type="checkbox" 
                    name="jadwal[]" 
                    id="jadwal_<?= $day; ?>" 
                    value="<?= $day; ?>">
                <label class="form-check-label" for="jadwal_hari_<?= $day; ?>">
                    <?= $day; ?>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Input untuk jam praktek -->
    <div class="mb-3">
        <label for="jam_praktek" class="form-label">Jam Praktek</label>
        <input 
            type="text" 
            name="jam_praktek" 
            id="jam_praktek" 
            class="form-control" 
            placeholder="Misal: 08:00 - 12:00" 
            required>
    </div>                            
       
    <!-- Input untuk mengupload gambar -->
    <div class="mb-3">
        <label for="gambar" class="form-label">Upload Gambar</label>
        <input 
            type="file" 
            name="gambar" 
            id="gambar" 
            class="form-control">
    </div>

    <!-- Tombol submit dan tombol kembali -->
    <div class="text-center">
        <button type="submit" name="submit" value="Simpan" class="btn btn-success">
            Simpan
        </button>
        <a href="<?= site_url('dokter/admin'); ?>" class="btn btn-secondary">
            Kembali
        </a>
    </div>

<?php echo form_close(); ?>
 <!-- Menutup form yang telah dibuka -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> <!-- Mengimpor JS Bootstrap untuk mendukung fitur seperti modal dan dropdown -->
</body>
</html>
