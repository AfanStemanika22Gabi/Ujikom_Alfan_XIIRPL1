<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #222; /* Ubah warna latar belakang menjadi gelap */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #333; /* Ubah warna background form menjadi lebih gelap */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); /* Berikan efek bayangan putih */
    }

    h1 {
        text-align: center;
        color: #ddd; /* Ubah warna teks judul menjadi lebih terang */
    }

    table {
        margin: auto;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #444; /* Ubah warna border menjadi lebih gelap */
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #666; /* Ubah warna background input */
        color: #fff; /* Ubah warna teks input */
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color:#FFEC9E;
        color: black;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .sign-up-link {
        text-align: center;
        margin-top: 10px;
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
  
    <form action="proses_register.php" method="post">
        <table>
           <h1><center>Registrasi</center></h1> 
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="namalengkap" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Register"></td>
            </tr>
        </table>
        <div class="sign-up-link">
            Sudah punya akun? <a href="login.php">Login</a>
        </div>
    </form>
   
</body>
</html>