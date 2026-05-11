<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <!-- header -->
    <div class="header">
        <div class="logo">
            <img src="img/logo-text-white.png" alt="Logo" style="width: 160px;">
        </div>
        <ul class="navbar">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">Products</a></li>
            <li><a href="">Our Team</a></li>
            <li><a href="">Contact</a></li>
        </ul>
        <button onclick="window.location.href='login.php'">Login <i class="fa-regular fa-user"></i></button>
    </div>

    <!-- banner -->
    <div class="banner">
        <div class="content">
            <h5 style="color: var(--blue-primary); font-weight: 500;">INOVATION YOUR DIGITAL FUTURE</h5>
            <h1 style="color: var(--white); font-weight: 500; font-size: 4  0px;">Smart Solution, <br> For a Better Tomorrow</h1>
            <p style="color: var(--white);  display: flex; font-size: 18px;">TriNova Tech hadir sebagai solusi digital inovatif untuk membantu bisnis dan individu berkembang di era teknologi </p>
        </div>
        <div class="empty">2</div>
    </div>

    <!-- navigation bar -->
    <div class="navbar-list">
        <div class="sect-two">
            <input type="text" placeholder="Search Product"><img src="img/logo/search.png" alt="">
        </div>
    </div>

    <!-- container -->
    <div class="container">
        <h5 style="color: var(--blue-primary); font-weight: 500; text-align: center;">OUR PROJECT CATEGORIES</h5>
        <h1 style="color: var(--dark-blue); font-weight: 500; font-size: 25 px; text-align: center;">Berbagai macam proyek yang kami telah lakukan</h1>
        <p style="color: var(--dark-blue);  display: flex; font-size: 14px; text-align: center;">Kami menyediakan berbagai produk digital unggulan yang telah terbukti <br>
        membantu perusahaan meningkatkan efisiensi dan pertumbuhan. </p>

        <?php
            $query = mysqli_query($conn, "SELECT * FROM tb_category");
        ?>
        <!-- categories -->
        <div class="categories-list">
             <div class="categories" data-category="all">
                <p><i class="fa-solid fa-list"></i>All</p>
            </div>
            <?php while($row = mysqli_fetch_assoc($query)) { ?>
            <!-- categories -->
                <div class="categories" data-category="<?php echo $row['category_name']; ?>">
                    <img src="category/<?php echo $row['category_image'] ?>" alt="" class="category-img">
                    <p><?php echo $row['category_name'] ?></p>
                </div>
            <?php } ?>
        </div>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM tb_product
            JOIN tb_category 
            ON tb_product.category_id = tb_category.category_id");
        ?>
        <!-- project list -->
        <div class="projects-list">
            <?php while($row = mysqli_fetch_assoc($query)) { ?>
                
                <div class="project" data-product="<?php echo $row['category_name']; ?>">
                    <img src="produk/<?php echo $row['product_image']; ?>" alt="" class="product-img">

                    <div class="desc">
                        <h3 class="categories-name">
                            <?php echo $row['category_name']; ?>
                        </h3>

                        <h1 class="project-name">
                            <?php echo $row['product_name']; ?>
                        </h1>

                        <p class="project-desc">
                            <?php echo $row['product_description']; ?>
                        </p>

                        <div class="link">
                            <a href="">Learn More</a>
                            <i class="fa-solid fa-arrow-right" 
                            style="color: var(--blue-primary);"></i>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

     <!-- footer -->
    <div class="footer">
        <div class="content-footer">
            <div class="frame-one">
                <img src="img/logo-text-white.png" alt="" style="width: 200px;">
                <p>TriNova Tech adalah mitra teknologi terpecaya untuk membantu bisnis tumbuh dan berenovasi di era digital</p>
                <div class="logomeds">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </div>
            <div class="frame-list">
                <div class="list">
                    <h4>Quick Links</h4>
                    <div class="list-menu">
                        <a href="">Home</a>
                        <a href="">About</a>
                        <a href="">Services</a>
                        <a href="">Products</a>
                        <a href="">Our Team</a>
                        <a href="">Contact</a>
                    </div>
                </div>
                <div class="list">
                    <h4>Our Services</h4>
                    <div class="list-menu">
                        <a href="">Mobile App Developement</a>
                        <a href="">Software Developement</a>
                        <a href="">Cloud Solution</a>
                        <a href="">Products</a>
                        <a href="">IT Security</a>
                    </div>
                </div>
                <div class="list">
                    <h4>Contact Us</h4>
                    <div class="list-menu">
                        <a href=""><i class="fa-solid fa-location-dot"></i>jl. Panglima Batur</a>
                        <a href=""><i class="fa-solid fa-phone"></i>+62 821 5889 1284</a>
                        <a href=""><i class="fa-solid fa-envelope"></i>info@trinovatech.com</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="new">
            <div class="oneo">
                <p style="color: white;">© 2026 TriNova Tech. All Right reserved. </p>
            </div>
            <div class="twot">
                <p style="color: white;">Privacy Policy</p>
                <p style="color: white;">Terms of Services</p>
            </div>
        </div>
    </div>
        <script>
        const categories = document.querySelectorAll('.categories');
        const projects = document.querySelectorAll('.project');

        categories.forEach(category => {
            category.addEventListener('click', () => {
                const selectedCategory = category.dataset.category;

                projects.forEach(project => {
                    if(selectedCategory === 'all' || project.dataset.product === selectedCategory){
                        project.style.display = 'block';
                    } else {
                        project.style.display = 'none';
                    }
                });
            });
        });
        </script>
</body>
</html>