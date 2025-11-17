 <?php
<<<<<<< HEAD
    require_once("dbinfo.php");
    $id = $_POST["id"]; 
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sqlStatement = "UPDATE products set Name='$name' Price=$price Quantity=$quantity where ID=$id";
=======
    $id = $_GET["id"];  
    $sqlStatement = "SELECT * from products where id=$id";
>>>>>>> db01f7c6c295099331938e0c10e8fae8f17dfc24
    $result = $mysqli -> query($sqlStatement);
    if($result){
        header("location:viewproduct.php");
    }
    else{
        echo "There is an error! D:";
    }
 ?>      