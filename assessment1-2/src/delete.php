<?php
include './partials/_dbconnect.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM `products` WHERE id=$id");

header('location:welcome.php');


?>