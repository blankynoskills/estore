<?php
// 1. Include your database connection info
require_once("dbinfo.php");

// 2. Check for a database connection error
if ($mysqli->connect_errno) {
    // In a real application, you might log this error instead of echoing it
    error_log("Failed to connect to MySQL: " . $mysqli->connect_error);
    // Show a generic error to the user
    echo "A database error occurred. Please try again later.";
    exit();
}

// 3. Check if a product ID was passed in the URL and is a valid number
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = (int)$_GET['id'];

    // 4. Prepare a DELETE statement to prevent SQL injection
    $stmt = $mysqli->prepare("DELETE FROM products WHERE ID = ?");
    
    // Bind the integer ID to the statement
    $stmt->bind_param("i", $productId);

    // 5. Execute the statement
    if ($stmt->execute()) {
        // **SUCCESS! Redirect back to the home page as requested.**
        header("Location: estore.php"); 
        exit(); // Always call exit() after a header redirect
    } else {
        // If there was an error during execution, log it and inform the user
        error_log("Error deleting record: " . $stmt->error);
        echo "There was a problem deleting the product. Please try again.";
    }

    // Close the statement
    $stmt->close();
} else {
    // If no valid ID was provided, show an error
    echo "Invalid product ID specified.";
    exit();
}

// Close the database connection
$mysqli->close();
?>
