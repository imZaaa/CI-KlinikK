<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Mendefinisikan karakter encoding untuk dokumen HTML (UTF-8) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Untuk memastikan halaman responsif di perangkat mobile -->
    <title>Edit Data</title> <!-- Judul halaman yang muncul di tab browser -->
    <!-- Menyertakan file CSS Bootstrap dari CDN untuk styling halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">

</head>
<body class="bg-light">
    <!-- Membuat container utama dengan margin atas untuk memberi ruang -->
    <div class="container mt-5">
        <!-- Membuat baris dengan pengaturan agar elemen di dalamnya terpusat secara horizontal -->
        <div class="row justify-content-center">
            <!-- Membuat kolom dengan lebar 8 dari 12 kolom grid (66,67%) -->
            <div class="col-md-8">
                <!-- Membuat card dengan efek bayangan kecil untuk tampilan yang lebih elegan -->
                <div class="card shadow-sm">
                    <!-- Header card dengan latar belakang kuning dan teks putih -->
                    <div class="card-header text-center bg-warning text-white">
                        <h4>Edit Data</h4> <!-- Judul halaman untuk menunjukkan bahwa halaman ini untuk mengedit data -->
                    </div>
                    <div class="card-body">
                        <!-- Form untuk mengedit data upload, dengan enctype untuk mendukung upload file -->
                        <?php echo form_open_multipart('Dokter/edit/' . $upload->id); ?>
                    <!-- Input field untuk deskripsi dengan nilai default dari data yang sudah ada -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input 
                            type="text" 
                            name="nama" 
                            id="nama" 
                            class="form-control" 
                            value="<?php echo $upload->nama; ?>" 
                            placeholder="Masukkan nama baru" 
                            required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="spesialis" class="form-label">Jenis Dokter</label>
                        <select name="spesialis" id="spesialis" class="form-control" value="<?php echo $upload->spesialis; ?>" placeholder="Masukkan spesialis baru" required>
                            <option value="" disabled selected>Pilih jenis dokter</option>
                            <option value="umum" <?php echo (isset($data['spesialis']) && $data['spesialis'] == 'umum') ? 'selected' : ''; ?>>Umum</option>
                            <option value="spesialis" <?php echo (isset($data['spesialis']) && $data['spesialis'] == 'spesialis') ? 'selected' : ''; ?>>Spesialis</option>
                        </select>
                    </div>

                    <div class="mb-3">
                    <label for="jadwal" class="form-label">Jadwal</label>
                    <!-- Checkbox untuk jadwal hari -->
                    <div>
                <?php 
                    // Daftar hari dalam seminggu
                    $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

                    // Jika jadwal sudah dalam bentuk array, langsung gunakan, jika dalam bentuk string, pisahkan dengan explode()
                    $selected_days = is_array($upload->jadwal) ? $upload->jadwal : explode(',', $upload->jadwal);

                    // Loop untuk membuat checkbox setiap hari
                    foreach ($hari as $day) :
                ?>
                    <div class="form-check form-check-inline">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="jadwal[]" 
                            value="<?php echo $day; ?>"
                            <?php echo in_array($day, $selected_days) ? 'checked' : ''; ?>>
                        <label class="form-check-label"><?php echo $day; ?></label>
                    </div>
                <?php endforeach; ?>

                    </div>
                </div>

                <div class="mb-3">
                    <label for="jam_praktek" class="form-label">Jam Praktek</label>
                    <input 
                        type="text" 
                        name="jam_praktek" 
                        id="jam_praktek" 
                        class="form-control" 
                        value="<?php echo is_array($upload->jam_praktek) ? implode(', ', $upload->jam_praktek) : $upload->jam_praktek; ?>"  
                        placeholder="Masukkan jam praktek (contoh: 08:00 - 12:00)" 
                        required>
                </div>
                

                <!-- Menampilkan gambar yang sebelumnya diupload -->
                <div class="mb-3">
                    <label class="form-label">Gambar Sebelumnya</label>
                    <br>
                    <img src="<?php echo base_url('assets/' . $upload->gambar); ?>" width="150px" class="rounded shadow-sm">
                </div>

                <!-- Input field untuk upload gambar baru -->
                <div class="mb-3">
                    <label for="gambar" class="form-label">Upload Gambar Baru</label>
                    <input 
                        type="file" 
                        name="gambar" 
                        id="gambar" 
                        class="form-control">
                </div>

                <!-- Tombol untuk submit form dan tombol untuk kembali ke halaman sebelumnya -->
                <div class="text-center">
                    <button type="submit" name="Submit" value="Update" class="btn btn-success">
                        Update
                    </button>
                    <a href="<?= site_url('dokter/admin'); ?>" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            <?php echo form_close(); ?>
            <!-- Menutup tag form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Menyertakan file JS Bootstrap dari CDN untuk fungsionalitas seperti modal, dropdown, dll. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
