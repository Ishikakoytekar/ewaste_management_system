<?php
    
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="register";
   
    $conn=new mysqli($host, $dbusername, $dbpassword, $dbname);
    if(isset($_POST['upload'])){
      $file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $category=filter_input(INPUT_POST,'category');
      $brand=filter_input(INPUT_POST,'brand');
      $price=filter_input(INPUT_POST,'price');
      $description=filter_input(INPUT_POST,'description');
      $email=filter_input(INPUT_POST,'email');
      $address=filter_input(INPUT_POST,'address');
       
      $sql="INSERT INTO admin(image,category,brand,price,description,email,address)VALUES('$file','$category','$brand','$price','$description','$email','$address')";
      $result=mysqli_query($conn,$sql);
      if($result){
        echo '<script>alert("uploaded successfully")</script>';
       
      }
     else{
        echo '<script>alert("not uploaded ")</script>';
     }

    }
    

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sell items</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="home-box custom-box">
   
<?php include 'adminhome.php' ?>
<div class="container">
    <h2>Upload product details</h2>
    <form action="sellitems.php" method="POST" enctype="multipart/form-data" >
   
        
         <label>upload image</label>
        <input type="file" name="image"><br>
        <label>Category</label>
        <select name="category">
            <option>Laptop</option>
            <option>Mobile</option>
            <option>TV</option>
            <option>Other</option>
        </select><br>
        <label>Brand Name</label>
        <input type="text" name="brand"><br>
        <label>Price</label>
        <input type="text" name="price"><br>
        <textarea name="description" placeholder="write something about product"></textarea><br>
        <label>Contact Details</label><br>
        <label>E-mail</label>
        <input type="email" name="email" required><br>
        <textarea name="address" placeholder="address"></textarea><br>
        <input type="submit" name="upload" value="upload" >
    </form>
    </div>
    </div>
</body>
</html>