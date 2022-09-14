<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $showAlert = false;
    $showError = false;
    include './partials/_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $sql = "Select * from users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);    

    if($num == 0){
        if ($password == $cpassword) {
            $hash = $hashedpass= password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Passwords do not match";
        }
    } else {
        $showError = "User Already Exists";
    }

}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/nav.php' ?>
    <div class="container">
        <form class="row g-3 needs-validation" novalidate id="form" action="" method="post">
            <h1>Sign up to the website</h1>
            <?php
            if ($showAlert) {

                echo '  
                <div class="alert alert-success" role="alert">
                    Success! Now you can login
                </div>';
            }
            if ($showError) {

                echo '  
                <div class="alert alert-danger" role="alert">
                    ' . $showError . '
                </div>';
            }
            ?>

            <div class="mb-3 col-md-6">
                <label class="form-label" for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your name with anyone else.</div>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback">
                    Please enter a password.
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                <div class="invalid-feedback">
                    Please enter the same password again.
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class=" btn btn-primary">Submit</button>
            </div>

        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
<script src="./js/script.js"></script>

</html>