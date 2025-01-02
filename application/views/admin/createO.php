<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter set yang digunakan adalah UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Menyesuaikan tampilan di perangkat mobile agar responsif -->
    <title>Tambah Data</title> <!-- Menampilkan judul halaman "Tambah Data" di tab browser -->
    <!-- Bootstrap CSS -->
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
                        <?php echo form_open_multipart('obat/create'); ?> <!-- Membuka form dengan action ke 'upload/create' untuk mengirim data via POST dan mendukung pengunggahan file -->
                            <div class="mb-3"> <!-- Membuat div untuk input pertama (Kode Dosen) dengan margin bawah -->
                            <label for="id" class="form-label">Kode Obat</label> <!-- Label untuk input kode dosen -->
                            <input type="text" id="id" name="id" class="form-control" value="<?= $id ?>" readonly> <!-- Input untuk kode dosen, value diambil dari variabel PHP, hanya dapat dibaca (readonly) -->
                        </div>
                           
                                <!-- Input untuk deskripsi -->
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="nama_obat" class="form-label">Nama Obat</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="nama_obat" 
                                    id="nama_obat" 
                                    class="form-control"
                                    placeholder="Masukkan Nama Obat" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="komposisi" class="form-label">Komposisi</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="komposisi" 
                                    id="komposisi" 
                                    class="form-control"
                                    placeholder="Masukkan Komposisi" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="guna_obat" class="form-label">Guna Obat</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="guna_obat" 
                                    id="guna_obat" 
                                    class="form-control"
                                    placeholder="Masukkan Guna Obat" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="dosis" class="form-label">Dosis</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="dosis" 
                                    id="dosis" 
                                    class="form-control"
                                    placeholder="Masukkan Dosis" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="harga" class="form-label">Harga</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="number" 
                                    name="harga" 
                                    id="harga" 
                                    class="form-control"
                                    placeholder="Masukkan Harga" 
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
