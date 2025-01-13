<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Daftar Resep</h2>
<a href="<?php echo site_url('resep/create'); ?>">Tambah Resep</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal Pengobatan</th>
            <th>Nama Obat</th>
            <th>Jumlah Obat</th>
            <th>Dosis</th>
            <th>Tanggal Resep</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resep as $r): ?>
            <tr>
                <td><?php echo $r['id_resep']; ?></td>
                <td><?php echo $r['tgl_pengobatan']; ?></td>
                <td><?php echo $r['nama_obat']; ?></td>
                <td><?php echo $r['jumlah_obat']; ?></td>
                <td><?php echo $r['dosis']; ?></td>
                <td><?php echo $r['tanggal_resep']; ?></td>
                <td><?php echo $r['keterangan']; ?></td>
                <td>
                    <a href="<?php echo site_url('resep/edit/'.$r['id_resep']); ?>">Edit</a>
                    <a href="<?php echo site_url('resep/delete/'.$r['id_resep']); ?>">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

