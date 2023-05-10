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

<?php
// 1. include db.php to obtain the connection
include_once 'db.php'?>

<?php
$Item_image=$_POST['Item_image'];
$item_ID=$_POST['item_ID'];
$item_name =$_POST['item_name'];
$item_category=$_POST['item_category'];
$item_price=$_POST['item_price'];
$item_status = $_POST['item_status'];



// 3. define the update sql
$query = "update itemlist set Item_image='images/$Item_image', item_ID= '$item_ID',item_name ='$item_name' ,item_category ='$item_category', item_price ='$item_price',item_status ='$item_status' where item_ID = '$item_ID' ";

// 4. execute the query by using mysqli_query 
$result = mysqli_query($conn, $query);

// 5. close connection
mysqli_close($conn);
?>
<body>
        <?php
        if ($result == TRUE) {
            print("The Product was updated successfully !<br>\n");
        } else {
            print("The query could not be executed!<br>\n" . mysqli_error($conn));
        }
        ?>
    <a href="adminProducts.php"> List Products </a>
   
    </body>

</html>
