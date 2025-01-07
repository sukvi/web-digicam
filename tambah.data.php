<?php
    session_start();
    include 'database.php';
    if($_SESSION['status_login'] != true){
        echo '<script>document.location="login.php"</script>';
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kategori</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand&display=swap" rel="stylesheet">

</head>
<body>
    <!--Header-->
    <header>
    <div class="container">
    <h1><a href="dashboard.php">DigiHand</a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="Data-Kategori.php">Data Kategori</a></li>
        <li><a href="Data-Product.php">Data Product</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>
    </div>
    </header>
    <!--Isi Dalam Dashboard-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Tambahkan" class="btn">
                </form>
               <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                        null,
                        '".$nama."')");
                    if($insert){
                        echo '<script>alert("Berhasil menambahkan data")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    }else{
                        echo 'gagal' .mysqli_error($conn);
                    }
                    }
                    ?>
            </div>
            
        </div>
    </div>
</body>
</html>