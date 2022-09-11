<?php
header("Content-Type: application/json; charset=UTF-8");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require "config.php";
    
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $vendor_id = $_POST['vendor_id']; 
    
    $sql = "INSERT INTO carts(customer_id, vendor_id, product_id) VALUES($customer_id, $vendor_id, $product_id)"; 

    if(mysqli_query($link, $sql)){
        echo '{"result":"success"}';
    } else{
        echo '{"result": "Error: could not execute {$sql}.  '  .mysqli_error($link).'"}';
    }
    // close connection
    mysqli_close($link);
}    
?>