<?php 
require_once("dbinfo.php");
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/editMovie.css">
</head>
<body>
<form action="process.php" method="POST">


    <input type="text" name="name" placeholder="Enter product name" required>

    <input type="text" name="price" placeholder="Enter product price" required>

    <input type="text" name="quantity" placeholder="Enter product quantity" required>

    <input type="submit" class="submitbtn" value="Add product">
    
    <?php
        if(isset($_GET['product']) ) {
            echo $_GET['product'] . " has been added successfully!";
        }
    ?>

</form>

<form action="viewproduct.php" method="get">
        <button type="submit">View Product</button>
</form>


</body>
</html>