<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Resep</title>
    <!-- Link Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <style>
        /* Custom style with color #00705a */
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container{
            width: 50%;
        }
        h2 {
            color: #00705a;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #00705a;
            color: white;
        }
        .btn-custom:hover {
            background-color: #004d40;
            color: white;
        }
        .form-label {
            font-weight: bold;
            color: #00705a;
        }
        .form-control, .btn-custom, select {
            border-radius: 8px;
            padding: 10px;
        }
        .form-control {
            border: 1px solid #00705a;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body class="container py-4">

    <div class="form-container">
        <h2>Tambah Resep</h2>
        <form method="post" action="<?php echo site_url('resep/create'); ?>">
            <div class="mb-3">
                <label for="id_pengobatan" class="form-label">Pengobatan:</label>
                <select name="id_pengobatan" id="id_pengobatan" class="form-control" required>
                    <option value="" disabled selected>Pilih Tanggal Pengobatan</option>
                    <?php foreach ($pengobatan as $p): ?>
                        <option value="<?php echo htmlspecialchars($p['id_pengobatan']); ?>">
                            <?php echo htmlspecialchars($p['tgl_pengobatan']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_obat" class="form-label">Obat:</label>
                <select name="id_obat" id="id_obat" class="form-control" required>
                    <option value="" disabled selected>Pilih Obat</option>
                    <?php foreach ($obat as $o): ?>
                        <option value="<?php echo htmlspecialchars($o['id']); ?>">
                            <?php echo htmlspecialchars($o['nama_obat']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah_obat" class="form-label">Jumlah Obat:</label>
                <input type="number" name="jumlah_obat" id="jumlah_obat" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis:</label>
                <input type="text" name="dosis" id="dosis" class="form-control" maxlength="50" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_resep" class="form-label">Tanggal Resep:</label>
                <input type="date" name="tanggal_resep" id="tanggal_resep" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan:</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="4" cols="50"></textarea>
            </div>

            <button type="submit" class="btn btn-custom">Simpan</button>
        </form>
    </div>

    <!-- Link Bootstrap JS and Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
