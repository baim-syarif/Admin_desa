<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logout - Sistem Informasi Desa</title>
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
            text-align: center;
            color: #111;
            padding: 40px 20px;
        }

        .box {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #e0e0e0;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-bottom: 1rem;
            color: #0d47a1;
        }

        p {
            margin-bottom: 2rem;
            color: #444;
        }

        a.button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #0d47a1;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        a.button:hover {
            background-color: #0b3c91;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Anda telah logout</h2>
        <p>Terima kasih telah menggunakan Sistem Informasi Desa.</p>
        <a href="login.php" class="button">🔐 Masuk Kembali</a>
    </div>
</body>
</html>
