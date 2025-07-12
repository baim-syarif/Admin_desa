<?php
session_start();
require_once __DIR__ . '/config/db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($q);

    if ($user && $user['password'] === $password) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Login gagal! Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin Desa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            color: #111;
        }

        form {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 400px;
            border: 1px solid #e0e0e0;
        }

        form h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #0d47a1;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.4rem;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 1rem;
            background-color: #fdfdfd;
            transition: border 0.3s ease;
        }

        .form-group input:focus {
            border-color: #0d47a1;
            outline: none;
        }

        .form-group i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #777;
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background-color: #0d47a1;
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #0b3c91;
            transform: translateY(-2px);
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            text-align: center;
            margin-top: 1rem;
        }

        @media (max-width: 500px) {
            form {
                padding: 2rem;
            }
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <form method="POST">
        <h2>Login Admin Desa</h2>
        <div class="form-group">
            <i class="fas fa-user"></i>
            <input name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password" required>
        </div>
        <?php if ($error): ?>
            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>
        <button type="submit">Masuk</button>
    </form>
</body>
</html>
