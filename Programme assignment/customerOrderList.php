<?php
include_once 'db.php';
session_start();
$id = $_SESSION['user_ID'];
if (!isset($_SESSION['carts'])) {
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                        echo '<a class= "notification" href="shoppingCart.php"><i class="fa fa-cart-arrow-down"><span class="badge bg-primary rounded-pill" style="padding:1px 5px" >' . count($_SESSION['carts']) . '</span></i></a>';
                    } else {
                        echo '<a class= "notification" href="shoppingCart.php"><i class="fa fa-cart-arrow-down"><span class="badge bg-primary rounded-pill" style="padding:1px 5px" >0</span></i></a>';
                    }
                    ?>
                    <i class="fa fa-bars" onclick="menutoggle()"></i>
                </div>
            </div>
        </div>

        <!--------------------------------------->
        <div class= "container">
            <h1>Order List</h1>
            <br>
            <table class="table table-striped">
                <thread>
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Pay</th>
                        <th>Delivery Date</th>
                        <th>Delivery time</th>
                                  <th>quantity</th>
                        <th>OrderDate</th>
                        <th> More Detail</th>
                    </tr>
                </thread>
                <tbody>


                    <?php
                    $query = "SELECT * FROM order_history WHERE user_ID ='" . $id . "'";
                    $result = mysqli_query($conn, $query);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount <= 0) {
                        echo "<tr><td>No customers found<tr><td>";
                    } else {
                        $count = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<input type="hidden" name="userID" value="' . $row['user_ID'] . '"> ';
                            echo "<tr>";
                            echo "<td>" . $row['orderID'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row["Price"] . "</td>";
                            echo "<td> " . $row["Pay"] . "</td>";
                            if (isset($row["orderDate"])) {
                                echo "<td>" . 'Delivery Date :' . $row["oDate"] . "</td>";
                                echo "<td>" . 'Delivery time :' . $row["oTime"] . "</td>";
                            } else {
                                
                            }
                            echo "<td> " . $row["quantity"] . "</td>";   
                            echo "<td>" . 'OrderDate :' . $row["orderDate"] . "</td>";
                            echo "<td> <a href=\"moreDetail.php?custid=" . $row["user_ID"] . "\">moreDetail</a> " . "</td>";
                            echo "</tr>";
                            $count++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-------------------------------------------------->
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