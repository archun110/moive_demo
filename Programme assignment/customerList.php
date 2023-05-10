<?php
require 'db.php';
session_start();
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>SuperCarWeb</title>
        <link rel="stylesheet" href="login.css" type="text/css">
        <link rel="icon" href="images/logo1.png">
        <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            a{
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

        <div class="container">
            <h1>Customer Information</h1>
            <h3>The table will show the customer list:</h3>
            <br>
            <table class="table table-striped">
                <thread>
                    <tr>
                        <th> ID </th>
                        <th> name </th>
                        <th> email</th>
                        <th> password </th>
                        <th> address </th>
                        <th> cashpoints </th>
                        <th> administration </th>
                        <th colspan="2"> function </th>

                    </tr>
                </thread>

                <tbody>
                    <?php
                    include_once'db.php'
                    ?>
                    <?php
                    $tableName = "account";
                    $query = "SELECT * from $tableName ";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        die("Datebase access failed: " . mysqli_error($conn));
                    }
                    ?>
                    <?php
                    // 2. use mysqli_num_rows  to obtain and assign to the variable $numOfRecord
                    $numOfRecord = mysqli_num_rows($result);

                    if ($numOfRecord <= 0) {

                        echo "<tr><td>NO customers found</td> </tr>";
                    } else {

                        // output data of each row 

                        while ($row = mysqli_fetch_array($result)) {

                            echo "<td> " . $row["user_ID"] . "</td>";
                            echo "<td> " . $row["name"] . "</td>";
                            echo "<td> " . $row["email"] . "</td>";
                            echo "<td> " . $row["password"] . "</td>";
                            echo "<td> " . $row["address"] . "</td>";
                            echo "<td> " . $row["cashpoints"] . "</td>";
                            echo "<td> " . $row["administration"] . "</td>";
                            echo "<td> <a href=\"editCustomer.php?custid=" . $row["user_ID"] . "\">edit</a> " . "</td>";
                            echo "<td> <a href=\"deleteCustomer.php?custid=" . $row["user_ID"] . "\">delete</a> " . "</td>";
                            echo"</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>>

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





