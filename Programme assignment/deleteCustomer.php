
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
  
    <?php include_once 'db.php' ?>
    
    <?php
    $id = $_GET['custid'];
    // 3. define the delete sql
    $query = "delete from account where user_ID = " .$id;
    // 4. execute the query by using mysqli_query 
    $result = mysqli_query($conn, $query);    
    // 5. close connection
    mysqli_close($conn);
    ?>

    <body>
        <?php
        if (!$result) {
            die("Database access failed: " . mysql_error());
        } else {

            echo "The customer record with id ($id) is successfully deleted";
        }
        echo'<br>';
        ?> 
        <a href="customerList.php"> List Customers </a>
    </body>

</html>
