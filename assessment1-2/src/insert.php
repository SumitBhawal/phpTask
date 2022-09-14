<?php
include './partials/_dbconnect.php';

if(isset($_POST['upload'])){
    $showError = false;
    $Name=$_POST['ProductName'];
    $Details=$_POST['ProductDetails'];
    $Price=$_POST['ProductPrice'];
    $image=$_POST['ProductImage'];
    // print_r($_FILES['ProductImage']);
    $img_loc=$_FILES['ProductImage']['tmp_name'];
    $img_name=$_FILES['ProductImage']['name'];
    $image_des="images/".$img_name;
    move_uploaded_file($img_loc,'images/'.$img_name);
    $img_ext = explode('.', $img_name);
    $img_ext_check = strtolower(end($img_ext));
    $valid_img_ext =array ('png','jpeg','jpg');

    if(in_array($file_ext_check, $valid_img_ext)){
        // Insert Product
        mysqli_query($conn, "INSERT INTO `products` (`name`, `details`, `price`, `image`)
        VALUES ('$Name', '$Details', '$Price', '$image_des')");
    
        header('location:welcome.php');
    }
    else{
        $showError = "Please upload only PNG, JPG or JPEG Format images";
    }


}

?>