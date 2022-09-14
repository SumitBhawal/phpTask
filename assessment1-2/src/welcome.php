<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $_SESSION['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/nav.php' ?>

    <h1>Welcome - <?php echo $_SESSION['username']; ?></h1>

    <?php
        if ($showError) {
            echo '  
                <div class="alert alert-danger" role="alert">
                    ' . $showError .'
                </div>';
        }
    ?>

    <form action="insert.php" method="POST" enctype="multipart/form-data">
        <div class=" container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="ProductName">Product Name</label>
                        <input type="text" class="form-control" name="ProductName" id="ProductName" placeholder="Enter product Name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="ProductDetails">Product Details</label>
                        <textarea class="form-control" name="ProductDetails" id="ProductDetails" placeholder="Enter product details"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="ProductPrice">Price</label>
                        <input type="text" class="form-control" name="ProductPrice" id="ProductPrice" placeholder="Enter product price">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="image">Upload an Image</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="file" name="ProductImage">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="upload">Upload</button>
    </form>


    <!-- Fetch Data -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col"> Name</th>
                <th scope="col"> Details</th>
                <th scope="col"> Price</th>
                <th scope="col"> Image</th>
                <th scope="col">  Delete</th>
                <th scope="col"> Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include './partials/_dbconnect.php';
            $pic = mysqli_query($conn, "SELECT * FROM `products`");
            while($row = mysqli_fetch_array($pic)){
                echo"
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[details]</td>
                    <td>$row[price]</td>
                    <td><img src ='$row[image]'width = '200px' height = '80px' alt='No image available' /></td>
                    <td><a href='delete.php? id= $row[id]' class = 'btn btn-danger'>Delete</a></td>
                    <td><a href='edit.php? id= $row[id]' class = 'btn btn-danger'>Edit</a></td>
                    <td></td>
                
                </tr>";
            }
            
            ?>
        </tbody>
    </table>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>