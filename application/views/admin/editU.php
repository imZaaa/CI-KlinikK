<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1 {
            color: #00705a;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #00705a;
            border-color: #00705a;
        }

        .btn-primary:hover {
            background-color: #005a44;
            border-color: #005a44;
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .form-select {
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .alert {
            text-align: center;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            font-size: 1rem;
        }

        .form-control {
            padding: 0.75rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5 form-container">
        <h1>Edit User</h1>

        <!-- Tampilkan pesan sukses atau error -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($user) && $user): ?>
    <form action="<?php echo site_url('login/update_user/' . $user->id); ?>" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo set_value('username', $user->username); ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo set_value('email', $user->email); ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
<?php else: ?>
    <p>User tidak ditemukan.</p>
<?php endif; ?>
    </div>

    <!-- Bootstrap JS (optional, for functionality like modal) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
