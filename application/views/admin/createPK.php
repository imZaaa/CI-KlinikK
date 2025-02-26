<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penyakit</title>
            <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Mengimpor CSS Bootstrap untuk styling halaman -->

</head>
<style>
    .container{
        width: 500px;
    }
</style>
<body>
    <div class="container mt-5 mb-5">
        <h2 class="text-center" style="color: #00705a;">Tambah Penyakit</h2>
        <form action="<?= site_url('Penyakit/create'); ?>" method="POST">
            <div class="form-group mb-3"> <!-- Membuat div untuk input pertama (Kode Dosen) dengan margin bawah -->
                <label for="id" class="form-label">Kode Penyakit</label> <!-- Label untuk input kode dosen -->
                <input type="text" id="id" name="id" class="form-control" value="<?= $id ?>" readonly> <!-- Input untuk kode dosen, value diambil dari variabel PHP, hanya dapat dibaca (readonly) -->
            </div>
            <div class="form-group mb-3">
                <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                <input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control" placeholder="Masukkan nama penyakit" required>
            </div>
            <div class="form-group mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi penyakit" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="penyebab" class="form-label">Penyebab</label>
                <textarea name="penyebab" id="penyebab" class="form-control" rows="2" placeholder="Masukkan penyebab penyakit"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="gejala" class="form-label">Gejala</label>
                <textarea name="gejala" id="gejala" class="form-control" rows="2" placeholder="Masukkan gejala penyakit"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="ciri_ciri" class="form-label">Ciri-ciri</label>
                <textarea name="ciri_ciri" id="ciri_ciri" class="form-control" rows="2" placeholder="Masukkan ciri-ciri penyakit"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="pengobatan" class="form-label">Pengobatan</label>
                <textarea name="pengobatan" id="pengobatan" class="form-control" rows="2" placeholder="Masukkan pengobatan penyakit"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="Infeksi">Infeksi</option>
                    <option value="Genetik">Genetik</option>
                    <option value="Metabolik">Metabolik</option>
                    <option value="Kardiovaskular">Kardiovaskular</option>
                    <option value="Onkologi">Onkologi</option>
                    <option value="Pernapasan">Pernapasan</option>
                    <option value="Urologi">Urologi</option>
                    <option value="Hematologi">Hematologi</option>
                    <option value="Neurologi">Neurologi</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" style="background-color: #00705a;">Simpan</button>
        </form>
    </div>
</body>
</html>
