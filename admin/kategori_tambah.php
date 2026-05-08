<?php include ('session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Warung X RPL | Kategori Tambah</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>

        <div class="sidebar">
            <div class="sidebar-title"><b>Nusa Voyager Company</b></div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>

        <div class="section">
            <div class="container">
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."' ");
                    $d = mysqli_fetch_object($query);
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Tambah Data Kategori</h3>
                    <fieldset>
                        <label>Nama Kategori</label>
                        <input type="text" name="nama" placeholder="Nama Kategori" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Gambar Kategori</label>
                        <input type="file" name="category_image" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Tambah</button>
                    </fieldset>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $nama = $_POST['nama'];
                    
                    $filename = $_FILES['category_image']['name'];
                    $tmp_name = $_FILES['category_image']['tmp_name'];
                    $type2 = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    if(in_array($type2, $tipe_diizinkan)){
                        move_uploaded_file($tmp_name, '../category/'.$filename);
                        
                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES('', '$nama', '$filename')");
                        
                        if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="kategori_data.php"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }
                    } else {
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>