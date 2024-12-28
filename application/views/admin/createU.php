<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Mengimpor CSS Bootstrap untuk styling halaman -->
    <title>Tambah User</title>
</head>
<body>
   <div class="container mt-5" style="max-width: 500px;">
    <div class="card shadow" style="border: none; border-radius: 10px;">
        <div class="card-header text-white text-center" style="background-color: #00705a; border-radius: 10px 10px 0 0;">
            <h4>Tambah User Baru</h4>
        </div>
        <div class="card-body" style="background-color: #f9f9f9; border-radius: 0 0 10px 10px;">
            <!-- Tampilkan pesan sukses atau error -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo site_url('login/add_user'); ?>" method="post">
                <div class="form-group mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                </div>

                <div class="form-group mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <button type="submit" class="btn text-white w-100" style="background-color: #00705a;">Tambah User</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
