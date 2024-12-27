<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <!-- Tampilkan pesan sukses atau error -->
    <?php if ($this->session->flashdata('success')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
    <?php elseif ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form action="<?php echo site_url('login/update_user/' . $user->id); ?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" value="<?php echo set_value('username', $user->username); ?>" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="<?php echo set_value('email', $user->email); ?>" required><br><br>

        <label for="role">Role:</label><br>
        <select name="role" id="role" required>
            <option value="admin" <?php echo $user->role == 'admin' ? 'selected' : ''; ?>>Admin</option>
            <option value="user" <?php echo $user->role == 'user' ? 'selected' : ''; ?>>User</option>
        </select><br><br>

        <button type="submit">Update User</button>
    </form>
</body>
</html>
