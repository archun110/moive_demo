<?php
require 'db.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>SuperCarWeb</title>
        <link rel="stylesheet" href="css/login.css" type="text/css">
        <link rel="icon" href="images/logo1.png">
        <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>


    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="adminPage.php"><img src ="images/carlogo.png" width ="125px"></a>
                    </div>
                    <nav>
                        <ul id ="MenuItems">
                            <li><a href="adminPage.php">Home</a></li>
                            <li><a href="adminProducts.php">EditProduct</a></li>
                            <li><a href="adminOrderList.php">Order List</a></li>
                            <li><a href="customerList.php">Customer Info</a></li>
                            <li><a href="adminMyAccount.php">MyAccount</a></li>
                            <li><a href="logout.php">logout</a></li>
                        </ul>
                    </nav>

                    <i class="fa fa-bars" onclick="menutoggle()"></i>
                </div>
            </div>
        </div>

        <!------------------------------------------------>

        <div class="cartegories">
            <div class ="small-container">
                <a href="admin_addproduct.php"><h2 class="title">Add Product</h2></a>
                <div class="row">

                    <?php
                    $query = "SELECT * FROM itemlist ORDER BY item_ID ASC";
                    $result = mysqli_query($conn, $query);

                    if ($result == false) { // Check if the query can be successfully execute
                        die("The query could not be executed!<br>\n" . mysqli_error($conn));
                    }

                    foreach ($result as $row) {
                        extract($row);

                        echo "<div class=" . 'col-4' . ">";
                        echo "<img src=" . $Item_image . ">";
                        echo "<h4>$item_name</h4>";
                        echo"<h3>$item_category</h3>"
                        ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h3><?= $item_price ?> Point</h3>
                        <h3><?= $item_status ?> Piece in Store</h3>               
                        <?php
                        echo "<a href=\"adminEditProduct.php?custid=" . $item_ID . "\">Edit</a> ";
                        echo "<a href=\"deleteProduct.php?custid=" . $item_ID . "\">Delete</a> ";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>


        <!------------------footor----------------------->
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

    </body>
</html>