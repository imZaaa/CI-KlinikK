<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Set background light grey */
        }
        .card {
            border-radius: 10px; /* Rounded corners for the card */
        }
        .card-header {
            background-color: #007bff; /* Blue header */
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .form-control {
            border-radius: 5px; /* Rounded corners for form inputs */
        }
        .btn {
            border-radius: 5px; /* Rounded corners for buttons */
            padding: 10px 20px;
        }
        .btn-success {
            background-color: #28a745; /* Green color for 'Save' button */
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d; /* Grey color for 'Back' button */
            border: none;
        }
        .btn:hover {
            opacity: 0.8; /* Slight opacity change on hover */
        }
        .card-body {
            padding: 30px; /* Increase padding inside the card */
        }
        .form-label {
            font-weight: bold; /* Make labels bold */
        }
        select.form-control {
            background-color: #ffffff; /* White background for dropdown */
            border-color: #ced4da; /* Grey border color */
        }
        .text-center {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h4>Tambah Data</h4>
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('gallery/create'); ?>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi" required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" class="form-control" required>
                                    <option value="Fasilitas">Fasilitas</option>
                                    <option value="Proses Pelayanan">Proses Pelayanan</option>
                                    <option value="Peralatan Medis">Peralatan Medis</option>
                                    <option value="Kegiatan Kesehatan">Kegiatan Kesehatan</option>
                                    <option value="Tim Medis">Tim Medis</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Upload Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="Submit" value="Simpan" class="btn btn-success">
                                    Simpan
                                </button>
                                <a href="<?= site_url('gallery/admin'); ?>" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
