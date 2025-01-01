<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Mendefinisikan karakter encoding untuk dokumen HTML (UTF-8) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Untuk memastikan halaman responsif di perangkat mobile -->
    <title>Edit Data</title> <!-- Judul halaman yang muncul di tab browser -->
    <!-- Menyertakan file CSS Bootstrap dari CDN untuk styling halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <?php echo form_open_multipart('obat/edit/' . $upload->id); ?>
                            <!-- Input field untuk deskripsi dengan nilai default dari data yang sudah ada -->
                            
                            
                            <div class="mb-3">
                                <label for="nama_obat" class="form-label">Nama Obat</label>
                                <input 
                                    type="text" 
                                    name="nama_obat" 
                                    id="nama_obat" 
                                    class="form-control" 
                                    value="<?php echo $upload->nama_obat; ?>" 
                                    placeholder="Masukkan nama obat baru" 
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="komposisi" class="form-label">Komposisi</label>
                                <input 
                                    type="text" 
                                    name="komposisi" 
                                    id="komposisi" 
                                    class="form-control" 
                                    value="<?php echo $upload->komposisi; ?>" 
                                    placeholder="Masukkan komposisi baru" 
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="guna_obat" class="form-label">Guna obat</label>
                                <input 
                                    type="text" 
                                    name="guna_obat" 
                                    id="guna_obat" 
                                    class="form-control" 
                                    value="<?php echo $upload->guna_obat; ?>" 
                                    placeholder="Masukkan guna obat baru" 
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="dosis" class="form-label">Dosis</label>
                                <input 
                                    type="text" 
                                    name="dosis" 
                                    id="dosis" 
                                    class="form-control" 
                                    value="<?php echo $upload->dosis; ?>" 
                                    placeholder="Masukkan dosis baru" 
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
                                <button type="submit" name="submit" value="Update" class="btn btn-success">
                                    Update
                                </button>
                                <a href="<?= site_url('upload'); ?>" class="btn btn-secondary">
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
