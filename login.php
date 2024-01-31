<?php  
session_start();
$con = mysqli_connect("localhost","root","","pharmacy");
if($_SERVER['REQUEST_METHOD'] =="POST" )
{
    $usernameemail = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($con, "SELECT * FROM user1 WHERE UserName = '$usernameemail' OR Email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0)
    {
         if($password == $row['Password'])
         {
             $_SESSION["login"] = true;
             $_SESSION["id"] = $row["User_ID"];
             header("Location: index.html");
         }else
         {
            echo '<script>alert("Wrong Password!");</script>';
         }
    }else
    {
        echo '<script>alert("User not Registered!");</script>';
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
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form  class="box" action="login.php" method="post" autocomplete = "off">
        <center>
            <img src="NicePng_medical-logo-png_8601597.png" alt="logo" width="200px">
        </center>
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username or Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="login">
        <h3>If you don't have an acount.Please <a class="Sign" href="signup.php">SignUp</a></h3>
    </form>
</body>
</html>