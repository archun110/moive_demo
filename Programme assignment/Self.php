<?php include('header.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('input:checkbox').click(function () {
                    $('input:checkbox').not(this).prop('checked', false);
                });
            });
        </script>
    </head>
    <body>
        <?php
        $t = $_SESSION['total'];
        $id = $_SESSION['user_ID'];
        $point = $_SESSION['cashpoint'];
        $list = $_SESSION['carts'];
       $quantity =  $_SESSION["quantity"] ;
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
            $date = $_POST['date'];
            $time = $_POST['time'];
            $money = $_POST['money'];
            if ($money < 0) {
            echo'<h1>Have not enough point to pay </h1>';
            die();
        }
            $query = "insert into order_history (user_ID ,Name, Email, PhoneNumber, Address, Price, Pay , oDate, oTime,quantity)" . "values('" . $id . "','" . $name . "','" . $email . "','" . $phone . "','" . $address . "','" . $price . "','" . $pay . "' ,'" . $date . "','" . $time . "','" .   $quantity . "')";
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
        <form method="Post">
            <input type="hidden" name="ID" value= "<?= $id ?>">    
            <input type="hidden" name="Total" value= "<?= $t ?>">
            Name: <input type="text" name="Name"><br />
            Email: <input type="email" name="Email"><br />
            PhoneNumber: <input type="text" name="PhoneNumber"><br />
            <div>
                Store :
                <input type="checkbox" name="Address" value= "Tsing Yi"/>Tsing Yi
                <input type="checkbox" name="Address" value= "Tuen Mun"/>Tuen Mun
                <input type="checkbox" name="Address" value= "Shatin"/>Shatin
                <input type="checkbox" name="Address" value= "Chai Wan"/>Chai Wan
                <input type="checkbox" name="Address" value= "Tseung Kwan O"/>Tseung Kwan O<br />
            </div>
            Date : 
            <input type="date" name="date">
            Time :
            <input type="time" name="time"><br />
            <input type="hidden" name="Pay" value= "Self_pickup">
            <input type="hidden" name="money" value= "<?= $money ?>">
            <input type="submit" value="Submit" name="Submit" id="btn_login">
            <input type="submit" value="Reset" name="Reset" id="btn_login">
        </form>
        <form action="pay.php">
            <input type="submit" value="Return" name="return" id="btn_login">
        </form>

    </body>
</html>
<?php include('footer.php'); ?>
<?php

     $_SESSION['point'] = $money;
        unset($_SESSION['carts']);
 
?>