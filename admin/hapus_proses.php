<?php
include '../db.php';

// hapus produk
if(isset($_GET['idp'])){
    $idp = $_GET['idp'];
    mysqli_query($conn, "DELETE FROM tb_product WHERE product_id='$idp'");
    header("location:produk_data.php");
}

// hapus kategori
else if(isset($_GET['idk'])){
    $idk = $_GET['idk'];
    mysqli_query($conn, "DELETE FROM tb_category WHERE category_id='$idk'");
    header("location:kategori_data.php");
}

?>