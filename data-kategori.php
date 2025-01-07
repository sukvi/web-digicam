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
        <li><a href="data-produk.php">Data Product</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>
    </div>
    </header>
    <!--Isi Dalam Dashboard-->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <p><a href="tambah.data.php">Tambah data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th width="1000px">Kategori</th>
                            <th width="1000px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $Kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY id_category DESC");
                        while($row = mysqli_fetch_array($Kategori)){

                        ?>
                        <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_category'] ?></td>
                        <td><a href="edit.data-kategori.php?id=<?php echo $row['id_category'] ?>">ubah || <a href="hapus.data.php?idk=<?php echo $row['id_category'] ?>" onclick="return confirm('Apakah Anda Sudah Yakin Menghapus data?')">hapus</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>