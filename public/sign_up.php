<?php
session_start();
include "../include/connection.php";
$email_error = "";
$username_error = "";
$db = new Database();
if(isset($_POST['sign_up'])) {
    $name = $_SESSION['username'] = $db->data($_POST['username']);
    $pass =$_SESSION['password'] = $db->data($_POST['password']);
    $email =$_SESSION['email'] = $db->data($_POST['email']);
    $country =$_SESSION['country'] = ($_POST['country']);
    $gender = $_SESSION['gender'] =($_POST['gender']);

    $check_email = "SELECT * FROM USER WHERE user_email = '$email'";
    $run_email = $db->selectData($check_email);
    $email_result = $run_email->get_result();
    $check_username = "SELECT * FROM USER WHERE user_name = '$name'";
    $run_username = $db->selectData($check_username);
    $username_result = $run_username->get_result();
    if($email_result->num_rows>0){
        $email_error = "<div style='font-size:12px;width: max-content'><i class='fa fa-exclamation-circle' ></i>  Existed email,please type another email</div>";
    }
    if($username_result->num_rows>0){
        $username_error = "<div style='font-size:12px;width: max-content'><i class='fa fa-exclamation-circle' ></i>  Existed username,please type another username</div>";
    }
    if($email_result->num_rows==0 && $username_result->num_rows==0){
        $query = "insert into user(user_name,user_password,user_email,user_country,user_gender) VALUES('$name','$pass','$email','$country','$gender')";
        if ($db->selectData($query)) {
            header("Location:sign_in.php");
        }
    }



}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create New account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="login-dark">

    <form method="post">


        <h2 class="sr-only">Login Form</h2>
        <div class="illustration">
            <i class="icon ion-ios-locked-outline"></i>
        </div>
        <div class="sign-up-click">Already had  an account?,<a href="sign_in.php" class="sign-up-click-a">Click here to login</a></div>

        <div class="form-group">
            <label for="username">Username</label>
            <?php echo $username_error ?>
            <input class="form-control" type="text" name="username" minlength="8" placeholder="example: Mã Hải Tâm" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input class="form-control" type="password" name="password" minlength="8" placeholder="Password" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <?php echo $email_error ?>
            <input class="form-control" type="email" name="email" placeholder="someone@site.com" autocomplete="off" required >

        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <select class = "form-control-country"name="country" id="">
                <option>Pakistan</option>
                <option>United States of America</option>
                <option>India</option>
                <option>UK</option>
                <option>Bangladesh</option>
                <option>France</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class = "form-control-gender"name="gender" id="">
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
            </select>
        </div>
        <div class="form-group ">
            <label for="" class="check-box-label"><input type="checkbox" class="check-box-input" required>
                <div class="check-box">
                    <div class="check-box-item">I accept the &nbsp</div>
                    <div class="check-box-item">
                        <a href="#" class="check-box-item-link">Terms of the Use</a>
                        &
                        <a href="#" class="check-box-item-link">Privacy Policy</a>
                    </div>
                </div>
            </label>
        </div>
        <div class="form-group"><input class="btn btn-primary btn-block" type="submit" name="sign_up"></div>

        <a href="forgot_pass.php" class="forgot">Forgot your email or password?</a>

    </form>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>