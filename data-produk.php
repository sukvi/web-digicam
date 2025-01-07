<?php
    include 'database.php';
    session_start();
    if(!isset($_SESSION['status_login'])){
        echo '<script>document.location="login.php"</script>';
    }
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
    <h1><a href="dashboard.php">DigiHand</a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="data-kategori.php">Data Kategori</a></li>
        <li><a href="data-Produk.php">Data Product</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>
    </div>
    </header>
    <!--Isi Dalam Dashboard-->
    <div class="section">
        <div class="container">
            <h3>Data Produk</h3>
            <div class="box">
                <p><a href="tambah-produk.php">Tambah data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>brand</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (id_category) ORDER BY id_product DESC");
                        while($row = mysqli_fetch_array($produk)){

                        ?>
                        <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_category'] ?></td>
                        <td><?php echo $row['nama_product'] ?></td>
                        <td><?php echo $row['brand'] ?></td>
                        <td>Rp.<?php echo number_format($row['harga_product']) ?></td>
                        <td><?php echo $row['deskripsi_product'] ?></td>
                        <td><a href="produk/<?php echo $row['gambar_product'] ?>"target ="_blank"><img src="produk/<?php echo $row['gambar_product'] ?>" width="50px"></a></td>
                        <td><?php echo ($row['status_product'] == 0)? 'Tidak Tersedia':'Tersedia'; ?></td>
                        <td><a href="edit-produk.php?id=<?php echo $row['id_product'] ?>">ubah || <a href="hapus.data.php?idp=<?php echo $row['id_product'] ?>" onclick="return confirm('Apakah Anda Sudah Yakin Menghapus data?')">hapus</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>