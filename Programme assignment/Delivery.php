<?php include('header.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $t = $_SESSION['total'];
        $id = $_SESSION['user_ID'];
        $point = $_SESSION['cashpoint'];
        $list = $_SESSION['carts'];
        $quantity = $_SESSION["quantity"];
        ?>
        <?php
        $money = $point - $t;
        ?>      
        <?php
        if (isset($_POST["Submit"])) {
            $id = $_POST['ID'];
            $name = $_POST['Name'];
            $email = $_POST['Email'];
            $phone = $_POST['PhoneNumber'];
            $address = $_POST['Address'];
            $price = $_POST['Total'];
            $pay = $_POST['Pay'];
            if ($money < 0) {
                echo'<h1>Have not enough point to pay </h1>';
                die();
            }
            $query = "insert into order_history (user_ID ,Name, Email, PhoneNumber, Address, Price, Pay,quantity)" . "values('" . $id . "','" . $name . "','" . $email . "','" . $phone . "','" . $address . "','" . $price . "','" . $pay . "','" .$quantity . "' )";
            $result = mysqli_query($conn, $query) or die("Query could not be executed!<br>" . mysqli_error($result));
            $query2 = "update account set cashpoints='" . $money . "' where user_ID ='$id'";
            $result2 = mysqli_query($conn, $query2);
            echo "<script>";
            echo 'window.alert("You are Successful !")';
            echo" </script>";
        }
        ?> 
        <form>
            <h2>Write down your information?</h2>
        </form>
        <form method="Post" >
            <input type="hidden" name="Total" value= "<?= $t ?>">
            <input type="hidden" name="ID" value= "<?= $id ?>">
            Name: <input type="text" name="Name"><br />
            Email: <input type="email" name="Email"><br />
            PhoneNumber: <input type="text" name="PhoneNumber"><br />
            Address : <input type="text" name="Address"><br />
            <input type="hidden" name="Pay" value= "Delivery">
            <input type="hidden" name="money" value= "<?= $money ?>">
            <input type="submit" value="Submit" name="Submit" id="btn_login">
            <input type="submit" value="Reset" name="Reset" id="btn_login">
        </form>
        <form action="Pay.php">
            <input type="submit" value="Return" id="btn_login">
        </form>



    </body>
</html>
<?php include('footer.php'); ?>
<?php
$_SESSION['point'] = $money;
unset($_SESSION['carts']);
?>
