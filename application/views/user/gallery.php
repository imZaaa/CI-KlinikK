<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gallery</h1>
        <div class="row">
            <?php if (!empty($uploads)): ?>
                <?php foreach ($uploads as $upload): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/' . $upload['gambar']); ?>" class="card-img-top" alt="Gambar">
                            <div class="card-body">
                                <p class="card-text"><?= $upload['deskripsi']; ?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Belum ada data yang diunggah.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
