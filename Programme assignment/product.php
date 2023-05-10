<?php
require 'db.php';
session_start();
?>
<?php
if (isset($_GET["action"]) && !empty($_GET["action"])) {

    if (!isset($_SESSION['carts'])) {
        $_SESSION['carts'] = array();
    }

    $action = $_GET["action"];
    switch ($action) {
        case "add":
            $id = $_GET["ID"];
            $number = $_GET["quantity"];
            $carname = $_GET["name"];
            $price = $_GET["price"];
            $image = $_GET["image"];

            if (!isset($_SESSION['carts'][$id])) {
                $_SESSION['carts'][$id] = "0";
            }
            $_SESSION['carts'][$id] = $_SESSION['carts'][$id] + 1 * $number;

            if (!isset($_SESSION['number'][$id])) {
                $_SESSION['number'][$id] = $number;
            }
            if (!isset($_SESSION['name'][$id])) {
                $_SESSION['name'][$id] = $carname;
            }
            if (!isset($_SESSION['price'][$id])) {
                $_SESSION['price'][$id] = $price;
            }
            if (!isset($_SESSION['image'][$id])) {
                $_SESSION['image'][$id] = $image;
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="product.php">Products</a></li>
                            <li><a href="login.php">MyAccount</a></li>
                            <li><a href="login.php">login</a></li>
                        </ul>
                    </nav>
                    <a class= "notification" href="login.php"> <i class="fa fa-cart-arrow-down"></i></a>
                    <i class="fa fa-bars" onclick="menutoggle()"></i>
                </div>
            </div>
        </div>

        <!------------------------------------------------>
        <div class=" d-flex flex-row-reverse">
            <div class="p-3 ">
                <div class="input-group mb-3">
                    <form method="GET" action="product.php">
                        <input type="hidden" name="SearchCategory">
                        <div class="input-group-prepend">
                            <select class="custom-select" name="Category">
                                <option selected disabled="" >Category Search</option>
                                <option value="black">black</option>
                                <option value="red">red</option>
                                <option value="white">white</option>
                                <option value="orange">orange</option>
                                <option value="silver">silver</option>
                                <option value="green">green</option>
                                <option value="blue">blue</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-3 ">
                <div class="input-group mb-3">
                    <form method="GET" action="product.php">
                        <input type="hidden" name="SearchKeyword">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" placeholder="Keyword Search" name="keyword" >
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-3 ">
                <div class="input-group mb-3">
                    <form method="GET" action="product.php">
                        <input type="hidden" name="SearchPriceRange">
                        <div class="input-group-prepend">
                            Min:<span id="showMin"></span>
                            <input type="range" class="form-control-range" id="Min" min="0" max="100" value="0" name="min">
                            <input type="range" class="form-control-range" id="Max" min="0" max="200" value="200" name="max">
                            Max:<span id="showMax"></span>
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            var sliderMin = document.getElementById("Min");
            var outputMIn = document.getElementById("showMin");
            outputMIn.innerHTML = sliderMin.value;
            sliderMin.oninput = function () {
                outputMIn.innerHTML = this.value;
            }
            var sliderMax = document.getElementById("Max");
            var outputMax = document.getElementById("showMax");
            outputMax.innerHTML = sliderMax.value;
            sliderMax.oninput = function () {
                outputMax.innerHTML = this.value;
            }
        </script>
        <div class="cartegories">
            <div class ="small-container">
                <h2 class="title">Top Products</h2>
                <div class="row">

                    <?php
                    if (isset($_GET["SearchCategory"])&&!empty($_GET['Category'])) {
                        $search_category = $_GET['Category'];

                      
                 
        

                 
                $scquery = "SELECT * FROM itemlist WHERE item_category ='" . $search_category . "' ORDER BY item_ID ASC;";
                $scresult = mysqli_query($conn, $scquery);
                if ($scresult == false) { // Check if the query can be successfully execute
                    die("The query could not be executed!<br>\n" . mysqli_error($conn));
                }
                foreach ($scresult as $scrow) {
                    extract($scrow);
                    echo "<div class=" . 'col-4' . ">";
                    echo'<form method ="post" action= "' . $_SERVER["PHP_SELF"] . '">';
                    echo "<img src=" . $Item_image . ">";
                    echo '<input type = "hidden" name ="action" value="add">';
                    echo '<input type = "hidden" name="id" value =' . $item_ID . ">";
                    echo '<input type = "hidden" name="name" value =' . $item_name . ">";
                    echo '<input type = "hidden" name="price" value =' . $item_price . ">";
                    echo '<input type = "hidden" name="image" value =' . $Item_image . ">";
                    echo "<h4>$item_name</h4>";
                    echo'<br>';
                    ?>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <h3><?= $item_price ?> Point</h3>
                    <?php
                    echo'<br>';
                    echo '<input type="number" name=quantity value="1"  min="1" max="20"> ';
                    echo '<button type ="submit" value = "Add to cart &#9762" class ="btn">Add to cart &#9762</button>';
                    echo '</form>';
                    echo "</div>";
                } 
                
                
                ?>
                <?php
               }
        else if (isset($_GET["SearchKeyword"])) {
            $search_keyword = $_GET['keyword'];

            $skquery = "SELECT * FROM itemlist WHERE item_name LIKE '%" . $search_keyword . "%' ORDER BY item_ID ASC;";
            $skresult = mysqli_query($conn, $skquery);
            if ($skresult == false) { // Check if the query can be successfully execute
                die("The query could not be executed!<br>\n" . mysqli_error($conn));
            }
            foreach ($skresult as $skrow) {
                extract($skrow);
                echo "<div class=" . 'col-4' . ">";
                echo'<form method ="post" action= "' . $_SERVER["PHP_SELF"] . '">';
                echo "<img src=" . $Item_image . ">";
                echo '<input type = "hidden" name ="action" value="add">';
                echo '<input type = "hidden" name="id" value =' . $item_ID . ">";
                echo '<input type = "hidden" name="name" value =' . $item_name . ">";
                echo '<input type = "hidden" name="price" value =' . $item_price . ">";
                echo '<input type = "hidden" name="image" value =' . $Item_image . ">";
                echo "<h4>$item_name</h4>";
                echo'<br>';
                ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <h3><?= $item_price ?> Point</h3>
                <?php
                echo'<br>';
                echo '<input type="number" name=quantity value="1"  min="1" max="20"> ';
                echo '<button type ="submit" value = "Add to cart &#9762" class ="btn">Add to cart &#9762</button>';
                echo '</form>';
                echo "</div>";
                ?>
                <?php
            }
        } else if (isset($_GET["SearchPriceRange"])) {
            $min = $_GET['min'];
            $max = $_GET['max'];

            $sprquery = "SELECT * FROM itemlist WHERE item_price BETWEEN '" . $min . "' AND '" . $max . "' ORDER BY item_ID ASC;";
            $sprresult = mysqli_query($conn, $sprquery);
            if ($sprresult == false) { // Check if the query can be successfully execute
                die("The query could not be executed!<br>\n" . mysqli_error($conn));
            }
            foreach ($sprresult as $sprrow) {
                extract($sprrow);
                echo "<div class=" . 'col-4' . ">";
                echo'<form method ="post" action= "' . $_SERVER["PHP_SELF"] . '">';
                echo "<img src=" . $Item_image . ">";
                echo '<input type = "hidden" name ="action" value="add">';
                echo '<input type = "hidden" name="id" value =' . $item_ID . ">";
                echo '<input type = "hidden" name="name" value =' . $item_name . ">";
                echo '<input type = "hidden" name="price" value =' . $item_price . ">";
                echo '<input type = "hidden" name="image" value =' . $Item_image . ">";
                echo "<h4>$item_name</h4>";
                echo'<br>';
                ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <h3><?= $item_price ?> Point</h3>
                <?php
                echo'<br>';
                echo '<input type="number" name=quantity value="1"  min="1" max="20"> ';
                echo '<button type ="submit" value = "Add to cart &#9762" class ="btn">Add to cart &#9762</button>';
                echo '</form>';
                echo "</div>";
                ?>  


                <?php
            }
        } else {
            $query = "SELECT * FROM itemlist ORDER BY item_ID ASC";
            $result = mysqli_query($conn, $query);

            if ($result == false) { // Check if the query can be successfully execute
                die("The query could not be executed!<br>\n" . mysqli_error($conn));
            }

            foreach ($result as $row) {
                extract($row);

                echo "<div class=" . 'col-4' . ">";
                echo'<form method ="post" action= "' . $_SERVER["PHP_SELF"] . '">';
                echo "<img src=" . $Item_image . ">";
                echo '<input type = "hidden" name ="action" value="add">';
                echo '<input type = "hidden" name="id" value =' . $item_ID . ">";
                echo '<input type = "hidden" name="name" value =' . $item_name . ">";
                echo '<input type = "hidden" name="price" value =' . $item_price . ">";
                echo '<input type = "hidden" name="image" value =' . $Item_image . ">";
                echo "<h4>$item_name</h4>";
                echo'<br>';
                ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <h3><?= $item_price ?> Point</h3>
                <?php
                echo'<br>';
                echo '<input type="number" name=quantity value="1"  min="1" max="20"> ';
                echo '<button type ="submit" value = "Add to cart &#9762" class ="btn">Add to cart &#9762</button>';
                echo '</form>';
                echo "</div>";
            }
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