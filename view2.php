<?php
 $host="localhost";
 $dbusername="root";
 $dbpassword="";
 $dbname="register";
 
 $conn=new mysqli($host, $dbusername, $dbpassword, $dbname);
 
    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="home-box custom-box">
<?php include 'adminhome.php' ?>
 <div id="display_pro">
  <div id="pro_box">
<?php
     
      
     $sql=mysqli_query($conn,"SELECT * FROM admin ");
        while($row = mysqli_fetch_array($sql)) {
          ?>
          
            <form action="remove2.php" method="POST" enctype="multipart/form-data">
         
            <h3><?php echo $row["brand"]; ?></h3>
            <?php echo '<img src="data:image;base64,'.base64_encode($row['image'] ).'" height="200px" width="200px"/>';?><br/>
           <h4 class="text_price"> <?php echo $row["category"]; ?></h4>
            
            <h4 class="text_price">Rs <?php echo $row["price"]; ?></h4>
            <p> <?php echo $row["description"]; ?></p><br>
           <a href="edit.php" class="btn">Edit</a><br><br>
           
           <button type="submit" name="remove" class="btn">Remove</button>
            <input type="hidden" name="hid_id" value="<?php echo $row["id"]; ?>"/>
            <input type="hidden" name="hid_email" value="<?php echo $row["email"]; ?>"/>
           
           
          
          <?php
        }
      
      ?>

 <?php
  
 ?>

</form>     
 </div>
 </div>
 </div>
</body>
</html>