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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Halaman Home</title>
</head>
<body>
   
    
    <ul style="background-color: black;">
        <li><a class="active"  href="index.php">Halaman Landing</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <h1>Halaman Home</h1>
    <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>
    <style>
   .card {
    width: 300px;
        float: left;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
              
            </div>
            <div>
                Jumlah Like: 
                <?php
                    $fotoid = $data['fotoid'];
                    $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($sql2);
                ?>
            </div>
            <div>
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