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


<input type="text" name="name" placeholder="Enter product name">

<input type="text" name="price" placeholder="Enter product price">

<input type="text" name="quantity" placeholder="Enter product quantity">


</form>
</body>
</html>