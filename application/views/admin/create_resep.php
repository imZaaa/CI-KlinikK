<h2>Tambah Resep</h2>
<form method="post" action="<?php echo site_url('resep/create'); ?>">
    <label for="id_pengobatan">Pengobatan:</label>
    <select name="id_pengobatan" required>
        <?php foreach ($pengobatan as $p): ?>
            <option value="<?php echo $p['id_pengobatan']; ?>"><?php echo $p['tgl_pengobatan']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="id_obat">Obat:</label>
    <select name="id_obat" required>
        <?php foreach ($obat as $o): ?>
            <option value="<?php echo $o['id']; ?>"><?php echo $o['nama_obat']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="jumlah_obat">Jumlah Obat:</label>
    <input type="number" name="jumlah_obat" required><br>

    <label for="dosis">Dosis:</label>
    <input type="text" name="dosis" required><br>

    <label for="tanggal_resep">Tanggal Resep:</label>
    <input type="date" name="tanggal_resep" required><br>

    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan"></textarea><br>

    <button type="submit">Simpan</button>
</form>
