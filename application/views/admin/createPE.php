<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengobatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Tambah Pengobatan</h2>
    <form action="<?= site_url('Pengobatan/create')?>" method="post">
        <div class="mb-3">
            <label for="id_pasien" class="form-label">Nama Pasien</label>
            <select name="id_pasien" id="id_pasien" class="form-select">
                <?php foreach ($pasien as $p): ?>
                    <option value="<?= $p['id'] ?>"><?= $p['nama']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_penyakit" class="form-label">Penyakit</label>
            <select name="id_penyakit" id="id_penyakit" class="form-select">
                <?php foreach ($penyakit as $pen): ?>
                    <option value="<?= $pen->id ?>"><?= $pen->nama_penyakit ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_obat" class="form-label">Obat</label>
            <select name="id_obat" id="id_obat" class="form-select">
                <?php foreach ($obat as $o): ?>
                    <option value="<?= $o['id']?>"><?= $o['nama_obat'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_pengobatan" class="form-label">Tanggal Pengobatan</label>
            <input type="date" name="tgl_pengobatan" id="tgl_pengobatan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="biaya_pengobatan" class="form-label">Biaya Pengobatan</label>
            <input type="number" name="biaya_pengobatan" id="biaya_pengobatan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status_bayar" class="form-label">Status Bayar</label>
            <select name="status_bayar" id="status_bayar" class="form-select">
                <option value="Belum Dibayar">Belum Dibayar</option>
                <option value="Sudah Dibayar">Sudah Dibayar</option>
            </select>
        </div>
        <button type="submit" name="Submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('pengobatan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
