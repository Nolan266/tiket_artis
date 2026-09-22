<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container auth-container">

    <h1>Login</h1>

    <?php if (!empty($_GET['registered'])): ?>
        <div class="alert alert-success">
            Registrasi berhasil! Silakan login.
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=login">

        <label>Username</label>

        <input
            type="text"
            name="username"
            required
            autofocus
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            required
        >

        <button type="submit">
            Login
        </button>

    </form>

    <p class="auth-switch">
        Belum punya akun?
        <a href="index.php?page=register">Daftar di sini</a>
    </p>

</div>

</body>

</html>
