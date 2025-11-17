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
        table { border-collapse: collapse; width: 60%; margin: 20px auto; }
        th, td { padding: 10px; border: 1px solid #555; text-align: left; }
        th { background: #eee; }
    </style>
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
    </tr>

    <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?= $row['ID']; ?></td>
            <td><?= htmlspecialchars($row['Name']); ?></td>
            <td><?= number_format($row['Price'], 2); ?></td>
            <td><?= $row['Quantity']; ?></td>
        </tr>
    <?php endwhile; ?>

</table>

<?php
$result->free_result();
$mysqli->close();
?>

</body>
</html>
