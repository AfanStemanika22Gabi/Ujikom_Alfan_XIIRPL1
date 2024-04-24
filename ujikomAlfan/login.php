<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #222; /* Hitam abu-abu gelap untuk latar belakang */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background-color: #333; /* Warna abu-abu gelap untuk kontainer login */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.1); /* Efek bayangan putih */
        width: 350px;
    }

    h1 {
        text-align: center;
        color: #ddd; /* Warna teks judul menjadi lebih terang */
    }

    input[type="text"],
    input[type="password"] {
        width: calc(100% - 20px); /* Disesuaikan untuk padding */
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #666; /* Warna abu-abu lebih gelap untuk border */
        border-radius: 6px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
        background-color: #444; /* Warna abu-abu lebih gelap untuk input */
        color: #ddd; /* Warna teks input */
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #007bff; /* Warna biru untuk focus */
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #FFEC9E;
        color: black;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .sign-up-link {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
    }

    .sign-up-link a {
        color: #007bff;
        text-decoration: none;
    }

    .sign-up-link a:hover {
        text-decoration: underline;
    }
</style>

</head>
<body>
    <div class="login-container">
        <h1>Halaman Login</h1>
        <form action="proses_login.php" method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
        <div class="sign-up-link">
            Belum punya akun? <a href="register.php">Sign Up</a>
        </div>
    </div>
</body>
</html>