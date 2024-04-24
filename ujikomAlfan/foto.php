<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <title>Halaman Foto</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa; /* Light gray background */
    margin: 0;
    padding: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:gray;
     /* Blue navigation bar */
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px; /* Increased padding for better spacing */
    text-decoration: none;
    transition: background-color 0.3s ease;
}

li a:hover {
    background-color: #404142; /* Darker blue on hover */
}

.active {
    background-color: #4d4e4e; /* Dark gray for active link */
}

h1 {
    text-align: center;
    color: #333;
    margin-top: 20px;
}

table {
    margin: auto;
    border-collapse: collapse;
    width: 90%; /* Increase table width for better spacing */
    background-color:  #333; /* White background */
    border-radius: 8px; /* Add border radius for a softer look */
    overflow: hidden; /* Hide any overflow content */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
}

th, td {
    border: 1px solid #ddd; /* Light gray border */
    padding: 12px; /* Increased padding for better spacing */
    text-align: left;
}

th {
    background-color: black; /* Header background color */
    color: white; /* Header text color */
}

td {
    background-color: #f8f9fa; /* Light gray alternate row background */
}

td:nth-child(even) {
    background-color: #e9ecef; /* Slightly darker alternate rows */
}

img {
    display: block;
    margin: 0 auto; /* Center images horizontally */
    max-width: 100%;
    height: auto;
}

.icon-button {
    display: inline-block;
    color: #1b1c1d; /* Default color of the icon */
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    transition: color 0.3s ease; /* Smooth transition for color change */
}

.icon-button:hover {
    color: #0586ff; /* Color of the icon on hover */
}


.button i {
    margin-right: 5px;
}
.form-container {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    background-color: #333; /* Ubah warna latar belakang form menjadi gelap */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); /* Berikan efek bayangan putih */
}
    .form-group {
    margin-bottom: 20px;
}

/* Form label */
.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #ddd; /* Ubah warna teks label */
}

/* Form input */
.form-input {
    width: 90%;
    padding: 10px;
    border: 1px solid #666; /* Ubah warna border input */
    border-radius: 4px;
    background-color: #444; /* Ubah warna latar belakang input */
    color: #ddd; /* Ubah warna teks input */
}

/* Submit button */
.submit-button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #282929;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Button hover effect */
.submit-button:hover {
    background-color: #0056b3;
}
</style>
<body>
<ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <h1>Halaman Foto</h1>
    <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>
    
   
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data" class="form-container">
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judulfoto" class="form-input" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" id="deskripsi" name="deskripsifoto" class="form-input" required>
    </div>
    <div class="form-group">
        <label for="lokasiFile">Lokasi File</label>
        <input type="file" id="lokasiFile" name="lokasifile" class="form-input" required>
    </div>
    <button type="submit" class="submit-button">Tambah</button>
</form>


    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
         $i= 1;
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                <td><?=$i ?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td>
    <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>" class="icon-link"><i class="fas fa-trash-alt"></i></a>
    <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>" class="icon-link"><i class="fas fa-pencil-alt"></i></a>
</td>

                </tr>
        <?php
             $i++; }
        ?>
    </table>
</body>
</html>