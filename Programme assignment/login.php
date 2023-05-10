<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>SuperCarWeb</title>
        <link rel="stylesheet" href="css/login.css" type="text/css">
        <link rel="icon" href="images/logo1.png">
    </head>

    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">

        function validate() {
            var email = document.getElementById("logemail");
            var password = document.getElementById("logpassword");
            var Regname = document.getElementById("Regname");
            var Regemail = document.getElementById("Regemail");
            var Regpassword = document.getElementById("Regpassword");
            var Regrepassword = document.getElementById("Regrepassword");
            var address = document.getElementById("address");

            if (email.value === "") {
                alert("Please provide your email!");
                email.focus();
                return false;
            }
            if (password.value === "") {
                alert("Please provide your password!");
                password.focus();
                return false;
            }

            if (Regname.value == "") {
                alert("Please provide your name!");
                Regname.focus();
                return false;
            }
            if (Regemail.value === "") {
                alert("Please provide your email!");
                Regemail.focus();
                return false;
            }
            if (Regpassword.value === "") {
                alert("Please provide your password!");
                Regpassword.focus();
                return false;
            }
            if (Regrepassword.value === "") {
                alert("Please provide your repassword!");
                Regrepassword.focus();
                return false;
            }
            if (address.value === "") {
                alert("Please provide your address!");
                address.focus();
                return false;
            }

            return true;
        }
    </script>

    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <img src ="images/carlogo.png" width ="125px">
                    </div>
                    <nav>
                        <ul id ="MenuItems">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="product.php">Products</a></li>                         
                            <li><a href="login.php">Account</a></li>   
                        </ul>
                    </nav>
                    <a href="login.php"><i class="fa fa-cart-arrow-down"></i></a>
                    <i class="fa fa-bars" onclick="menutoggle()"></i>
                </div>
            </div>
        </div>

        <!---------------------account Login--------------->
        <div class="account-page">
            <div class="container">
                <div class="row">
                    <div class ="col-2">
                        <img src="images/loginbg.png" width="100%">
                        <h1>Do you want to Join Us?</h1>
                    </div>

                    <div class ="col-2">
                        <div class="form-container">
                            <div class="form-btn">
                                <span onclick="login()">Login</span>
                                <span onclick="register()">Register</span>   
                                <hr id = "Indicator">
                            </div>   
                            <form id ="LoginForm" action = "login_submit.php" method="post" onsubmit="return(validate());">
                                <input type="text"  id = "logmail"name = "logemail" placeholder="Email"">
                                <input type="password" id ="logpassword "name = "logpassword" placeholder="Password">
                                <button type="submit"  name="submit"class="btn">Login</button>
                                <a href="">Forget password</a>
                            </form>

                            <form id ="RegForm" action = "Register.php" method="post" onsubmit="return(validate());">
                                <input type ="hidden" name="userid" value="<?= $userid ?>" />
                                <input type="text"   id ="Regname" name = "regname" placeholder="Name">
                                <input type="email" id ="Regemail" name = "regemail" placeholder="Email">
                                <input type="password" id ="Regpassword"  name = "password" placeholder="Password">
                                <input type="password" name="repassword" id="Regrepassword" placeholder="confirm password">
                                <input type="text" name="address" id="address" placeholder="Address" required="true">
                                <button type="submit" name ="submit"class="btn">Register</button>

                            </form>
                        </div>
                    </div>         
                </div>    
            </div>
        </div>

   

        <!--------------------footer------------>
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
        <?php
        // put your code here
        ?>


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
        <script>

            var LoginForm = document.getElementById("LoginForm");
            var RegForm = document.getElementById("RegForm");
            var Indicator = document.getElementById("Indicator");

            function register() {
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }
            function login() {
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }

        </script>

    </body>
</html>
