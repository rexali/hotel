<?php
$hostname = "localhost:3306";
$username = "root";
$password = "a1l9i7y8u";
$database = "okmartdb";

$link = mysqli_connect($hostname, $username, $password, $database);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Print host information
// echo "Connect Successfully. Host info: " . mysqli_get_host_info($link).'<br>';
?>