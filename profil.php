<?php
    session_start();
    include 'database.php';
    if($_SESSION['status_login'] != true){
        echo '<script>document.location="login.php"</script>';
    }
    $query = mysqli_query($conn, "SELECT *FROM tb_admin WHERE id_admin = '".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query);
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
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control"  value="<?php echo $d -> nama_admin ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d -> username ?>"  required>
                    <input type="text" name="hp" placeholder="No Handphone" class="input-control" value="<?php echo $d -> telp_admin ?>" required>
                    <input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $d -> email_admin ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d -> address_admin ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = $_POST ['nama'];
                        $user = $_POST ['user'];
                        $hp = $_POST ['hp'];
                        $email = $_POST ['email'];
                        $alamat = $_POST ['alamat'];

                        $update = mysqli_query($conn, "UPDATE tb_admin SET
                         nama_admin = '".$nama. "',
                         username = '".$user. "',
                         telp_admin = '".$hp. "',
                         email_admin = '".$email."',
                         address_admin= '".$alamat."'
                         WHERE id_admin = '".$d->id_admin."'");
                    
                    if($update){
                        echo '<script>alert("Ubah Data Berhasil!!")</script>';
                        echo '<script>window.location="profil.php"</script>';
                        echo 'berhasil';
                    }else{
                        echo 'gagal'.mysqli_error($conn);
                    }
                }
                ?>
            </div>
            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass0" placeholder="Password baru" class="input-control"required>
                    <input type="password" name="pass1" placeholder="Konfirmasi Password" class="input-control"required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php
                    if(isset($_POST['ubah_password'])){
                        $pass0 = $_POST ['pass0'];
                        $pass1 = $_POST ['pass1'];
                        if($pass1 != $pass0){
                            echo '<script>alert("Konfirmasi Password tidak sama dengan Password Baru")</script>';
                        }else{
                            $u_pass = mysqli_query($conn, "UPDATE tb_admin SET
                            password = '".MD5($pass0). "'
                            WHERE id_admin = '".$d->id_admin."'");
                        if($u_pass){
                        echo '<script>alert("Ubah Data Berhasil!!")</script>';
                        echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }
                        }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>