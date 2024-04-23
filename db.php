<?php
$server = "localhost";
$user = "root";
$pw = "";
$db = "sparkfund";

$conn = mysqli_connect($server,$user,$pw,$db);

if(!$conn){
    die("Connection Failed" .mysqli_connect_error());
}

?>