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
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value ="">--PILIH---</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY id_category DESC");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        
                         <option value ="<?php echo $r['id_category'] ?>"><?php echo $r['nama_category'] ?></option>
                        <?php } ?>

                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="brand" class="input-control" placeholder="Brand" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea class="input-control"name="deskripsi" placeholder="Deskripsi" style="margin-bottom:10px;"></textarea>
                    <select class="input-control" name="status">
                        <option value="">--Pilih---</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                    <input type="submit" name="submit" value="Tambahkan" class="btn">
                </form>
               <?php
                    if(isset($_POST['submit'])){
                        //print_r($_FILES['gambar']);
                        //menampung inputan dari form
                        $kategori = $_POST['kategori'];
                        $nama = $_POST['nama'];
                        $brand = $_POST['brand'];
                        $harga = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $status = $_POST['status'];
                        //menampung data file yang diupload
                        $filename =$_FILES['gambar']['name'];
                        $tmp_name =$_FILES['gambar']['tmp_name'];
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
                        
                        //menampung data format file yang diizinkan
                        $file_izin = array('jpg','jpeg','png');
                        //validasi format file
                        if(!in_array($type2, $file_izin)){
                            //jika format tidak sesuai
                            echo '<script>("format gambar tidak diizinkan silahkan dilaporkan ke admin")</script>';
                        }else{
                            //jika format sesuai
                            //proses upload file sekaligus insert ke database
                            move_uploaded_file($tmp_name, './produk/'.$filename);

                            $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES(
                                        null,
                                        '".$kategori."','".$nama."','".$brand."','".$harga."','".$deskripsi."','".$filename."','".$status."',null)");
                            if($insert){
                                echo '<script>alert("simpan data berhasil")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                            }else{
                                echo 'gagal'.mysqli_error($conn);
                            }
                        }
                    
                    }
                    ?>
            </div>
            
        </div>
    </div>
    <textarea name="editor1"></textarea>
                <script>
                        CKEDITOR.replace( 'deskripsi' );
                </script>
</body>
</html>