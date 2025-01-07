<?php
    error_reporting(0);
    include 'database.php';
    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_product = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand&display=swap" rel="stylesheet">

</head>
<body>
    <!--Header-->
    <header>
    <div class="container">
    <h1><a href="index.php" style="text-decoration:none;">DigiHand</a></h1>
    <ul>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
    </div>
    </header>
    <!--- Pencarian --->
    <div class="pencarian">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="pencarian" placeholder="Cari Produk" value ="<?php echo $_GET['pencarian'] ?>" >
                <input type="hidden" name="kat" value="<?php echo $_GET[''] ?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>
    <!-- detail produk -->
    <div class="section">
        <div class="container">
            <h2>Detail Produk</h2>
            <div class="box">
            <div class="col-2">
                <img src="produk/<?php echo $p->gambar_product ?>" width = "100%">
            </div>
            <div class="col-2">
                <h1><?php echo $p -> nama_product ?></h2>
                <h2>Rp. <?php echo number_format($p -> harga_product) ?></h2>
                <p>Deskripsi : <br>
                 <?php echo $p -> deskripsi_product ?>
            </p>
            <p>Jika Berminat Silahkan Di Pilih Via :</p>
            <a  href="https://shp.ee/u2mg7b9" style="text-decoration:none;">
                <img src="img/shoope.png" width = "10%">
            </a>
            <a  href="https://www.tokopedia.com/camerabaik">
                <img src="img/tokopedia.png" width = "9%">
            </a>
            </div>
            </div>
        </div>
    </div>
</body>
</html>