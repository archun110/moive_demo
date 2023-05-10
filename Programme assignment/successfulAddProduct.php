<?php
session_start();
include("db.php");
if (isset($_POST['submit'])) {
    $image = $_POST["Item_image"];
    $item_ID = $_POST["item_ID"];
    $carname = $_POST["item_name"];
    $category = $_POST["item_category"];
    $price = $_POST["item_price"];
    $status = $_POST["item_status"];

    $query = "insert into itemlist (Item_image,item_ID,item_name,item_category,item_price,item_status) values ('images/$image',$item_ID,'$carname','$category',$price,'$status')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Database access failed : " . mysqli_error($conn));
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
           <meta http-equiv="refresh" content="1;url= adminProducts.php" />
    </body>
</html>
<script>
    window.alert("You are Successfully adding Product!");
</script>