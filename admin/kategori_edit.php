<?php
session_start();
include '../db.php';

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."'");
$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Warung X RPL | Kategori Edit</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="part">
                <i class="fa-solid fa-bars"></i>
                <h3>Dashboard</h3>
            </div>
            <div class="part" onclick="window.location='profile.php'">
                <div class="profile-img"><i class="fa-regular fa-circle-user"></i></div>
                <div class="prof-desc">
                    <h3><?php echo $d->nama ?></h3>
                    <p><?php echo $d->level ?></p>
                </div>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </header>

        <div class="sidebar">
            <div class="sidebar-title">
                <img src="../img/logo-text-white.png" alt="">
            </div>
            <ul>
                <?php include 'sidebar.php'; ?>
            </ul>
        </div>

        <div class="section">
            <div class="container">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
                    if(mysqli_num_rows($kategori) == 0){
                        echo '<script>window.location="admin/kategori_data.php"</script>';
                    }
                    $k = mysqli_fetch_object($kategori);
                ?>
                <form action="" method="POST">
                    <h3>Edit Data Kategori</h3>
                    <fieldset>
                        <label>Nama Kategori</label>
                        <input type="text" name="nama" value="<?php echo $k->category_name ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Gambar Kategori</label>
                        <input type="hidden" name="foto" value="<?php echo $k->category_image ?>">
                        <input type="file" name="category_image" placeholder="Pilih Gambar" class="form-control">
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Edit</button>
                    </fieldset>
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        $foto = $_POST['foto'];
                        $update = mysqli_query($conn, "UPDATE tb_category SET category_name = '".$nama."' WHERE category_id = '".$k->category_id."' ");

                        // data gambar yang abru
                        $filename = $_FILES['category_image']['name'];
                        $tmp_name = $_FILES['category_image']['tmp_name'];

                        // jika admin ganti gambar
                        if($filename != ''){
                            $type2 = explode('.', $filename);
                            $type2 = $type2[count($type2)-1];

                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                             // validasi data dan upload 
                            if(in_array($type2, $tipe_diizinkan)){
                                unlink('../category/'.$k->category_image);
                                move_uploaded_file($tmp_name, '../produk/'.$filename);
                                echo '<script>alert("File berhasil diupload")</script>';
                                $foto = $filename;
                            } else {
                                echo '<script>alert("Format file tidak diizinkan")</script>';
                            }
                        } else {
                            $foto = $k->category_image;
                        }

                        if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                            echo '<script>window.location="kategori_data.php"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>