<?php
include('db.php');
session_start();
$email = $_SESSION['email'];
if (isset($_POST['update'])) {
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($newpassword === $confirmpassword) {
        $query = "SELECT password FROM account WHERE email = '" . $email . "'and password= '" . $password . "'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if (!$result) {
            die("Database access failed : " . mysqli_error($conn));
        }
        if ($password === $row['password']) {
            $sql = "UPDATE account set password= '" . $newpassword . "' where email  ='" . $email . "' ";
            $res = mysqli_query($conn, $sql);
            if (!$res) {
                die("Database access failed : " . mysqli_error($conn));
            }
            header('location: welcomePage.php');
        } else {
            echo "<script>";
            echo 'window.alert("Your password is wrong")';
            echo"</script";
        }
    } else {
        echo "<script>";
        echo 'window.alert("Your password is wrong")';
        echo"</script";
    }
}
?> 


<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>SuperCarWeb</title>
        <link rel="stylesheet" href="css/login.css" type="text/css">
        <link rel="icon" href="images/logo1.png">
        <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            #MenuItems a{
                text-decoration: none;
            }
            .container{
                margin-bottom: 100px;
            }
        </style>
    </head>


    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="welcomePage.php"><img src ="images/carlogo.png" width ="125px"></a>
                    </div>
                    <nav>
                        <ul id ="MenuItems">
                            <li><a href="welcomePage.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="userAccount.php">MyAccount</a></li>
                            <li><a href="logout.php">logout</a></li>
                        </ul>
                    </nav>
                    <a class= "notification" href="shoppingCart.php"> <i class="fa fa-cart-arrow-down"><span class="badge bg-primary rounded-pill" style="padding:1px 5px" ><?= count($_SESSION['carts']) ?></span></i></a>
                    <i class="fa fa-bars" onclick="menutoggle()"></i>
                </div>
            </div>
        </div>

        <!------------------------------------------------>
        <div class="container">
            <div class="row">
                <h1>Update Password</h1>
               
            </div>
            <div class="row">
                <div class="col-12 col-md-6">



                    <form name="chngpwd" method="post" >

                        <div class="">
                            <br>
                            <br>
                        </div>
                        <div class="">
                            <label class="">Current Password</label>
                            <input class="" id="password" name="password"  type="password" required>
                        </div>
                        <div cl
                             <div class="">
                            <label class="">Password</label>
                            <input class="" id="newpassword" type="password" name="newpassword" required>
                        </div>
                        <div class="">
                            <label class="">Confirm Password</label>
                            <input class="" id="confirmpassword" type="password" name="confirmpassword"  required>
                        </div>

                        <div class="">
                            <input type="submit" value="Update" name="update" id="submit" class="btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-------------------------------------->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Download Our App</h3>
                        <p>Download App for Android and ios mobile phone.</p>
                        <div class="app-logo">
                            <img src="images/play-store.png">
                            <img src="images/apple-store.png">
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <img src="images/logo2.PNG" >
                        <p>Our purpose is to sustainably make the surprise to people who are interested in collecting model cars and  benefits to the many.</p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Useful Links</h3>
                        <ul>
                            <li>Coupons</li>
                            <li>Blog Post</li>
                            <li>Return Policy</li>
                            <li>Join Affiliate</li>
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow us</h3>
                        <ul>
                            <li>Facebook <i class="fa fa-facebook-official"></i></li>
                            <li>Twitter <i class="fa fa-twitter-square"></i></li>
                            <li>Instagram <i class="fa fa-instagram"></i></li>
                            <li>YouTube <i class="fa fa-youtube-play"></i></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class ="copyright">copyright 2021 - ITP4922</p>
            </div>
        </div>



        <!------------js for toggle menu------------>
        <script>
            var MenuItems = document.getElementById("MenuItems");
            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                } else {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
        <!------------js for toggle menu------------>

    </body>
</html>
