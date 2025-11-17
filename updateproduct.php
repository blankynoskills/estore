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
        $id = $_POST['orderID'];
        $selectsql = "SELECT * FROM products WHERE ID=$id";
        $result = $mysqli->query ($selectsql);
    ?>
    <h1>Update Product</h1>
    <form action="submitupdate" method="get">
        <input type="text" name="name" placeholder="Enter product name" required>

        <input type="text" name="price" placeholder="Enter product price" required>

        <input type="text" name="quantity" placeholder="Enter product quantity" required>

        <input type="submit" class="submitbtn" value="Add product">
    </form>
</body>
</html>