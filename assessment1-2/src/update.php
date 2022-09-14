<?php
include './partials/_dbconnect.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $Name=$_POST['ProductName'];
    $Details=$_POST['ProductDetails'];
    $Price=$_POST['ProductPrice'];
    $image=$_POST['ProductImage'];
    $img_loc=$_FILES['ProductImage']['tmp_name'];
    $img_name=$_FILES['ProductImage']['name'];
    $image_des="images/".$img_name;
    move_uploaded_file($img_loc,'images/'.$img_name);

    //Update Product
    mysqli_query($conn, "UPDATE `products` SET
    `name` = $Name,
    `details` = $Details,
    `price` = $Price,
    `image` = $image_des
    WHERE `id` = $id");

    header('location:welcome.php');
}
