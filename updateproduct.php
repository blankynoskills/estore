<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product!</title>
</head>
<body>
    <?php
        require_once("dbInfo.php");
        $id = $_POST['id'];
        $selectsql = "SELECT * FROM products WHERE ID=$id";
        $result = $mysqli->query ($selectsql);
    ?>
    <form action="submitupdate" method="post">
    <?php
        while ($record = $result->fetch_assoc()){
    ?>
        <h1>Update for <?php echo $record['Name'];?></h1>
        <input type="text" name="name" placeholder="Enter product name" required>

        <input type="text" name="price" placeholder="Enter product price" required>

        <input type="text" name="quantity" placeholder="Enter product quantity" required>

        <input type="hidden" name="id" value="<?php echo $id; ?>" />

        <input type="submit" class="submitbtn" value="Update product">
    </form>
    <?php
    }
    ?>
</body>
</html>