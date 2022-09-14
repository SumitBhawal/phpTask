<?php
$server = "db";
$username = "root";
$password = "example";
$dbname = "users";
$conn =   new mysqli($server,$username,$password,$dbname);

if(!$conn){
    die("Error". mysqli_connect_error());
}
?>