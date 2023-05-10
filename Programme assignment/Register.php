<?php
session_start();
include "db.php";
$name = mysqli_real_escape_string($conn, $_POST['regname']);
$email = mysqli_real_escape_string($conn, $_POST['regemail']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$repassword = mysqli_real_escape_string($conn, $_POST['repassword']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
?>

<?php
if ((strlen($password) < 6) || (strlen($password) > 15)) {
    echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
   
    echo '<meta http-equiv="refresh" content="2;url= login.php" />';
}else{
   

$user_authentication_query = "select user_ID,email from account where email='$email' and password='$password'";
$user_authentication_result = mysqli_query($conn, $user_authentication_query) or die(mysqli_error($conn));
$rows_fetched = mysqli_num_rows($user_authentication_result);
if ($rows_fetched >0) {
    //no user
    //redirecting to same login page

   echo" <script>";
        echo'   window.alert("Wrong username or password")';
     echo"  </script>";
      echo'<meta http-equiv="refresh" content="1;url=login.php" />';
  
} else {
    $cashpoints = 50;
    if (($email === "admin@gmail.com") && ($password === "admin123" )) {
        $administration = 1;
    } else {
        $administration = 0;
    }

    $user_query = "insert into account (name,email,password,address,cashpoints,administration)"." values ('" .$name . "','".$email."','".$password."','".$address."','".$cashpoints."','" .$administration. "')";

    //die($user_registration_query);
    $user_result = mysqli_query($conn, $user_query) or die(mysqli_error($conn));
    echo "You are Successful Register!";
    $_SESSION['email'] = $email;
    //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
    $_SESSION['user_ID'] = mysqli_insert_id($conn);
    //header('location: products.php');  //for redirecting
    echo '<meta http-equiv="refresh" content="2; url=products.php" />';
 echo "<script>";
      echo 'window.alert("You are Successful Register!")';
    echo" </script>";
}
}
    ?>