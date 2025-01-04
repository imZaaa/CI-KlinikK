<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengobatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #00705a;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .btn-primary {
            background-color: #00705a;
            border: none;
        }
        .btn-primary:hover {
            background-color: #005a46;
        }
        .form-control:focus {
            border-color: #00705a;
            box-shadow: 0 0 5px rgba(0, 112, 90, 0.5);
        }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Edit Pengobatan</h3>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('pengobatan/edit/' . $pengobatan->id_pengobatan) ?>" method="post">
                        <!-- Dropdown Pasien -->
                        <div class="form-group">
                            <label for="id_pasien">Pasien</label>
                            <select name="id_pasien" id="id_pasien" class="form-control">
                                <?php if (empty($pasien)): ?>
                                    <option value="">Data pasien tidak tersedia</option>
                                <?php else: ?>
                                    <?php foreach ($pasien as $row): ?>
                                        <option value="<?= $row['id']?>" <?= ($row['id'] == $pengobatan->id_pasien) ? 'selected' : '' ?>>
                                            <?= $row['nama'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <!-- Dropdown Penyakit -->
                        <div class="form-group">
                            <label for="id_penyakit">Penyakit</label>
                            <select name="id_penyakit" id="id_penyakit" class="form-control">
                                <?php foreach ($penyakit as $row): ?>
                                    <option value="<?= $row->id ?>" <?= ($row->id == $pengobatan->id_penyakit) ? 'selected' : '' ?>>
                                        <?= $row->nama_penyakit ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Dropdown Obat -->
                        <div class="form-group">
                            <label for="id_obat">Obat</label>
                            <select name="id_obat" id="id_obat" class="form-control">
                                <?php if (empty($obat)): ?>
                                    <option value="">Data obat tidak tersedia</option>
                                <?php else: ?>
                                    <?php foreach ($obat as $row): ?>
                                        <option value="<?= $row['id'] ?>" <?= ($row['id'] == $pengobatan->id_obat) ? 'selected' : '' ?>>
                                            <?= $row['nama_obat'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <!-- Input Tanggal -->
                        <div class="form-group">
                            <label for="tgl_pengobatan">Tanggal Pengobatan</label>
                            <input type="date" name="tgl_pengobatan" id="tgl_pengobatan" class="form-control"
                                   value="<?= $pengobatan->tgl_pengobatan ?>">
                        </div>
                        <!-- Input Biaya -->
                        <div class="form-group">
                            <label for="biaya_pengobatan">Biaya Pengobatan</label>
                            <input type="number" name="biaya_pengobatan" id="biaya_pengobatan" class="form-control"
                                   value="<?= $pengobatan->biaya_pengobatan ?>">
                        </div>
                        <!-- Dropdown Status Bayar -->
                        <div class="form-group">
                            <label for="status_bayar">Status Bayar</label>
                            <select name="status_bayar" id="status_bayar" class="form-control">
                                <option value="Belum Dibayar" <?= ($pengobatan->status_bayar == 'Belum Dibayar') ? 'selected' : '' ?>>
                                    Belum Dibayar
                                </option>
                                <option value="Sudah Dibayar" <?= ($pengobatan->status_bayar == 'Sudah Dibayar') ? 'selected' : '' ?>>
                                    Sudah Dibayar
                                </option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
