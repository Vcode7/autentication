<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db";

$conn = Mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("error server not connected");
}

?>