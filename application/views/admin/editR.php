<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep</title>
</head>
<body>
<h2>Edit Resep</h2>
<form method="post" action="<?php echo site_url('resep/edit/'.$resep['id_resep']); ?>">
    <label for="id_pengobatan">Pengobatan:</label>
    <select name="id_pengobatan" required>
        <?php foreach ($pengobatan as $p): ?>
            <option value="<?php echo $p['id_pengobatan']; ?>" 
                <?php echo $p['id_pengobatan'] == $resep['id_pengobatan'] ? 'selected' : ''; ?>>
                <?php echo $p['tgl_pengobatan']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="id_obat">Obat:</label>
    <select name="id_obat" required>
        <?php foreach ($obat as $o): ?>
            <option value="<?php echo $o['id']; ?>" 
                <?php echo $o['id'] == $resep['id_obat'] ? 'selected' : ''; ?>>
                <?php echo $o['nama_obat']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="jumlah_obat">Jumlah Obat:</label>
    <input type="number" name="jumlah_obat" value="<?php echo $resep['jumlah_obat']; ?>" required><br>

    <label for="dosis">Dosis:</label>
    <input type="text" name="dosis" value="<?php echo $resep['dosis']; ?>" required><br>

    <label for="tanggal_resep">Tanggal Resep:</label>
    <input type="date" name="tanggal_resep" value="<?php echo $resep['tanggal_resep']; ?>" required><br>

    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan"><?php echo $resep['keterangan']; ?></textarea><br>

    <button type="submit">Simpan</button>
    <a href="<?php echo site_url('resep'); ?>">Batal</a>
</form>
</body>
</html>
