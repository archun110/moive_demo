<?php include('header.php'); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        ?>
        <form>
            <h2>What do you want to choose self-pickup or delivery service?</h2>
        </form>
        <form  method="Post" action="Delivery.php">
            <input type="hidden" name="Total1">
            <input type="submit" value="Delivery" name="submit" id="btn_login">
        </form>
        <form  method="Post" action="Self.php">
            <input type="hidden" name="Total2">
            <input type="submit" value="Self-pickup" name="submit" id="btn_login">
        </form>
        <?php
        echo $point;
        ?>
    </body>
</html>
<?php include('footer.php'); ?>