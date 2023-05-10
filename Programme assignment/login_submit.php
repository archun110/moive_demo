        <?php
session_start();
include "db.php";
$email = mysqli_real_escape_string($conn, $_POST['logemail']);
$password = mysqli_real_escape_string($conn, $_POST['logpassword']);
?>
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
    $query="select * from account where email='$email' and password='$password'";
    $result= mysqli_query($conn,$query) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($result);
    if($rows_fetched==0){
        //no user
        //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
    }else{
        $row= mysqli_fetch_array($result);
        $_SESSION['email']=$email;
        $_SESSION['user_ID']=$row['user_ID'];  //user id
       $_SESSION['login']=TRUE;
       $_SESSION['cashpoint'] = $row['cashpoints'];
   
        if($row["administration"] === "1"){
     header('location: adminPage.php');
       }
else{   header('location: welcomePage.php'); }
    }

 ?>
    </body>
</html>
