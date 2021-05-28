<?php
require_once("../include/connection.php");
$db = new Database();
if(isset($_POST['sign_up'])){
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $rand = rand(1,2);

    if($name ==''){
        echo "<script>alert('We can not verify your name'</script>)";
    }
    if(strlen($pass)<8){
        echo"<script>alert('Password should be minimum 8 characters!')</script>";
        exit();
    }


    $query = "insert into user(user_name,user_password,user_email,user_country,user_gender) VALUES('$name','$pass','$email','$country','$gender')" ;
    $db->selectData($query);

}
