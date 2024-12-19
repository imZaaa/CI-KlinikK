<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-container h3 {
            text-align: center;
            color: #00705a;
            margin-bottom: 30px;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }
        .btn-login {
            background-color: #00705a;
            color: white;
            border-radius: 8px;
            padding: 10px;
            width: 100%;
            border: none;
        }
        .btn-login:hover {
            background-color: #005a42;
        }
        .form-check-label {
            font-size: 0.9rem;
        }
        .forgot-password {
            font-size: 0.9rem;
            color: #00705a;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <center><img src="<?= base_url('assets/logoo.jpg')?>" width="200px"></center> <br>
        <form action="<?= site_url('login/login_process/')?>" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div>
            <button type="submit" class="btn-login fw-bold">Login</button>
            <div class="mt-3 text-center">
            <a href="#" class="forgot-password" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot your password?</a>
            </div>            
          </div>
        </form>
    </div>
 <!-- Modal untuk Lupa Password atau Menampilkan Password -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Show Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('login/show_password') ?>" method="POST">
                    <label for="email" class="form-label">Enter your email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                    <?php if(isset($error_message)): ?>
                        <div class="mt-2 text-danger"><?= $error_message; ?></div>
                    <?php endif; ?>
                    <?php if(isset($password_message)): ?>
                        <div class="mt-2 text-success"><?= $password_message; ?></div>
                    <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Show Password</button>
            </div>
                </form>
        </div>
    </div>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
