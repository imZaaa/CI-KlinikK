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

    <div class="container mt-5"> <!-- Membuat container dengan margin top 5 untuk memberi jarak atas -->
        <div class="row justify-content-center"> <!-- Membuat row untuk menyusun elemen di tengah halaman -->
            <div class="col-md-6"> <!-- Menentukan lebar kolom menjadi 6 dari 12 kolom grid (50% lebar) -->
                <div class="card shadow-sm"> <!-- Membuat card dengan efek bayangan kecil -->
                    <div class="card-header text-center bg-primary text-white"> <!-- Header card dengan latar belakang biru dan teks putih, serta teks terpusat -->
                        <h4>Tambah Data</h4> <!-- Judul halaman "Tambah Data" -->
                    </div>
                    <div class="card-body"> <!-- Isi dari card -->
                        <!-- Form untuk mengupload data -->
                        <?php echo form_open_multipart('Dokter/create'); ?> <!-- Membuka form dengan action ke 'upload/create' untuk mengirim data via POST dan mendukung pengunggahan file -->
                            
                           
                                <!-- Input untuk deskripsi -->
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="nama" class="form-label">Nama</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="nama" 
                                    id="nama" 
                                    class="form-control"
                                    placeholder="Masukkan nama" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="spesialis" class="form-label">Spesialis</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="spesialis" 
                                    id="spesialis" 
                                    class="form-control"
                                    placeholder="Masukkan spesialis" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="jadwal" class="form-label">Jadwal</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="jadwal" 
                                    id="jadwal" 
                                    class="form-control"
                                    placeholder="Masukkan jadwal" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                            <!-- Input untuk mengupload gambar -->
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Upload Gambar</label> <!-- Label untuk input gambar -->
                                <input 
                                    type="file" 
                                    name="gambar" 
                                    id="gambar" 
                                    class="form-control" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>

                            <!-- Tombol submit dan tombol kembali -->
                            <div class="text-center"> <!-- Menyusun tombol secara terpusat -->
                                <button type="submit" name="Submit" value="Simpan" class="btn btn-success"> <!-- Tombol simpan dengan kelas success dari Bootstrap -->
                                    Simpan
                                </button>
                                <a href="<?= site_url('upload'); ?>" class="btn btn-secondary"> <!-- Tombol kembali dengan link ke halaman daftar upload -->
                                    Kembali
                                </a>
                            </div>

                        <?php echo form_close(); ?> <!-- Menutup form yang telah dibuka -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> <!-- Mengimpor JS Bootstrap untuk mendukung fitur seperti modal dan dropdown -->
</body>
</html>
