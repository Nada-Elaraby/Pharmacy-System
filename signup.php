<?php
session_start();
$con = mysqli_connect("localhost","root","","pharmacy");
if($_SERVER['REQUEST_METHOD'] =="POST" )
{
    //something is posted 
    $username= $_POST['username'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    
    $duplicates =  mysqli_query($con,"SELECT * FROM user1 WHERE Email = '$email' OR UserName = '$username'");
    if(mysqli_num_rows($duplicates) > 0)
    {
         echo '<script>alert("Username or Email has already been Taken");</script>';
    }else
    {
        if($password!=$confirmpassword)
        {
            echo '<script>alert("Passwords don\'t match!");</script>';
        }else
        {
            mysqli_query($con,"INSERT INTO user1 (UserName, Password, Email, ConfirmPassword, Pharmacy_ID,phone)
                            VALUES ('$username', '$password', '$email','$confirmpassword', '111','$phone')");
            echo '<script>alert("Registration Succeeded!");';
            echo 'window.location.href = "login.php";</script>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form  class="box" action = "" method="post" autocomplete = "off">
        <center>
            <img src="NicePng_medical-logo-png_8601597.png" alt="logo" width="200px">
        </center>
        <h1>Sign Up</h1>
        <input type="text" name="username" placeholder="Username " required>
        <input type="email" name="email" placeholder="username@gmail.com" required>
        <input type="phone" name="phone" placeholder="02---" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirmpassword" placeholder="confirm password" required>

        <input type="submit" value="signUp">
        <h3>If you already have an acount.Please click <a class="Sign" href="login.php">login</a></h3>
    </form>
</body>
</html>