<?php
require_once("../include/connection.php");
if(isset($_POST['sign_in'])) {
    $db = new Database();
    $pass = $_SESSION['password'] = $db->data($_POST['password']);
    $email = $_SESSION['email'] = $db->data($_POST['email']);

    $query = "SELECT * FROM USER WHERE user_email = '$email' ";
    $stmt = $db->selectData($query);
    $result = $stmt->get_result();
    if($result->num_rows >0) {
        header("Location:sign_up.php");
    } else {
        echo "<script>alert('Sai email hoặc password')";
        echo "<script>window.open('sign_in.php','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>

<div class="login-dark">

    <form method="post">

        <h2 class="sr-only">Login Form</h2>
        <div class="illustration">
            <i class="icon ion-ios-locked-outline"></i>
        </div>

        <div class="sign-up-click">Don't have an account?,<a href="sign_up.php" class="sign-up-click-a">Click here to sign up</a>
        </div>

        <div class="form-group">
            <input class="form-control" type="email" name="email"  placeholder="Email" autocomplete="off" required>
        </div>

        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="form-group">
            <input class="btn btn-primary btn-block" type="submit" name="sign_in">
        </div>

        <a href="forgot_pass.php" class="forgot">Forgot your email or password?</a>

    </form>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>