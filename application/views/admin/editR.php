<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep</title>
    <!-- Link Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom style with color #00705a */
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
        .container{
            width: 50%;
        }
    </style>
</head>
<body class="container py-4">

    <div class="form-container">
        <h2>Edit Resep</h2>
        <form method="post" action="<?php echo site_url('resep/edit/'.$resep['id_resep']); ?>">
            <div class="mb-3">
                <label for="id_pengobatan" class="form-label">Pengobatan:</label>
                <select name="id_pengobatan" class="form-control" required>
                    <?php foreach ($pengobatan as $p): ?>
                        <option value="<?php echo $p['id_pengobatan']; ?>" 
                            <?php echo $p['id_pengobatan'] == $resep['id_pengobatan'] ? 'selected' : ''; ?>>
                            <?php echo $p['tgl_pengobatan']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_obat" class="form-label">Obat:</label>
                <select name="id_obat" class="form-control" required>
                    <?php foreach ($obat as $o): ?>
                        <option value="<?php echo $o['id']; ?>" 
                            <?php echo $o['id'] == $resep['id_obat'] ? 'selected' : ''; ?>>
                            <?php echo $o['nama_obat']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah_obat" class="form-label">Jumlah Obat:</label>
                <input type="number" name="jumlah_obat" class="form-control" value="<?php echo $resep['jumlah_obat']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis:</label>
                <input type="text" name="dosis" class="form-control" value="<?php echo $resep['dosis']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_resep" class="form-label">Tanggal Resep:</label>
                <input type="date" name="tanggal_resep" class="form-control" value="<?php echo $resep['tanggal_resep']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan:</label>
                <textarea name="keterangan" class="form-control"><?php echo $resep['keterangan']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-custom">Simpan</button>
            <a href="<?php echo site_url('resep'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- Link Bootstrap JS and Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
