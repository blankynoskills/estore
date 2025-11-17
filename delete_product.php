<?php

require_once("dbinfo.php");

if ($mysqli->connect_errno) {
    
    error_log("Failed to connect to MySQL: " . $mysqli->connect_error);
    
    echo "A database error occurred. Please try again later.";
    exit();
}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = (int)$_GET['id'];

    $stmt = $mysqli->prepare("DELETE FROM products WHERE ID = ?");
    
 
    $stmt->bind_param("i", $productId);

  
    if ($stmt->execute()) {
       
        header("Location: estore.php"); 
        exit(); 
    } else {
    
        error_log("Error deleting record: " . $stmt->error);
        echo "There was a problem deleting the product. Please try again.";
    }

    
    $stmt->close();
} else {
    
    echo "Invalid product ID specified.";
    exit();
}


$mysqli->close();
?>
