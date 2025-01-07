<?php
    session_start();
    include 'database.php';
    if($_SESSION['status_login'] != true){
        echo '<script>document.location="login.php"</script>';
    }
    $produk  = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_product = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kategori</title>
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
        Simpan Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value ="">--PILIH---</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY id_category DESC");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        
                         <option value ="<?php echo $r['id_category'] ?>"<?php echo ($r['id_category'] == $p->id_category)?'selected':'';?>><?php echo $r['nama_category'] ?></option>
                        <?php } ?>

                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value ="<?php echo $p->nama_product ?>" required>
                    <input type="text" name="brand" class="input-control" placeholder="Brand" value = "<?php echo $p->brand ?>" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" value = "<?php echo $p->harga_product ?>" required>
                    <img src="produk/<?php echo $p->gambar_product ?>"width="100px">
                    <input type="hidden" name="foto" value="<?php echo $p->gambar_product ?>">
                    <input type="file" name="gambar" class="input-control" >
                    <textarea class="input-control"name="deskripsi" placeholder="Deskripsi"><?php echo $p->deskripsi_product ?></textarea>
                    <select class="input-control" name="status" value = "<?php echo $p->status ?>">
                        <option value="">--Pilih---</option>
                        <option value="1"<?php echo ($p->status_product == 1)?'selected':'';?>>Tersedia</option>
                        <option value="0"<?php echo ($p->status_product == 0)?'selected':'';?>>Tidak Tersedia</option>
                    </select>
                    <input type="submit" name="submit" value="Simpan" class="btn">
                </form>
               <?php
                    if(isset($_POST['submit'])){
                        //data inputan dari form
                        $kategori = $_POST['kategori'];
                        $nama = $_POST['nama'];
                        $brand = $_POST['brand'];
                        $harga = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $status = $_POST['status'];
                        $foto = $_POST['foto'];
                        //data gambar yang baru
                        $filename =$_FILES['gambar']['name'];
                        $tmp_name =$_FILES['gambar']['tmp_name'];
                        
                        //validasi jika admin ganti gambar
                        if($filename != ''){
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
                        //menampung data format file yang diizinkan
                        $file_izin = array('jpg','jpeg','png');
                            if(!in_array($type2, $file_izin)){
                                //jika format tidak sesuai
                                echo '<script>("format gambar tidak diizinkan silahkan dilaporkan ke admin")</script>';
                            }else{
                            unlink('./produk/'.$foto);
                            move_uploaded_file($tmp_name, './produk/'.$filename);
                            $namagambar = $filename;
                            }
                        }else{
                            //jika admin tidak ganti gamnbar
                            $namagambar = $foto;
                        }
                            //query update data produk
                            $update = mysqli_query($conn, "UPDATE tb_product SET 
                                                                                id_category = '".$kategori."',
                                                                                nama_product = '".$nama."',
                                                                                brand        = '".$brand."',
                                                                                harga_product = '".$harga."',
                                                                                deskripsi_product = '".$deskripsi."',
                                                                                gambar_product = '".$namagambar."',
                                                                                status_product = '".$status."'
                                                                                WHERE id_product = '".$p->id_product."' ");
                            if($update){
                                echo '<script>alert("ubah data berhasil")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                            }else{
                                echo 'gagal'.mysqli_error($conn);
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