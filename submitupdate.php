 <?php
    require_once("dbinfo.php");
    $id = $_POST["id"]; 
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sqlStatement = "UPDATE products 
                        SET Name= '$name', Price=$price, Quantity= $quantity
                        where ID= '$id' ";

    $result = $mysqli -> query($sqlStatement);
    if($result){
        header("location:viewproduct.php");
    }
    else{
        echo "There is an error! D:";
    }
 ?>      