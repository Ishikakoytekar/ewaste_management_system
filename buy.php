
<?php

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="register";

$conn=new mysqli($host, $dbusername, $dbpassword, $dbname);

   // $pid=$_GET['id'];
    //$sql="DELETE FROM orders WHERE id='$pid'";
    //$result=mysqli_query($conn,$sql);
    //if($result){
        
    //echo '<script>alert("order cancelled")</script>';
    //header('location:buy.php');
    //}
    //else{
        
    //echo '<script>alert("you can not cancel")</script>';
    //header('location:buy.php');
    //}
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buy</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="home-box custom-box">
<?php include 'userhome.php' ?>
 <div id="display_pro">
  <div id="pro_box">
<?php
    
    
     $sql=mysqli_query($conn,"SELECT * FROM orders ");
      
       
        while($row = mysqli_fetch_array($sql)) {
          ?>
            
            
         
            <h3><?php echo $row["brand"]; ?></h3>
            <?php echo '<img src="data:image;base64,'.base64_encode($row['image'] ).'" height="200px" width="200px"/>';?><br/>
           <h4 class="text_price"> <?php echo $row["category"]; ?></h4>
            
            <h4 class="text_price">Rs <?php echo $row["price"]; ?></h4>
            <p> <?php echo $row["description"]; ?></p><br>
           <label>Owner Contact Details</label> 
           <p> <?php echo $row["email"]; ?></p><br>
           <p> <?php echo $row["address"]; ?></p><br>
            <button type="submit" class="btn" name="cancel" >Cancel</button><br>
         
            <input type="hidden" name="hid_id" value="<?php echo $row["id"]; ?>"/>
          
           
            </div>
          
          <?php
        }
      
      ?>

 <?php
  
 ?>

   
 </div>
 </div>
 </div> 
</body>
</html>