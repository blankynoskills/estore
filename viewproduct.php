<?php
require_once("dbinfo.php");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql = "SELECT * FROM products";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin: 20px auto; }
        th, td { padding: 10px; border: 1px solid #555; text-align: left; }
        th { background: #eee; }
        .delete-btn {
            color: #D9534F; /* Reddish color */
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border: 1px solid #D9534F;
            border-radius: 4px;
        }
        .delete-btn:hover {
            background-color: #D9534F;
            color: white;
            text-decoration: none;
        }
    </style>
    <script>
        // JavaScript function to show a confirmation dialog before deleting
        function confirmDelete(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                // If user confirms, redirect to the delete script with the product ID
                window.location.href = 'delete_product.php?id=' + productId;
            }
        }
    </script>
</head>
<body>

<h2 style="text-align:center;">Product List</h2>

<form action="estore.php" method="get">
        <button type="submit">estore</button>
</form>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th> <!-- Column for the delete button -->
    </tr>

    <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?= $row['ID']; ?></td>
            <td><?= htmlspecialchars($row['Name']); ?></td>
            <td><?= 'S/' . number_format($row['Price'], 2); ?></td>
            <td><?= $row['Quantity']; ?></td>
            <td>
                <form action="updateproduct.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>" />
                    <input type="submit" value="Update">
                </form><br>
                <!-- The delete button calls the JavaScript function -->
                <a href="#" onclick="confirmDelete(<?= $row['ID']; ?>); return false;" class="delete-btn">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

<?php
$result->free_result();
$mysqli->close();
?>

</body>
</html>
