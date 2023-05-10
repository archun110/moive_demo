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
$custid=$_POST['id'];
$name =$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$address = $_POST['address'];
$cashpoints = $_POST['cashpoint'];
$administration = $_POST['administration'];


// 3. define the update sql
$query = "update account set name= '$name',email ='$email' ,password ='$password', address ='$address',cashpoints ='$cashpoints',administration = '$administration' where user_ID = '$custid' ";

// 4. execute the query by using mysqli_query 
$result = mysqli_query($conn, $query);

// 5. close connection
mysqli_close($conn);
?>
<body>
        <?php
        if ($result == TRUE) {
            print("The Customer was  updated successfully !<br>\n");
        } else {
            print("The query could not be executed!<br>\n" . mysqli_error($conn));
        }
        ?>
         <a href="customerList.php"> List Customer </a>
   
    </body>

</html>
