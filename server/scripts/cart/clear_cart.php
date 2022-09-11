<?php
header("Content-Type: application/json; charset=UTF-8");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require "config.php";
    $product_id = [];
    $product_id =  array_unique(json_decode(trim(mysqli_real_escape_string($link, $_REQUEST['product_id']))));
    $customer_id = trim(mysqli_real_escape_string($link, $_REQUEST['customer_id'])); //$_POST['favourite_id'];

    for ($x = 0; $x <= count($product_id)-1; $x++) { 
        $sql = "DELETE FROM carts WHERE customer_id = $customer_id AND product_id =".$product_id[$x];
        if(mysqli_query($link, $sql)){
            if ($x==count($product_id)-1) {
                echo '{"result":"success"}';
            }
        }else{
            echo '{"result": "Error: could not execute '.$sql  .mysqli_error($link).'"}';
        }
    }
    // close connection
    mysqli_close($link);
}    
?>