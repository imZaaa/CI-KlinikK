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
                        <?php echo form_open_multipart('Gallery/edit/' . $upload->id); ?>
                            <!-- Input field untuk deskripsi dengan nilai default dari data yang sudah ada -->
                            
                            
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input 
                                    type="text" 
                                    name="deskripsi" 
                                    id="deskripsi" 
                                    class="form-control" 
                                    value="<?php echo $upload->deskripsi; ?>" 
                                    placeholder="Masukkan deskripsi baru" 
                                    required>
                            </div>
                           <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-control" required>
                                <option value="Fasilitas" <?php echo ($upload->kategori == 'Fasilitas') ? 'selected' : ''; ?>>Fasilitas</option>
                                <option value="Proses Pelayanan" <?php echo ($upload->kategori == 'Proses Pelayanan') ? 'selected' : ''; ?>>Proses Pelayanan</option>
                                <option value="Peralatan Medis" <?php echo ($upload->kategori == 'Peralatan Medis') ? 'selected' : ''; ?>>Peralatan Medis</option>
                                <option value="Kegiatan Kesehatan" <?php echo ($upload->kategori == 'Kegiatan Kesehatan') ? 'selected' : ''; ?>>Kegiatan Kesehatan</option>
                                <option value="Tim Medis" <?php echo ($upload->kategori == 'Tim Medis') ? 'selected' : ''; ?>>Tim Medis</option>
                            </select>
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
                                <button type="submit" name="submit" value="Update" class="btn btn-success">
                                    Update
                                </button>
                                <a href="<?= site_url('gallery/admin'); ?>" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>
                        <?php echo form_close(); ?> <!-- Menutup tag form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menyertakan file JS Bootstrap dari CDN untuk fungsionalitas seperti modal, dropdown, dll. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
