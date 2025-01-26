<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengobatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <style>
        body {
            background-color: #f4f8f7;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 40%;
        }
        h2 {
            color: #00705a;
            font-weight: bold;
        }
        label {
            color: #00705a;
        }
        .form-control, .form-select {
            border-color: #00705a;
        }
        .form-control:focus, .form-select:focus {
            border-color: #006047;
            box-shadow: 0 0 0 0.25rem rgba(0, 96, 71, 0.25);
        }
        .btn {
            background-color: #00705a;
            color: white;
            border: none;
        }
        .btn:hover {
            background-color: #006047;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6368;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group input[type="checkbox"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Tambah Pengobatan</h2>
    <form action="<?= site_url('Pengobatan/create')?>" method="post">
        <div class="mb-3">
            <label for="id_pasien" class="form-label">Nama Pasien</label>
            <select name="id_pasien" id="id_pasien" class="form-select" required>
                <?php foreach ($pasien as $p): ?>
                    <option value="<?= $p['id'] ?>"><?= $p['nama']?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Dokter -->
        <div class="mb-3">
            <label for="id_dokter" class="form-label">Dokter</label>
            <select id="id_dokter" name="id_dokter" class="form-select" required>
                <option value="" selected>Pilih Dokter</option>
                <?php if (!empty($dokter)) : ?>
                    <?php foreach ($dokter as $d): ?>
                        <option value="<?= $d['id'] ?>" data-tarif="<?= $d['tarif'] ?>"><?= $d['nama'] ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <option value="">Tidak ada data dokter</option>
                <?php endif; ?>
            </select>
        </div>

        <!-- Input untuk memilih Penyakit -->
        <div class="form-group">
            <label for="id_penyakit">Penyakit</label><br>
            <?php foreach ($penyakit as $p): ?>
                <input type="checkbox" name="id_penyakit[]" value="<?= $p->id ?>" id="penyakit_<?= $p->id ?>">
                <label for="penyakit_<?= $p->id ?>"><?= $p->nama_penyakit ?></label><br>
            <?php endforeach; ?>
        </div>

        <!-- Input untuk memilih Obat -->
        <div class="form-group">
            <label for="id_obat">Obat</label><br>
            <?php foreach ($obat as $o): ?>
                <input type="checkbox" name="id_obat[]" value="<?= $o['id'] ?>" id="id_obat_<?= $o['id'] ?>" data-harga="<?= $o['harga'] ?>">
                <label for="id_obat_<?= $o['id'] ?>"><?= $o['nama_obat'] ?> - Rp <?= number_format($o['harga'], 0, ',', '.') ?></label><br>
            <?php endforeach; ?>
        </div>

        <!-- Tanggal Pengobatan -->
        <div class="mb-3">
            <label for="tgl_pengobatan" class="form-label">Tanggal Pengobatan</label>
            <input type="date" name="tgl_pengobatan" id="tgl_pengobatan" class="form-control" value="<?= date('Y-m-d')?>" readonly>
        </div>

        <div class="form-group">
            <label for="tarif_dokter">Tarif Dokter</label>
            <input type="text" class="form-control" id="tarif_dokter" value="<?= isset($tarif) ? $tarif : '' ?>" readonly>
        </div>

        <!-- Input untuk total biaya -->
        <div class="form-group">
            <label for="biaya_pengobatan">Total Biaya</label>
            <input type="text" id="biaya_pengobatan" name="biaya_pengobatan" class="form-control" readonly>
        </div>

        <!-- Status Bayar -->
        <div class="mb-3">
            <label for="status_bayar" class="form-label">Status Bayar</label>
            <select name="status_bayar" id="status_bayar" class="form-select" required>
                <option value="Belum Dibayar">Belum Dibayar</option>
                <option value="Sudah Dibayar">Sudah Dibayar</option>
            </select>
        </div>

        <button type="submit" name="Submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('pengobatan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
$(document).ready(function() {
    function calculateCost() {
        let totalBiaya = 0;

        // Biaya Dokter
        let dokterBiaya = $('#id_dokter option:selected').data('tarif');
        if (dokterBiaya) {
            totalBiaya += parseInt(dokterBiaya);
        }

        // Biaya Obat (gunakan checkbox untuk obat)
        $("input[name='id_obat[]']:checked").each(function() {
            let obatHarga = $(this).data('harga');
            if (obatHarga) {
                totalBiaya += parseInt(obatHarga);
            }
        });

        // Set total biaya pengobatan pada input biaya_pengobatan
        $('#biaya_pengobatan').val(totalBiaya);

        // Set tarif dokter pada input tarif_dokter
        $('#tarif_dokter').val(dokterBiaya);
    }

    // Hitung ulang setiap kali ada perubahan pada pemilihan dokter atau obat
    $('#id_dokter, input[name="id_obat[]"]').on('change', function() {
        calculateCost();
    });
});
</script>

</body>
</html>
