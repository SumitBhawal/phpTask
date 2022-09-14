<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $_SESSION['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<?php
include './partials/_dbconnect.php';
$id = $_GET['id'];
$Record = mysqli_query($conn, "SELECT * FROM `products` WHERE id=$id");
$data = mysqli_fetch_array($Record);

?>


<form action="update.php" method="POST" enctype="multipart/form-data">
        <div class=" container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="ProductName">Product Name</label>
                        <input type="text" class="form-control" name="ProductName" id="ProductName" value="<?php echo $data['name'] ?>">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="ProductDetails">Product Details</label>
                        <input class="form-control" name="ProductDetails" id="ProductDetails" value="<?php echo $data['details'] ?>"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="ProductPrice">Price</label>
                        <input type="text" class="form-control" name="ProductPrice" id="ProductPrice" value="<?php echo $data['price'] ?>"">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="image">Upload an Image</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <td><input type="file" name="ProductImage" value="<?php echo $data['image'] ?>"> <img src="<?php echo $data['image'] ?>" alt="No image" width="300px" height="200px"></td>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <button type="submit" class="btn btn-primary" name="update">Confirm Edit</button>
    </form>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>
</html>