<?php
    session_start();
    include 'database.php';
    if($_SESSION['status_login'] != true){
        echo '<script>document.location="login.php"</script>';
    }
    $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE id_category = '".$_GET['id']."' ");
    $category = mysqli_fetch_object($kategori);
    if(mysqli_num_rows($kategori) == 0){
        echo '<script>window.location="data-kategori.php"</script>';
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
    <h1 text-align: center;><a href="dashboard.php" >DigiHand </a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="data-kategori.php">Data Kategori</a></li>
        <li><a href="data-produk.php">Data Product</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>
    </div>
    </header>
    <!--Isi Dalam Dashboard-->
    <div class="section">
        <div class="container">
            <h3>Edit Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Kategori" class="input-control" value="<?php echo $category->nama_category ?>" required>

                    <input type="submit" name="submit" value="Tambahkan" class="btn">
                </form>
               <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);

                        $update = mysqli_query($conn, "UPDATE tb_category SET nama_category = '".$nama."','".$Brand."' WHERE id_category = '".$category->id_category."' ");
                
                    if($update){
                        echo '<script>alert("Berhasil mengedit data")</script>';
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