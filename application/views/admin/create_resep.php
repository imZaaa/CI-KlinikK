<h2>Tambah Resep</h2>
<form method="post" action="<?php echo site_url('resep/create'); ?>">
    <label for="id_pengobatan">Pengobatan:</label>
    <select name="id_pengobatan" id="id_pengobatan" required>
        <option value="" disabled selected>Pilih Tanggal Pengobatan</option>
        <?php foreach ($pengobatan as $p): ?>
            <option value="<?php echo htmlspecialchars($p['id_pengobatan']); ?>">
                <?php echo htmlspecialchars($p['tgl_pengobatan']); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="id_obat">Obat:</label>
    <select name="id_obat" id="id_obat" required>
        <option value="" disabled selected>Pilih Obat</option>
        <?php foreach ($obat as $o): ?>
            <option value="<?php echo htmlspecialchars($o['id']); ?>">
                <?php echo htmlspecialchars($o['nama_obat']); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="jumlah_obat">Jumlah Obat:</label>
    <input type="number" name="jumlah_obat" id="jumlah_obat" min="1" required><br><br>

    <label for="dosis">Dosis:</label>
    <input type="text" name="dosis" id="dosis" maxlength="50" required><br><br>

    <label for="tanggal_resep">Tanggal Resep:</label>
    <input type="date" name="tanggal_resep" id="tanggal_resep" required><br><br>

    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan" id="keterangan" rows="4" cols="50"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>
