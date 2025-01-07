<?php
    error_reporting(0);
    include 'database.php';
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
    <h1><a href="index.php">DigiHand</a></h1>
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
    <!--- produk --->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                if($_GET['pencarian'] !='' || $_GET['kat'] != ''){
                    $where = "AND nama_product LIKE '%" .$_GET['pencarian']."%'  AND id_category LIKE '%".$_GET['kat']."%' AND harga_product LIKE '%" .$_GET['hag']."%' ";
                }
                 $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE status_product = 1 $where ORDER BY id_product DESC");
                 if(mysqli_num_rows($produk) > 0) {
                    while($p = mysqli_fetch_array($produk)){
                ?>
                <a href="detail-product.php?id=<?php echo $p['id_product'] ?>">
                <div class="kolomkategori-4">
                    <img src="produk/<?php echo $p['gambar_product'] ?>">
                    <p class="nama"><?php  echo $p['nama_product'] ?></p>
                    <p class="harga">Rp.<?php echo number_format($p['harga_product']) ?></p>
                </div>
                </a>
                <?php }}else{?>
                    <p>Produk tidak ada</p>
                    <?php } ?>
                
            </div>
        </div>
    </div>
</body>
</html>