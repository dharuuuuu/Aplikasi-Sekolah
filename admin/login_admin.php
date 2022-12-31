<!-- Koneksi database -->
<?php 
 session_start();
include '../config/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/login_admin.css">
    <link rel="stylesheet" href="assets/close.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>LOGIN ADMIN</title>
</head>
<body>
    <a href="../index.php">
        <div class="close-container">
            <div class="leftright"></div>
            <div class="rightleft"></div>
        </div>
    </a>

    <main class="login">
        <article class="login_container" style="height: 550px;">
            <section class="login_img">
                <img src="assets/admin.jpg" alt="user login"/>
            </section> 

            <section class="login_forms">
                <form class="login_register" method="POST"> 
                   <h1 class="login_title">Sign In</h1>

                   <section class="login_box">
                    <i class='bx bx-user login_icon'></i>
                    <input type="text" placeholder="Username"  name="USERNAME" class="login_input">
                   </section> 

                   <section class="login_box">
                        <i class='bx bx-lock login_icon'></i>
                        <input type="password" id="password" placeholder="Password" name="PASSWORD" class="login_input"></input>
                   </section>
                   <input type="checkbox" onclick="eyeFun()" class="eye" id=eye ></input>
                   <label for="eye"> Show Password</label>

                   <center>
                       <input type="submit" class="login_button" value="Sign In" name="proseslog">
                   </center>
                    
                    <!-- proses login -->
                    <?php
                    if(isset($_POST['proseslog'])){
                        $sql = mysqli_query($mysqli, "select * from admin where USERNAME = '$_POST[USERNAME]' and PASSWORD = '$_POST[PASSWORD]'");

                        $cek = mysqli_num_rows($sql);
                        if ($cek > 0) {
                            $_SESSION['PASSWORD'] = $_POST['PASSWORD'];
                            echo "<meta http-equiv=refresh content=0;URL='dashboard_admin.php'>";
                        }else{
                            echo "<p>Username atau Password Salah!</p>";
                            echo "<meta http-equiv=refresh content=2;URL='login_admin.php'>";
                        }
                    }
                    ?>
                </form>
            </section>
        </article>  
    </main>

    <script>
        function eyeFun() {
            var x = document.body;
            var y = document.getElementById("password");
            var z = document.getElementById("eye");
            if (y.type === "password") {
                y.type = "text"; 
            } else {
                y.type = "password"; 
            }
        }
    </script>
</body>
</html>