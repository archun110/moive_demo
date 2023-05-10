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
        <style>
            h1{
                text-align: center;
                padding:10px;
            }
            form{
                margin: 20px;
            }
        </style>


        <?php
        $id = $_GET['custid'];
        // 3. define the select sql with the specific custid
        $query = "select * from itemlist where item_ID  = " . $id;
        // 4. execute the query by using mysqli_query 
        $result = mysqli_query($conn, $query);

        $rows = mysqli_fetch_row($result);

        $Item_image = $rows[0];
        $item_ID = $rows[1];
        $item_name = $rows[2];
        $item_category = $rows[3];
        $item_price = $rows[4];
        $item_status = $rows[5];


        mysqli_close($conn);
        ?>
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
        <!------------------------------->
        <div class="container">
            <div class="row">
                <h1>Edit Products</h1>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">


                    <?php
                    echo '<form method ="POST" action="adminEditProductHandler.php">';
                    echo 'Item_image:<input type = "file" name = "Item_image" value ="' . $Item_image . '">';
                    echo '<br>';
                    echo 'item_ID:<input type = "type" name = "item_ID" value = "' . $item_ID . '">';
                    echo '<br>';
                    echo 'item_name: <input type = "text" name ="item_name" value ="' . $item_name . '">';
                    echo '<br>';
                    echo 'item_category: <input type = "text" name ="item_category" value ="' . $item_category . '">';
                    echo '<br>';
                    echo 'item_price: <input type = "text" name ="item_price" value ="' . $item_price . '">';
                    echo '<br>';
                    echo 'item_status: <input type = "text" name ="item_status" value ="' . $item_status . '">';
                    echo '<br>';

                    echo '<input type ="submit" value= "Edit" name = "submit">';
                    echo '</form>';
                    ?>
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
