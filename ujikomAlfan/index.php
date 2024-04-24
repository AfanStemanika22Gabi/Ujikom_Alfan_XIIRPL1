
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <head>
</head>

    <title>Halaman Landing</title>
</head>
<body>
   
    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
    <?php
        }else{
    ?>   
      
        <ul style="background-color: black;">
            <li><a class="active" href="home.php">Home</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <h1>Halaman Landing</h1>
        <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>
    <?php
        }
    ?>
    

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
    .card {

        width: 300px;
        float: left;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 10px;

        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card:hover{
        box-shadow:100px;
        border: 1px solid #777;
    }

    .card-header {
        padding: 10px;
        background-color: #f5f5f5;
        border-bottom: 1px solid #ccc;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .card-body {
        padding: 10px;
    }

    .card-img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #ccc;
    }

    .card-footer {
        padding: 10px;
        background-color: #f5f55f;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .card-actions {
        display: flex;
        justify-content: space-between;
    }

    .icon-button {
        text-decoration: none;
        color: #333;
        padding: 5px;
    }
</style>

<?php
include "koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM foto,user WHERE foto.userid=user.userid");
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="card">
        <div class="card-header">
            <?=$data['namalengkap']?>
        </div>
        <div class="card-body">
            <img src="gambar/<?=$data['lokasifile']?>" class="card-img" alt="<?=$data['judulfoto']?>">
            <p><?=$data['judulfoto']?></p>
            <p><?=$data['deskripsifoto']?></p>
        </div>
        <div class="card-footer">
            <div class="card-actions">
                <a href="like.php?fotoid=<?=$data['fotoid']?>" class="icon-button"><i class="fas fa-heart"></i></a>
                <a href="komentar.php?fotoid=<?=$data['fotoid']?>" class="icon-button"><i class="fas fa-comment"></i></a>
            </div>
           
            <div>
                Jumlah Like: 
                <?php
                    $fotoid = $data['fotoid'];
                    $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($sql2);
                ?>
            </div>  <div>
                Jumlah komentar: 
                <?php
                    $fotoid = $data['fotoid'];
                    $sql2 = mysqli_query($conn, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($sql2);
                ?>
            </div>
        </div>
    </div>
<?php
}
?>

    
</body>
</html>