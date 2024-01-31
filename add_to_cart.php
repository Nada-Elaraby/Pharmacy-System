<?php
 $con = mysqli_connect("localhost","root","","pharmacy");
 if($_SERVER['REQUEST_METHOD'] =="POST" )
 {
     $img = $_POST['img'];
     $name = $_POST['name'];
     $tbrand = $_POST['typebrand'];
     $price = $_POST['price'];
     $qauntity = 1;

     $select_cart = mysqli_query($con,"SELECT * FROM cart WHERE image = '$img'");
     if(mysqli_num_rows($select_cart) > 0) {
        $rows = mysqli_fetch_assoc($select_cart);
        $quantity = $rows['qauntity'] + 1;
        $price = $rows['price'] * $quantity;
    
        // Use different quotes for the array key inside the string
        $update_product = mysqli_query($con, "UPDATE `cart` SET qauntity = '$quantity', price = '$price' WHERE image = '{$rows['image']}'");
    
        echo '<script>alert("Added to cart successfully!");</script>';
        echo '<script>window.location.href = "med.php";</script>';
    }else{
        $insert_product = mysqli_query($con, "INSERT INTO cart (name, price, image, qauntity, tbrand) VALUES ('$name','$price','$img','$qauntity','$tbrand')");
        echo '<script>alert("Added to cart successfully!");</script>';
        echo '<script>window.location.href = "med.php";</script>';
    }
 }
 ?>