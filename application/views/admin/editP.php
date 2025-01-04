<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Mendefinisikan karakter encoding untuk dokumen HTML (UTF-8) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Untuk memastikan halaman responsif di perangkat mobile -->
    <title>Edit Pasien</title> <!-- Judul halaman yang muncul di tab browser -->
    <!-- Menyertakan file CSS Bootstrap dari CDN untuk styling halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">

</head>
<body class="bg-light">
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

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
                        <h4>Edit Pasien</h4> <!-- Judul halaman untuk menunjukkan bahwa halaman ini untuk mengedit data -->
                    </div>
                    <div class="card-body">
                        <!-- Form untuk mengedit data upload, dengan enctype untuk mendukung upload file -->
                        <?php echo form_open_multipart('Pasien/edit/' . $upload->id); ?>
                            <!-- Input field untuk deskripsi dengan nilai default dari data yang sudah ada -->
                            
                            
                           <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="nama" class="form-label">Nama</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="nama" 
                                    id="nama" 
                                    class="form-control"
                                    placeholder="Masukkan nama" 
                                    value="<?= $upload->nama?>"
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="tgl" class="form-label">Tanggal Lahir</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="date" 
                                    name="tanggal_lahir" 
                                    id="tgl" 
                                    class="form-control"
                                    value="<?= $upload->tanggal_lahir?>"
                                    placeholder="Masukkan Tnggal Lahir" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="jk" class="form-label">Jenis Kelamin</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="jenis_kelamin" 
                                    id="jk" 
                                    class="form-control"
                                    value="<?= $upload->jenis_kelamin?>"
                                    placeholder="Masukkan Jenis Kelamin" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="alamat" class="form-label">Alamat</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="alamat" 
                                    id="alamat" 
                                    class="form-control"
                                    value="<?= $upload->alamat?>"
                                    placeholder="Masukkan Alamat" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="goldar" class="form-label">Golongan Darah</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="goldar" 
                                    id="goldar" 
                                    class="form-control"
                                    value="<?= $upload->goldar?>"
                                    placeholder="Masukkan Golongan Darah" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="no_telp" class="form-label">Nomor Telepon</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="number" 
                                    name="nomor_telepon" 
                                    id="no_telp" 
                                    class="form-control"
                                    value="<?= $upload->nomor_telepon?>"
                                    placeholder="Masukkan Nomor Telepon" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="riwayat" class="form-label">Riwayat Penyakit</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="riwayat_penyakit" 
                                    id="riwayat"
                                    class="form-control"
                                    value="<?= $upload->riwayat_penyakit?>"
                                    placeholder="Masukkan Riwayat" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>  
                            <!-- Menampilkan gambar yang sebelumnya diupload -->
                            <div class="mb-3">
                                <label class="form-label">Gambar Sebelumnya</label>
                                <br>
                                <img src="<?php echo base_url('assets/' . $upload->foto_pasien); ?>" width="150px" class="rounded shadow-sm">
                            </div>
                            <!-- Input field untuk upload gambar baru -->
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Upload Foto Baru</label>
                                <input 
                                    type="file" 
                                    name="foto_pasien" 
                                    id="gambar" 
                                    class="form-control">
                            </div>
                            <!-- Tombol untuk submit form dan tombol untuk kembali ke halaman sebelumnya -->
                            <div class="text-center">
                                <button type="submit" name="Submit" value="Update" class="btn btn-success">
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
