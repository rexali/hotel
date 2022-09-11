<?php
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

require_once("config.php");
// Escape user inputs for security
$product_id = trim(mysqli_real_escape_string($link, $_REQUEST['product_id']));

if(isset($product_id)){
    // Attempt select query execution
    $sql = "SELECT * FROM products WHERE product_id = $product_id";

    $result = $link->query($sql);
    
    $outputArray = array();
    
    $outputArray = $result->fetch_all(MYSQLI_ASSOC);
    
    $json =json_encode($outputArray);
    
    echo $json;
}
 
// close connection
mysqli_close($link);
}

?>