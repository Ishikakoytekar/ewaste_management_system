<?php 
include('security.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <div id="navbar">
    <ul>
           <li><a href="sellitems.php">Add Items</a></li>
           <li><a href="view2.php">Show Items</a></li>
          
           <li><a href="home1.php">Home</a></li>
           <?php echo $_SESSION['email'];?>
           <li><a href="logout.php">Logout</a></li>
        </ul>
        </ul>
    </div>  

</body>
</html>