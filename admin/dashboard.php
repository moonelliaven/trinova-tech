<?php
session_start();
include '../db.php';

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."'");
$d = mysqli_fetch_object($query);

$category = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_category");
$category_count = $category ? mysqli_fetch_assoc($category) : ['total' => 0];

$project = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_product");
$project_count = $project ? mysqli_fetch_assoc($project) : ['total' => 0];

$message = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_message");
$message_count = $message ? mysqli_fetch_assoc($message) : ['total' => 0];

$testimonial = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_testimonial");
$testimonial_count = $testimonial ? mysqli_fetch_assoc($testimonial) : ['total' => 0];

$service = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_service");
$service_count = $service ? mysqli_fetch_assoc($service) : ['total' => 0];

$user = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_service");
$user_count = $user ? mysqli_fetch_assoc($user) : ['total' => 0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard Admin</title>
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
                    <h2>Dashboard Admin</h2>
                    <p>Overview dan ringkasan informasi penting</p>
                <div class="sect-one">
                    <div class="desc-two">
                    <h3>Selamat datang, <span> <?php echo $d->nama ?> </span>!</h3>
                    <p>kelola data dengan aman dan efisien dari TriNova Tech</p>
                    <button onclick="window.location='../index.php'">Lihat Website <i class="fa-solid fa-angle-right"></i> </button>
                    </div>
                </div>
                <div class="dashboard-cards">
                    <!-- categories -->
                    <div class="card" onclick="window.location='kategori_data.php'">
                        <i class="fa-solid fa-layer-group logo" ></i>
                        <div class="desc">
                            <p>Total Category</p>
                            <h3><?= $category_count['total']; ?></h3>
                            <a href="kategori_data.php">See Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- project -->
                    <div class="card" onclick="window.location='produk_data.php'">
                        <i class="fa-regular fa-folder logo"></i>
                        <div class="desc">
                            <p>Total Project</p>
                            <h3><?= $project_count['total']; ?></h3>
                            <a href="produk_data.php">See Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- messages -->
                    <div class="card">
                        <i class="fa-solid fa-envelope logo"></i>
                        <div class="desc">
                            <p>Total Messages</p>
                            <h3><?= $message_count['total']; ?></h3>
                            <a href="">See Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- testimonial -->
                    <div class="card">
                        <i class="fa-solid fa-star logo"></i>
                        <div class="desc">
                            <p>Total Testimonials</p>
                            <h3><?= $testimonial_count['total']; ?></h3>
                            <a href="">See Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- total services -->
                    <div class="card">
                        <i class="fa-solid fa-briefcase logo"></i>
                        <div class="desc">
                            <p>Total Services</p>
                            <h3><?= $service_count['total']; ?></h3>
                            <a href="">See Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- total Customers Account -->
                    <div class="card">
                        <i class="fa-solid fa-users logo"></i>
                        <div class="desc">
                            <p>Total Users</p>
                            <h3><?= $user_count['total']; ?></h3>
                            <a href="">See Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="sect-two">
                    <div class="quick-access">
                        <h3>Quick Actions</h3>
                        <!-- per-box -->
                        <div class="box" onclick="window.location='kategori_tambah.php'">
                            <i class="fa-solid fa-layer-group logo-two"></i>
                            <div class="box-desc">
                                <h4>Add Category</h4>
                                <p>Tambah data kategori</p>
                            </div>
                            <i class="fa-solid fa-angle-right next"></i>
                        </div>
                        <!-- per-box -->
                        <div class="box" onclick="window.location='produk_tambah.php'">
                            <i class="fa-regular fa-folder logo-two"></i>
                            <div class="box-desc">
                                <h4>Add Projects</h4>
                                <p>Tambah data projek</p>
                            </div>
                            <i class="fa-solid fa-angle-right next"></i>
                        </div>
                        <!-- per-box -->
                        <div class="box" onclick="window.location='services_tambah.php'">
                            <i class="fa-solid fa-briefcase logo-two"></i>
                            <div class="box-desc">
                                <h4>Add Services</h4>
                                <p>Tambah data Service</p>
                            </div>
                            <i class="fa-solid fa-angle-right next"></i>
                        </div>
                        <!-- per-box -->
                        <div class="box" onclick="window.location='message.php'">
                            <i class="fa-solid fa-envelope logo-two"></i>
                            <div class="box-desc">
                                <h4>Reply Message</h4>
                                <p>Balas pesan terakhir</p>
                            </div>
                            <i class="fa-solid fa-angle-right next"></i>
                        </div>
                    </div>
                    <div class="quick-access">
                        <h3>Last Project Added</h3>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>