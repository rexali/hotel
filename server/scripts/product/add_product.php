<?php
header("Content-Type: application/json; charset=UTF-8");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require "scripts/config.php";
    
    $vendor_id = $_POST['vendor_id'];;
    $product_name = $_POST['product_name'];
    $product_picture = basename($_POST['product_picture']);
    $product_category = $_POST['product_category'];
    $product_sub_category = $_POST['product_sub_category'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_size = $_POST['product_size'];
    $product_weight = $_POST['product_weight'];

    $sql = "INSERT INTO products(
        vendor_id,
        product_name,
        product_picture,
        product_category,
        product_sub_category,
        product_description,
        product_price,
        product_quantity,
        product_size,
        product_weight
    ) VALUES (
         $vendor_id,
        '$product_name',
        '$product_picture',
        '$product_category',
        '$product_sub_category',
        '$product_description', 
        '$product_price',
        '$product_quantity',
        '$product_size',
        '$product_weight'
        )";   

    if(mysqli_query($link, $sql)){
        echo '{"result":"success"}';
    } else{
        echo '{"result": "Error: could not execute $sql.  '  .mysqli_error($link).'"}';
    }
    // close connection
    mysqli_close($link);
}    
?>