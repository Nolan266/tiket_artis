<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container auth-container">

    <h1>Daftar Akun</h1>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=register">

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

        <label>Konfirmasi Password</label>

        <input
            type="password"
            name="konfirmasi_password"
            required
        >

        <button type="submit">
            Daftar
        </button>

    </form>

    <p class="auth-switch">
        Sudah punya akun?
        <a href="index.php?page=login">Login di sini</a>
    </p>

</div>

</body>

</html>
