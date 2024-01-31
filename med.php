<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine page</title>

<!--google font-->
<link href= "https://fonts.googleapis.com/css2?family=Andika&
display=swap" rel="stylesheet">
<!--google font-->

<!--library-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--library-->

    <!--link for css file-->
    <link rel="stylesheet" type="text/css" href="med.css">
     <!--link for css file-->
     <style>
        .fa-trash
        {
    display: inline-block;
    position: relative;
    margin: 5px;
    background: rgb(74, 137, 74);
    color: #0f0f0f;
    font-size: 1.5em;
    font-family: 'georgia',serif;
    font-style: italic;
    border-radius: 50px;
    padding: 8px 8px;
    -maz-transition: all 0.2s;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
    padding-right: 10px;
    text-align: center;
    transition: 0.4s ease;
    left: 80%;
}
        .my-button{
    display: inline-block;
    margin: 5px;
    background: rgb(74, 137, 74);
    color: #0f0f0f;
    font-size: 1.5em;
    font-family: 'georgia',serif;
    font-style: italic;
    border-radius: 50px;
    padding: 8px 8px;
    -maz-transition: all 0.2s;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
    padding-right: 10px;
    text-align: center;
    transition: 0.4s ease;
    width:100%;
}
     .my-button:hover{
    color: #c1e1e0;
    background: rgb(24, 41, 24);
    transform: scale(1.1);
    }
</style>
</head>
<body>
<!--header-->
<header class="header">
    <a href="#" class="logo">
        <img src="NicePng_medical-logo-png_8601597.png">
    </a>
    <!--nav bar-->
    <nav class= "headbar">
        <a href="login.php">Login</a>
        <a href="index.html">Home</a>
        <a href="Doc page.html">Doctors</a>
        <a href="med.php">Medicine</a>
        <a href="about us.html">About Us</a>
        <a href=#contact>Contact</a>
    </nav>
    <!--nav bar-->

    <div class= "menubtn">
     <button>Log Out</button>
</div>

    <!--icon-->
    <div class="icon">
        <div class="fa fa-search" id="search-btn"><img href="search_482631.png"></div>
        <div class="fa fa-shopping-cart" id="cart-btn"></div>
        <div class="fa fa-upload" id="up-btn"></div>
    </div>
    <!--icon-->

   
    <div class="shopping-cart">
    <?php
            $con = mysqli_connect("localhost","root","","pharmacy");
            $select_products = mysqli_query($con, "SELECT * FROM cart");
            $total = 0;
            if(mysqli_num_rows($select_products) > 0)
            {
                while($fetch_product = mysqli_fetch_assoc($select_products)){
                    $total = $total + $fetch_product['price'];
        ?>
                <form action = "delete_product.php" method ="post">
                <div class="box">
                <input type = "hidden" name = "img" value = "<?php echo $fetch_product['image'] ?>">
                    <img src = "uploaded_img/<?php echo $fetch_product['image']; ?>" alt = "">
                    <div class="content">
                        <input type = "hidden" name = "price" value = "<?php echo $fetch_product['price'] ?>">
                        <h3><?php echo $fetch_product['tbrand']; ?></h3>
                        <span style = "font-size: 1rem" class="price"><?php echo "price: ".$fetch_product['price'].'$' ?></span>
                        <span style = "font-size: 1rem" class="price"><?php echo "Quantity: ".$fetch_product['qauntity'].' pieces' ?></span>
                    </div>
                </div>
                <input type = "submit" value = 'Delete' class = "fa-trash">
                </form>
        
    <?php
            };
       };
    ?>
         <h1 style = "background: black; color:white; font-size: 2rem;"><?php echo " Total:  ".$total; ?></h1>
    </div>

</header>
<!--header--> 

<!--cosmetics section-->
<section class="cards" id="sections">
    <!--title--> 
    <div class="container">
        <h1 class="heading">Cosmetics</h1><hr>
    </div>
    <div class="content">
        <?php
            $con = mysqli_connect("localhost","root","","pharmacy");
            $select_products = mysqli_query($con, "SELECT *FROM drug WHERE cosmetics = 1");
            if(mysqli_num_rows($select_products) > 0)
            {
                while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
            <form action = "add_to_cart.php" method = "post" style = "display: inline-block">
                    <div class="card">
                        <div class="slide-img">
                        <input type = "hidden" name = "img" value = "<?php echo $fetch_product['Photo'] ?>">
                        <img src = "uploaded_img/<?php echo $fetch_product['Photo']; ?>" alt = "">
                        <!--overlay-->
                            <div class="overlay">
                        <!--learn-btn-->
                                <input type = "hidden" name = "name" value = "<?php echo $fetch_product['Name'] ?>">
                                <p><?php echo $fetch_product['Name'] ?></p>
                                <a href="#" class="learn-btn">Learn More</a>
                            </div>
                        <!--overlay-->
                        </div>
                        <!--title-->
                        <input type = "hidden" name = "typebrand" value = "<?php echo $fetch_product['Type'].' '.$fetch_product['brand'] ?>">
                        <h2 class="title"><?php echo $fetch_product['Type'].' '.$fetch_product['brand'] ?></h2>
                            <!--star-->
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                        </div>
                            <!--star-->
                            <!--description-->
                                
                            <!--price-->
                        <input type = "hidden" name = "price" value = "<?php echo $fetch_product['Cost_Price'] ?>">
                        <a href="#" class="price"><?php echo $fetch_product['Cost_Price'].'$' ?></a>
                            <!--price-->
                            <!--button-->
                        <input class="my-button" type = "submit" value ="Add to cart">
                            <!--button-->
                        <!--detail box-->
                    </div>
                </form>
        <?php
                };
            };
        ?>
    </div>
     </section>
<!--cosmetics section-->


<!--medicine section-->
<section class="cards" id="sections">
    <!--title--> 
    <div class="container">
        <h1 class="heading">Medicine</h1><hr>
    </div>
    
    <div class="content">
    <?php
            $con = mysqli_connect("localhost","root","","pharmacy");
            $select_products = mysqli_query($con, "SELECT *FROM drug WHERE cosmetics = 1");
            if(mysqli_num_rows($select_products) > 0)
            {
                while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
            <form action = "add_to_cart.php" method = "post" style = "display: inline-block">
                    <div class="card">
                        <div class="slide-img">
                        <img src = "uploaded_img/<?php echo $fetch_product['Photo']; ?>" alt = "">
                        <!--overlay-->
                            <div class="overlay">
                        <!--learn-btn-->
                                <input type = "hidden" name = "name" value = "<?php echo $fetch_product['Name'] ?>">
                                <p><?php echo $fetch_product['Name'] ?></p>
                                <a href="#" class="learn-btn">Learn More</a>
                            </div>
                        <!--overlay-->
                        </div>
                        <!--title-->
                        <input type = "hidden" name = "typebrand" value = "<?php echo $fetch_product['Type'].' '.$fetch_product['brand'] ?>">
                        <h2 class="title"><?php echo $fetch_product['Type'].' '.$fetch_product['brand'] ?></h2>
                            <!--star-->
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                        </div>
                            <!--star-->
                            <!--description-->
                                
                            <!--price-->
                        <input type = "hidden" name = "price" value = "<?php echo $fetch_product['Cost_Price'] ?>">
                        <a href="#" class="price"><?php echo $fetch_product['Cost_Price'].'$' ?></a>
                            <!--price-->
                            <!--button-->
                        <input class="my-button" type = "submit" value ="Add to cart">
                            <!--button-->
                        <!--detail box-->
                    </div>
                </form>
        <?php
                };
            };
        ?>
    </div>
</section>
<!--medicine section-->

<!--footer-->
<footer class="footer">
  
    <h1>Contact Us</h1>
     <!--contact-->
 <section class="cards-contact" id="contact">
     
     <div class="content">
     <div class="card-inf">
        <div class="icon-contect">
            <i class="fa fa-phone"></i>
        </div>
     <div class="info">
        <h3>Phone</h3>
        <p> Hotline :12746<br>
          
        </p>
        <a href="#" class="click-me">click-me</a>
    </div>
    </div>
 
     <div class="card-inf">
        <div class="icon-contect">
            <i class="fa fa-envelope"></i>
        </div>
        <div class="info">
            <h3>Email</h3>
            <p>read&learn@gmail.com</p>
            <a href="#" class="click-me">click-me</a>
        </div>
        </div>
    </div>
 
 </section>
 <!--contact-->
 
     <div class="icon-foot">
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-google"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        </div>
 </footer>
 <!--footer-->

<!--link for js file-->
<script type="text/javascript" src="med.js"></script>
<!--link for js file-->
</body>
</html>