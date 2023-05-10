<?php
require 'db.php';
session_start();
if(!isset($_SESSION['carts'])){
    $_SESSION['carts'] = array();
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
                                     <?php
              if (isset($_SESSION['carts'])) {
      echo '<a class= "notification" href="shoppingCart.php"><i class="fa fa-cart-arrow-down"><span class="badge bg-primary rounded-pill" style="padding:1px 5px" >'.  count($_SESSION['carts']) .'</span></i></a>';
    }else{
         echo  '<a class= "notification" href="shoppingCart.php"><i class="fa fa-cart-arrow-down"><span class="badge bg-primary rounded-pill" style="padding:1px 5px" >0</span></i></a>';
    }?>
                    <i class="fa fa-bars" onclick="menutoggle()"></i>
                </div>
            </div>
        </div>


    </body>
</html>
