<?php
header("Content-Type: application/json; charset=UTF-8");
// Escape user inputs for security
require_once("config.php");

$customer_id = trim(mysqli_real_escape_string($link, $_REQUEST['customer_id']));

if(isset($customer_id)){
    // Attempt select query execution
    $sql = "SELECT * FROM products WHERE product_id IN (SELECT product_id FROM carts WHERE customer_id = '$customer_id')";

    $result = $link->query($sql);
    
    $outputArray = array();
    
    $outputArray = $result->fetch_all(MYSQLI_ASSOC);
    
    $json =json_encode($outputArray);
    
    echo $json;
}
 
// close connection
mysqli_close($link);
?>