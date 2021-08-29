<?php
session_start();
require 'control/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="asset/css/style.css" />
    <title>TIRTA Monitoring</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="post" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <?php if(isset($_GET['error']) == 'yes'){ ?>
                    <div class="alert-danger">Username / password Salah !</div>
                    <?php } ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="user" placeholder="Masukan Username" required="required" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pass" placeholder="Masukan Password" required="required" />
                    </div>
                    <input type="submit" value="Login" name="login" class="btn solid" />
                </form>
                <form action="" method="post" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name-signup" placeholder="Full Name" required="required" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="user-signup" placeholder="Username" required="required" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pass-signup" placeholder="Password" required="required" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pass-konfirmasi" placeholder="Konfirmasi Password" required="required" />
                    </div>
                    <input type="submit" value="Sign up" name="signup" class="btn" />
                </form>
            </div>
        </div>

        <?php
        if(isset($_POST['login'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $data_user = mysqli_query($conn, "SELECT * FROM tbl_user WHERE usernameUser = '$user' AND passwordUser = '$pass'");
            $r         = mysqli_num_rows($data_user);
            if($r > 0){
                header("location: views/pagedashboard.php");
            }else{
                header("location: index.php?error=yes");
            }
        }
        ?>

        <?php
        if(isset($_POST['signup'])){
            $name = mysqli_real_escape_string($conn, trim($_POST['name-signup']));        
            $username = mysqli_real_escape_string($conn, trim($_POST['user-signup']));
            $password = mysqli_real_escape_string($conn, trim($_POST['pass-signup']));
            $konfirmasi = mysqli_real_escape_string($conn, trim($_POST['pass-konfirmasi']));   
            if($password == $konfirmasi){
                mysqli_query($conn, "INSERT INTO tbl_user(nameUser, usernameUser, passwordUser) VALUES ('$name', '$username', '$password')");
                header("Location: index.php");
            }else{
                header("location: index.php?error=yes");
            }
        }
        ?>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Belum Memiliki Akun ?</h3>
                    <p>
                        Website ranah instansi, gunakan username yang diberikan untuk mendaftar.
                        viva la hydra!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="views/img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah Memiliki Akun ?</h3>
                    <p>
                        Website ranah instansi, gunakan akun dengan username yang telah terdaftar.
                        viva la hydra!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="views/img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="asset/js/js_login.js"></script>
</body>

</html>