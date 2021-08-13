<?php
session_start();  
  if(isset($_POST["logout"])){
    session_destroy();
    unset($_SESSION['email']);
   header('location:login.php');
    
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="logout.php" method="POST" >

<button type="submit" name="logout" class="btn">Logout</button><br>

</form> 
</body>
</html>
