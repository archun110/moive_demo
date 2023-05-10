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
        include_once 'db.php';

$item_ID= $_GET['custid'];

    $query = "delete from itemlist where item_ID ='".$item_ID."'";
    
    $result = mysqli_query($conn, $query);
     if (!$result) {
            die("Database access failed: " . mysql_error());
        }
      

        ?>
        <a href="adminProducts.php">Back to adminProducts</a>
    </body>
</html>
