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
                        <?php echo form_open_multipart('pasien/create'); ?> <!-- Membuka form dengan action ke 'upload/create' untuk mengirim data via POST dan mendukung pengunggahan file -->
                            
                         <div class="mb-3"> <!-- Membuat div untuk input pertama (Kode Dosen) dengan margin bawah -->
                            <label for="id" class="form-label">Kode Pasien</label> <!-- Label untuk input kode dosen -->
                            <input type="text" id="id" name="id" class="form-control" value="<?= $id ?>" readonly> <!-- Input untuk kode dosen, value diambil dari variabel PHP, hanya dapat dibaca (readonly) -->
                        </div>
                           
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
                                <label for="tgl" class="form-label">Tanggal Lahir</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="date" 
                                    name="tanggal_lahir" 
                                    id="tgl" 
                                    class="form-control"
                                    placeholder="Masukkan Tnggal Lahir" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                               <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                    <label class="form-label">Jenis Kelamin</label> <!-- Label untuk input deskripsi -->
                                    <div class="d-flex"> <!-- Flexbox untuk membuat radio button menyamping -->
                                        <div class="form-check me-3"> <!-- Margin kanan 3 untuk memberi jarak antar radio button -->
                                            <input 
                                                type="radio" 
                                                name="jenis_kelamin" 
                                                id="jk-laki" 
                                                class="form-check-input"
                                                value="Laki-laki"
                                                required> <!-- Menandakan input ini wajib diisi -->
                                            <label for="jk-laki" class="form-check-label">Laki-laki</label>
                                        </div>
                                        <div class="form-check"> <!-- Tidak perlu margin kanan untuk yang terakhir -->
                                            <input 
                                                type="radio" 
                                                name="jenis_kelamin" 
                                                id="jk-perempuan" 
                                                class="form-check-input"
                                                value="Perempuan"
                                                required> <!-- Menandakan input ini wajib diisi -->
                                            <label for="jk-perempuan" class="form-check-label">Perempuan</label>
                                        </div>
                                    </div>
                                </div>                          
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="alamat" class="form-label">Alamat</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="text" 
                                    name="alamat" 
                                    id="alamat" 
                                    class="form-control"
                                    placeholder="Masukkan Alamat" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                               <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                    <label class="form-label">Golongan Darah</label> <!-- Label untuk input deskripsi -->
                                    <div class="d-flex"> <!-- Flexbox untuk membuat radio button menyamping -->
                                        <div class="form-check me-3"> <!-- Margin kanan 3 untuk memberi jarak antar radio button -->
                                            <input 
                                                type="radio" 
                                                name="goldar" 
                                                id="goldar-a" 
                                                class="form-check-input"
                                                value="A"
                                                required> <!-- Menandakan input ini wajib diisi -->
                                            <label for="goldar-a" class="form-check-label">A</label>
                                        </div>
                                        <div class="form-check me-3"> <!-- Margin kanan 3 untuk memberi jarak antar radio button -->
                                            <input 
                                                type="radio" 
                                                name="goldar" 
                                                id="goldar-b" 
                                                class="form-check-input"
                                                value="B"
                                                required> <!-- Menandakan input ini wajib diisi -->
                                            <label for="goldar-b" class="form-check-label">B</label>
                                        </div>
                                        <div class="form-check me-3"> <!-- Margin kanan 3 untuk memberi jarak antar radio button -->
                                            <input 
                                                type="radio" 
                                                name="goldar" 
                                                id="goldar-ab" 
                                                class="form-check-input"
                                                value="AB"
                                                required> <!-- Menandakan input ini wajib diisi -->
                                            <label for="goldar-ab" class="form-check-label">AB</label>
                                        </div>
                                        <div class="form-check"> <!-- Tidak perlu margin kanan untuk yang terakhir -->
                                            <input 
                                                type="radio" 
                                                name="goldar" 
                                                id="goldar-o" 
                                                class="form-check-input"
                                                value="O"
                                                required> <!-- Menandakan input ini wajib diisi -->
                                            <label for="goldar-o" class="form-check-label">O</label>
                                        </div>
                                    </div>
                                </div>                          
                                <div class="mb-3"> <!-- Margin bawah 3 untuk memberi jarak antar elemen -->
                                <label for="no_telp" class="form-label">Nomor Telepon</label> <!-- Label untuk input deskripsi -->
                                <input 
                                    type="number" 
                                    name="nomor_telepon" 
                                    id="no_telp" 
                                    class="form-control"
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
                                    placeholder="Masukkan Riwayat" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>                            
                            <!-- Input untuk mengupload gambar -->
                            <div class="mb-3">
                                <label for="foto_pasien" class="form-label">Upload Foto</label> <!-- Label untuk input gambar -->
                                <input 
                                    type="file" 
                                    name="foto_pasien" 
                                    id="foto_pasien" 
                                    class="form-control" 
                                    required> <!-- Menandakan input ini wajib diisi -->
                            </div>

                            <!-- Tombol submit dan tombol kembali -->
                            <div class="text-center"> <!-- Menyusun tombol secara terpusat -->
                                <button type="submit" name="submit" value="Simpan" class="btn btn-success"> <!-- Tombol simpan dengan kelas success dari Bootstrap -->
                                    Simpan
                                </button>
                                <a href="<?= site_url('pasien'); ?>" class="btn btn-secondary"> <!-- Tombol kembali dengan link ke halaman daftar upload -->
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
