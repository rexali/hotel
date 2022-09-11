<?php
header("Content-Type: application/json; charset=UTF-8");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require "config.php";
    
    $product_id = trim(mysqli_real_escape_string($link, $_REQUEST['product_id'])); //$_POST['favourite_id'];
    $customer_id = trim(mysqli_real_escape_string($link, $_REQUEST['customer_id'])); //$_POST['favourite_id'];

    
    $sql = "DELETE FROM carts WHERE product_id = '$product_id' AND customer_id = '$customer_id'"; 

    if(mysqli_query($link, $sql)){
        echo '{"result":"success"}';
    } else{
        echo '{"result": "Error: could not execute {$sql}.  '  .mysqli_error($link).'"}';
    }
    // close connection
    mysqli_close($link);
}    
?>