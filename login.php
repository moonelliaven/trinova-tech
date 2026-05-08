<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body id="bg-login">
    <div class="box-login">
        <form action="" method="POST">
            <h2>Login</h2>
            <input type="text" name="user" placeholder="Username" class="input-control" required>
            <input type="password" name="pass" placeholder="Password" class="input-control" required>
            <input type="submit" name="submit" value="Login" class="btn">
            <label>Belum Punya Akun? <a href="register.php">Klik di sini untuk Mendaftar</a></label>
        </form>

        <?php
        include('db.php');
        if (isset($_POST['submit'])) {
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $sql = mysqli_query($conn, "SELECT * FROM tb_admin 
            WHERE username = '$username' AND password = '$password'")
            or die(mysqli_error($conn));

            if (mysqli_num_rows($sql) == 0) {
                echo "<script>alert('Username / Password Salah')</script>";
                echo '<script type="text/javascript">window.location="login.php";</script>';
            } else {
                session_start();

                $row = mysqli_fetch_assoc($sql);
                $_SESSION['id_login'] = $row['admin_id'];
                $_SESSION['level'] = $row['level'];
                $_SESSION['status_login'] = true;

                if ($row['level'] == 'admin') {
                    echo "<script>alert('Login Berhasil')</script>";
                    echo '<script type="text/javascript">window.location="admin/dashboard.php";</script>';

                } elseif ($row['level'] == 'pelanggan') {
                    echo "<script>alert('Login Berhasil')</script>";
                    echo '<script type="text/javascript">window.location="user/dashboard.php";</script>';
                } else {
                    header('location:index.php');
                }
            }
        }
        ?>
    </div>
    
</body>
</html>
