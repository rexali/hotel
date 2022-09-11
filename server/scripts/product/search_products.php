<?php
// Escape user inputs for security
require_once("config.php");

$term = trim(mysqli_real_escape_string($link, $_REQUEST['term']));
// $name = trim(mysqli_real_escape_string($link, $_REQUEST['name']));
// $location =trim(mysqli_real_escape_string($link, $_REQUEST['location']));

 
if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT * FROM products WHERE product_name LIKE '%".$term."%'";
    searchResult($link, $sql); 
}  
// } elseif (isset($speciality) && isset($location) && empty($name)) {
//     // Attempt select query execution
//     $sql = "SELECT * FROM services WHERE speciality LIKE '".$speciality."%' AND state LIKE '".$location."%'";
//     searcResult($link,$sql);
// } elseif (isset($speciality) && isset($location) && isset($name) ) {
//     // Attempt select query execution
//     $sql = "SELECT * FROM services WHERE speciality LIKE '".$speciality."%' AND state LIKE '".$location."%' AND first_name LIKE '".$name."%'";
//     searcResult($link,$sql);
// }elseif (isset($speciality) && empty($location) && isset($name) ) {
//     // Attempt select query execution
//     $sql = "SELECT * FROM services WHERE speciality LIKE '".$speciality."%' AND first_name LIKE '".$name."%'";
//     searcResult($link,$sql);
// } elseif (empty($speciality) && isset($location) && empty($name) ) {
//     // Attempt select query execution
//     $sql = "SELECT * FROM services WHERE state LIKE '".$location."%'";
//     searcResult($link,$sql);
// } else {
//     # code...
// }


function searchResult($link,$sql) {
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo '<ul class="list-group">';
            while($row = mysqli_fetch_array($result)){
                echo "<li class='list-group-item list-group-item-action'>".$row['product_name']."</li>";
            }
            echo '</ul>';
            // Close result set
            mysqli_free_result($result);
        } else{
            echo '<ul class="list-group">';
            echo "<li class='list-group-item text-center'>No matches found</li>";
            echo '</ul>';

        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

}
 
// close connection
mysqli_close($link);
?>