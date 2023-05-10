<?php
require 'db.php';
session_start();
?>
<?php
if(!isset($_SESSION['carts'])){
    $_SESSION['carts'] = array();
}
if (isset($_POST["action"]) && !empty($_POST["action"])) {
   
    $action = $_POST["action"];
    switch ($action) {
        case "remove":
            $id = $_POST["id"];
            $quantity = $_POST["quantity"];

            if (!isset($_SESSION['carts'][$id])) {
                $_SESSION['carts'][$id] = "0";
            }
            $_SESSION['carts'][$id] = $_SESSION['carts'][$id] - $quantity;
            if ($_SESSION['carts'][$id] <= 0) {
                unset($_SESSION['carts'][$id]);
            }
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .container{
                margin-bottom: 100px;
            }
            .btn{
                margin-top: 0;                
                margin-left: 10px;
            }
            .btn-success{
                font-size: 20px;
                padding:15px  40px;
            }
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
    }
    ?>
                    <i class="fa fa-bars" onclick="menutoggle()"></i>
                </div>
            </div>
        </div>

        <!------------------------------------------------>

        <div class="container">
            <?php
            $Total = 0;
            if (isset($_SESSION['carts']) && !empty($_SESSION['carts'])) {
                $carts = $_SESSION['carts'];
                echo "<h2>Your shopping cart contain the following item:<br></h2>";
                echo "<table class= table>";
                echo "<tr>";
                echo "<td><b>Item</b></td>";
                echo "<td><b>Item Name<b></td>";
                echo "<td><b>Item Price<b></td>";
                echo "<td><b>Quantity<b></td>";
                echo "<td><b>SubTotal<b></td>";
                echo "<td><b>Delete Item<b></td>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                echo "<tr>";
                foreach ($carts as $id => $quantity) {

                    $subtotal = $_SESSION['price'][$id] * $quantity;
                    $Total = $Total + $_SESSION['price'][$id] * $quantity;

                    echo '<form method="POST" action="shoppingCart.php">';
                    echo '<input type="hidden" name="action" value="remove">';
                    echo "<tr>";
                    echo '<td><img src="' . $_SESSION['image'][$id] . '" width="150"></td>';
                    echo "<td>" . $_SESSION['name'][$id] . "</td>";
                    echo "<td>" . $_SESSION['price'][$id] . "</td>";
                    echo '<input type ="hidden" name"action" value="remove">';
                    echo '<td><input type="hidden" name="id" value="' . $id . '"> ';
                    echo 'x ' . $quantity . ' pc </td>';
                    echo "<td>$subtotal</td>";
                    echo '<td><input type="number" name="quantity" size="2" value="1" min="1" max="' . $quantity . '">';
                    echo '<button class="btn" type="sumbit" >Delete</button></td>';

                    echo '</form>';
                    echo "</tr>";
                    echo"<tr>";
                }
                echo"<td></td>";
                echo"<td></td>";
                echo"<td></td>";
                echo"<td></td>";
//                echo '<form action="Pay.php">';
                echo '<td><h1>Total Points : ' . $Total . '</h1><td>';
                echo '<a href="pay.php"><button type="button" class="btn btn-success">Pay</button></a>';
//                echo '</form>';
                echo"</tr>";
            }
            if ($Total == 0) {
                echo '<div class="container">';
                echo '<div class"row">';
                echo "<h1>You have No Item in the cart!!</h1>";
                echo "</div>";
                echo "</div>";
            } else {
                echo '<form action="pay.php">';
                echo '</form>';
                echo "<tbody>";
                echo "</table>";
            }
            ?>    

        </div>




        <!------------------footor----------------------->
        <div class = "footer">
            <div class = "container">
                <div class = "row">
                    <div class = "footer-col-1">
                        <h3>Download Our App</h3>
                        <p>Download App for Android and ios mobile phone.</p>
                        <div class = "app-logo">
                            <img src = "images/play-store.png">
                            <img src = "images/apple-store.png">
                        </div>
                    </div>
                    <div class = "footer-col-2">
                        <img src = "images/logo2.PNG" >
                        <p>Our purpose is to sustainably make the surprise to people who are interested in collecting model cars and benefits to the many.</p>
                    </div>
                    <div class = "footer-col-3">
                        <h3>Useful Links</h3>
                        <ul>
                            <li>Coupons</li>
                            <li>Blog Post</li>
                            <li>Return Policy</li>
                            <li>Join Affiliate</li>
                        </ul>
                    </div>
                    <div class = "footer-col-4">
                        <h3>Follow us</h3>
                        <ul>
                            <li>Facebook <i class = "fa fa-facebook-official"></i></li>
                            <li>Twitter <i class = "fa fa-twitter-square"></i></li>
                            <li>Instagram <i class = "fa fa-instagram"></i></li>
                            <li>YouTube <i class = "fa fa-youtube-play"></i></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class = "copyright">copyright 2021 - ITP4922</p>
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
<?php
if (empty($Total)) {
    die();
}
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}
$_SESSION['total'] = $Total;
$_SESSION["quantity"] =  $quantity;
?>   