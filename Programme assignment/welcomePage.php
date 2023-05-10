<?php
session_start();  
if(!isset($_SESSION['carts'])){
    $_SESSION['carts'] = array();
}
    ?>
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
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="icon" href="images/logo1.png">
    </head>

    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>   #MenuItems a{
                text-decoration: none;
            }</style>
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
                <div class="row">
                    <div class="col-2">
                        <h1>Choose Your favour cars<br>Right here! </h1><br/>
                        <p>Super Car Model shop is a model Car Shop. It sells different kinds of scale model car.<br>
                            This online shop allows members to order different car models online.</p>
                        <a href="" class="btn">Explore Now &#9762;</a>
                    </div>
                    <div class="col-2">
                        <img src="images/bg.jpg">
                    </div>        
                </div>
            </div>
        </div>

        <!------------------------featured categories--------------->
        <div class="cartegories">
            <div class="small-container">
                <div class ="row">
                    <div class="col-3">
                        <img src="images/car1.jpg">
                    </div>
                    <div class="col-3">
                        <img src="images/car2.jpg">
                    </div>
                    <div class="col-3">
                        <img src="images/car5.jpg">
                    </div>
                </div>
            </div>  
        </div>

        <!------------------------featured products--------------->
        <div class = "small-container">
            <h2 class="title">Featured Products</h2>
            <div class="row">
                
                <div class="col-4">
                    <img src ="images/car6.webp">
                    <h4>asdasdas</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>
                    <p>$90.00</p>
                </div>
                <div class="col-4">
                    <img src ="images/car9.jpg">
                    <h4>asdasdas</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$70.00</p>
                </div>
                <div class="col-4">
                    <img src ="images/car8.jpg">
                    <h4>asdasdas</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p>$80.00</p>
                </div>
            </div>
            <h2 class="title">Lastest Products</h2>
            <div class="row">
                <div class="col-4">
                    <img src ="images/car13.jpg">
                    <h4>asdasdas</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-4">
                    <img src ="images/car12.jpg">
                    <h4>asdasdas</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>
                    <p>$90.00</p>
                </div>
                <div class="col-4">
                    <img src ="images/car10.jpg">
                    <h4>asdasdas</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$70.00</p>
                </div>

                <div class="row">
                    <div class="col-4">
                        <img src ="images/car15.jpg">
                        <h4>asdasdas</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>$50.00</p>
                    </div>
                    <div class="col-4">
                        <img src ="images/car16.jpg">
                        <h4>asdasdas</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                        <p>$90.00</p>
                    </div>
                  
                    <div class="col-4">
                        <img src ="images/car11.jpg">
                        <h4>asdasdas</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <p>$80.00</p>
                    </div>
                </div>
            </div>
        </div>

        <!------------------------featured products--------------->
        <div class = "offer">
            <div class="small-container">
                <div class ="row">
                    <div class="col-2">
                        <img src="images/car17.jpg" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Exclusively Avilable on SuperCar</p>
                        <h1>Car Name </h1>
                        <small>The newly designed battery pack and constant temperature system make charging faster,<br>
                            providing stronger power and durability in all situations.
                        </small><br>
                        <a href ="" class="btn">Buy Now &#9762;</a>
                    </div>
                </div> 
            </div>
        </div>

        <!--------------comment------------------------->
        <div class ="comment">
            <div class="small-container">
                <div class ="row">
                    <div class="col-3">
                        <i class="fa fa-user-circle-o"></i>
                        <p>This website is really good, there are varios cars to choose</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <img src="images/face1.jpg">
                        <h3>Sean Parker </h3>

                    </div>
                    <div class="col-3">
                        <i class="fa fa-user-circle-o"></i>
                        <p>Great website! i will share to my friend who are interested in model car.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <img src="images/face2.jpg">
                        <h3>Mary Chan</h3>

                    </div>
                    <div class="col-3">
                        <i class="fa fa-user-circle-o"></i>
                        <p>There are many type of model car to choose, well done due!</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                        <img src="images/face3.jpg">
                        <h3>Peter Cheung</h3>          
                    </div>
                </div>
            </div>
        </div>

        <!--------------car brands----------------->
        <div clss ="brands">
            <div class="small-container">
                <div class ="row">
                    <div class="col-7">
                        <img src="images/brand1.png">
                    </div>
                    <div class="col-7">
                        <img src="images/brand7.png">
                    </div>
                    <div class="col-7">
                        <img src="images/brand2.png">
                    </div>
                    <div class="col-7">
                        <img src="images/brand3.png">
                    </div>
                    <div class="col-7">
                        <img src="images/brand4.png">
                    </div>
                    <div class="col-7">
                        <img src="images/brand5.png">
                    </div>
                    <div class="col-7">
                        <img src="images/brand6.png">
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
            
            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px"){
                    MenuItems.style.maxHeight = "200px";
                }else{
                    MenuItems.style.maxHeight = "0px";
                }
            }
            
        </script>
    </body>
</html>
