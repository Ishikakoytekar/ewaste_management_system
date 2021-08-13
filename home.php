<?php 
include('security.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="navbar">
       <ul>
           <li><a href="buyitems.php">Buy Items</a></li>
          
           <li><a href="buy.php">My Orders</a></li>
           <li><a href="cart.php">My cart</a></li>
           <li><a href="home1.php">Home</a></li>
           <li><?php echo $_SESSION['email'];?><li>
           <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>  
   
</body>
</html>
