<?php
    session_start();
    if(!isset($_SESSION['userid'])){
      
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Halaman Komentar</title>
    
</head>
<style><style>
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
}</style>
<body>
<ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <h1>Halaman Komentar</h1>
    <?php if(isset($_SESSION['namalengkap'])){?>
    <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>
    <?php }else{?>
        <h1>Selamat datang <b>Anonymous</b></h1>
        <?php } ?>
   
<?php  if(isset($_SESSION['userid'])):?>

    <form action="tambah_komentar.php" method="post" enctype="multipart/form-data" class="form-container">
    <?php
        include "koneksi.php";
        $fotoid=$_GET['fotoid'];
        $sql=mysqli_query($conn,"SELECT * from foto where fotoid='$fotoid'");
        while($data=mysqli_fetch_array($sql)){
    ?>
    <input type="hidden" name="fotoid" value="<?=$data['fotoid']?>">
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judulfoto" class="form-input" value="<?=$data['judulfoto']?>" readonly>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" id="deskripsi" name="deskripsifoto" class="form-input" value="<?=$data['deskripsifoto']?>" readonly>
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
    </div>
    <div class="form-group">
        <label for="komentar">Komentar</label>
        <input type="text" id="komentar" name="isikomentar" class="form-input" required>
    </div>
    <button type="submit" class="submit-button">Tambah</button>
    <?php
        }
    ?>
</form>

<?php endif;?>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Komentar</th>
        <th>Tanggal</th>
        <th>Aksi</th> <!-- New column header for action -->
    </tr>
    <?php
    $i= 1;
        include "koneksi.php";
        $fotoid=$_GET['fotoid'];
        if(isset($_SESSION['userid'])){
        $userid=$_SESSION['userid'];
        }
        $sql=mysqli_query($conn,"SELECT * from komentarfoto,user where komentarfoto.userid=user.userid AND fotoid=$fotoid");
        while($data=mysqli_fetch_array($sql)){
    ?>
        <tr>
        <td><?=$i ?></td>
            <td><?=$data['namalengkap']?></td>
            <td><?=$data['isikomentar']?></td>
            <td><?=$data['tanggalkomentar']?></td>
            <td>
                <!-- Delete comment action -->
                <?php 
                if(isset($_SESSION['userid'])){
                if($userid == $data['userid']){?>
                    <a href="hapus_komentar.php?komentarid=<?=$data['komentarid']?>&fotoid=<?= $fotoid ?>" class="icon-link"><i class="fas fa-trash-alt"></i></a>

                <?php }}?>
            </td>
        </tr>
    <?php
        $i++; }
    ?>
</table>


    
</body>
</html>