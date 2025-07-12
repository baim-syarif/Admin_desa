<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang - Sistem Informasi Desa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Style */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            color: #222;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
        }

        h1 {
            font-size: 3rem;
            font-weight: 600;
            color: #0d47a1;
            margin-bottom: 12px;
        }

        p {
            font-size: 1.2rem;
            color: #444;
            margin-bottom: 30px;
        }

        a.button {
            display: inline-block;
            background: #0d47a1;
            color: white;
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        a.button:hover {
            background-color: #0b3c91;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        footer {
            position: absolute;
            bottom: 20px;
            font-size: 0.9rem;
            color: #888;
        }

        /* Responsive */
        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            a.button {
                padding: 10px 20px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>

    <h1>Sistem Informasi Desa</h1>
    <p>Selamat datang di portal layanan digital desa.</p>
    <a href="login.php" class="button">Masuk Sebagai Admin</a>

    <footer>© <?= date('Y') ?> Pemerintah Desa</footer>

</body>
</html>
