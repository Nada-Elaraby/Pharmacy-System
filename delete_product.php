<?php
 $con = mysqli_connect("localhost","root","","pharmacy");
 if($_SERVER['REQUEST_METHOD'] =="POST" )
 {
     $img = $_POST['img'];
     $price = $_POST['price'];

     $delete_cart = mysqli_query($con,"DELETE FROM cart WHERE image = '$img'");
     header('Location:med.php');
 }
 ?>