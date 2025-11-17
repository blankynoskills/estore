<?php


require_once("dbinfo.php");

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO products (Name, Price, Quantity) 
        VALUES ('$name', '$price', '$quantity')";

$mysqli->query($sql);

header("location: process.php?product=" . $name);



?>