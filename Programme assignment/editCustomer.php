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


    </head>

    <?php
    $id = $_GET['custid'];
    // 3. define the select sql with the specific custid
    $query = "select * from account where user_ID  = " . $id;
    // 4. execute the query by using mysqli_query 
    $result = mysqli_query($conn, $query);

    $rows = mysqli_fetch_row($result);

    $user_ID = $rows[0];
    $name = $rows[1];
    $email = $rows[2];
    $password = $rows[3];
    $address = $rows[4];
    $cashpoints = $rows[5];
    $administration = $rows[6];

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
        <!---------------------------------------->
        <div class="container">
            <div class="row">
                <h1>Edit User Account</h1>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <?php
                    echo '<form method ="POST" action="adminHandleEditCustomer.php">';
                    echo 'UserID:<input type = "test" name = "id" value ="' . $user_ID . '">';
                    echo '<br>';
                    echo 'Name: <input type = "text" name = "name" value = "' . $name . '">';
                    echo '<br>';
                    echo 'E-mail: <input type = "text" name ="email" value ="' . $email . '">';
                    echo '<br>';
                    echo 'Password: <input type = "text" name ="password" value ="' . $password . '">';
                    echo '<br>';
                    echo 'Address: <input type = "text" name ="address" value ="' . $address . '">';
                    echo '<br>';
                    echo 'Cashpoint: <input type = "text" name ="cashpoint" value ="' . $cashpoints . '">';
                    echo '<br>';
                    echo 'administration: <input type = "text" name ="administration" value ="' . $administration . '">';
                    echo '<br>';
                    echo '<input type ="submit" value= "Edit" name = "submit">';
                    echo '</form>';
                    ?>
                </div>
            </div>
        </div>
    



    <!--------------------------------------------->
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
