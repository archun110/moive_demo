<?php
require 'db.php';
session_start();
?><?php
if (isset($_POST["action"]) && !empty($_POST["action"])) {

    if (!isset($_SESSION['carts'])) {
        $_SESSION['carts'] = array();
    } $action = $_POST["action"];
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>SuperCarWeb</title>
        <link rel="icon" href="images/logo1.png">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
        <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/login.css" type="text/css">
        <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
        <meta name="theme-color" content="#7952b3">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }           
            #MenuItems a{
                text-decoration: none;
            }







        </style>
        <!-- Custom styles for this template -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body class="bg-light">
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
        <!------------------------------------------>

        <div class="container">
            <main>
                <div class="py-5">

                    <h2>Checkout form</h2>
                </div>
                <?php
                $Total = 0;
                if (isset($_SESSION['carts']) && !empty($_SESSION['carts'])) {
                    $carts = $_SESSION['carts'];
                    echo'<div class="row g-5">';
                    echo'<div class="col-md-5 col-lg-4 order-md-last">';
                    echo'<h4 class="d-flex justify-content-between align-items-center mb-3">';
                    echo'<span class="text-primary">Your cart</span>';
                    echo'<span class="badge bg-primary rounded-pill">' . count($_SESSION['carts']) . "</span>";
                    echo '</h4>';

                    foreach ($carts as $id => $quantity) {

                        $subtotal = $_SESSION['price'][$id] * $quantity;
                        $Total = $Total + $_SESSION['price'][$id] * $quantity;


                        echo '<ul class="list-group mb-3">';
                        echo ' <li class="list-group-item d-flex justify-content-between lh-sm">';
                        echo '<div>';
                        echo'<h6 class = "my-0">Product name</h6>';
                        echo'<pre><small class = "text-muted">' . $_SESSION['name'][$id] . " x " . $quantity . "     =    " . $subtotal . "</small></pre>";
                        echo '</div>';
                        echo'</li>';
                    }
                }
                echo' <li class = "list-group-item d-flex justify-content-between">';
                echo '<span>Total (Ponts)</span>';
                echo "<strong>$Total</strong>";
                echo '</li>';
                echo'</ul>';
                echo'</div>';
                ?>    
                <div class="col-md-7 col-lg-8">

                    <form class="needs-validation" method="post" action="paymentHandler.php">
                        <div class="row g-3">

                            <div class="col-12">
                                <label for="username" class="form-label">UserID</label>
                                <div class="input-group has-validation">

                                    <input type="text" class="form-control" id="username" placeholder="UserID" required>
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                <input type="email" class="form-control" id="email" placeholder="E-mail">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" placeholder="Your password" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                        </div>


                        <hr class="my-4">

                        <h4 class="mb-3">Delivery Way</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                                <label class="form-check-label" for="credit">Self-pickup</label>
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">Your Address</label>
                                <input type="address" class="form-control" id="address" placeholder="Your address" required>
                            </div>
                            <br>
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                                <label class="form-check-label" for="debit">Delivery</label>
                            </div>

                        </div>
                        <div class="row gy-3">
                            <div class="col-md-12">
                                <label for="cc-name" class="form-label">Pick Up Place</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Choose the Location</option>
                                    <option value="1">Tsing Yi</option>
                                    <option value="2">Tuen Mun</option>
                                    <option value="3">Chai Wan</option>
                                    <option value="3">Tseung Kwan O</option>
                                </select>
                                <br>
                                <div class="col-md-12">
                                    <label for="password" class="form-label">Pick Up Date</label>
                                    <input type="date" class="form-control" id="password" placeholder="Your password" required>
                                </div>
                                <small class="text-muted">If you are pick up by your self (please select the place)</small>                                 
                            </div>       
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">PAY</button>
                    </form>
                </div>
        </div>
    </main>
</div>
<br>
<br>
<br>
<!------------------------------------->
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