<?php
require 'db.php';

$Email = $_SESSION['email'];
if (!isset($Email)) {
    session_unset();
    session_destroy();
    header("Location: login.php");
}

$query = "SELECT * FROM account WHERE email ='" . $Email . "'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database access failed : " . mysqli_error($conn));
}

$row = mysqli_fetch_row($result);
$id = $row[0];
$name = $row[1];
$email = $row[2];
$password = $row[3];
$address = $row[4];
$cashpoint = $row[5];


if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    $query = "UPDATE account set name= '" . $name . "' , email= '" . $email . "' , password= '" . $password . "',address= '" . $address . "', cashpoints='" . $cashpoint . "' where user_ID  = $id ";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database access failed : " . mysqli_error($conn));
    } else {
        ?>
        <script>
            window.alert("UPDATE Successfully");
        </script>
        <?php
    }
}
//mysqli_close($conn);
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            h1{
                text-align: center;
                padding:10px;
            }
            form{
                margin: 20px;
            }
        </style>


    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Your Account</h1>
                <div class="row">              
                    <div class="col-12 col-md-6">
                        <form method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="<?php echo $email; ?>" name="email" >
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Your Name</label>
                                <input type="text" class="form-control" id value="<?php echo $name; ?>" name="name">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Address</label>
                                <input type="text" class="form-control"  value="<?php echo $address; ?>" name="address">
                            </div>
                            <?php
                            echo "Your cashpoint : " . $cashpoint;
                            echo "<br>";
                            ?>

                            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <div class="row">
                            <div class="col-12 row-md-6">
                                <a href="change_password.php"><button type="submit" name="submit" class="btn btn-primary">Change Password</button></a>
                                <a href="customerOrderList.php"><button type="submit" name="submit" class="btn btn-primary">Check Your Order</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
