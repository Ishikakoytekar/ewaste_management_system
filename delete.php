<?php



$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="register";

$conn=new mysqli($host, $dbusername, $dbpassword, $dbname);
$sql=mysqli_query($conn,"SELECT * FROM admin ");
 $row=mysqli_fetch_array($sql);
if(isset($_POST['submit'])){
  // $email=$_POST['hid_email'];
   $pid=$_POST['hid_id'];
   $sqlcheck=mysqli_query($conn,"SELECT * FROM admin WHERE id='$pid'");
 
   
  
   if(mysqli_num_rows($sqlcheck)>0){
     //$row=mysqli_fetch_assoc($sqlcheck);
     //$_SESSION['email']=$row->email;
     //if($row->email==$email){
 
 
     $sqldelete=mysqli_query($conn,"DELETE  FROM admin WHERE id='$pid' ");
     
     if($sqldelete){
     echo '<script>alert("item deleted")</script>';
     header('location:view.php');
     }
   }
 
   }
   else{
     echo '<script>alert("item does not exists")</script>';
     header('location:view.php');
   }
 
 
 
 ?>
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   

</head>
<body>
<div class="home-box custom-box">
<?php include 'adminhome.php' ?>
 <div id="display_pro">
  <div id="pro_box">
<?php
     
      
       
        while($row = mysqli_fetch_array($sql)) {
          ?>
            <div class="col-md-4">
            <form action="delete.php" method="POST" enctype="multipart/form-data">
         
            <h3><?php echo $row["brand"]; ?></h3>
            <?php echo '<img src="data:image;base64,'.base64_encode($row['image'] ).'" height="200px" width="200px"/>';?><br/>
           <h4 class="text_price"> <?php echo $row["category"]; ?></h4>
            
            <h4 class="text_price">Rs <?php echo $row["price"]; ?></h4>
            <p> <?php echo $row["description"]; ?></p><br>
           <a href="edit.php" id="editbtn">Edit</a><br>
           
            <button type="submit" class="btn" name="submit" >Remove</button><br>
            <input type="hidden" name="hid_id" value="<?php echo $row["id"]; ?>"/>
            <input type="text" name="hid_email" value="<?php echo $row["email"]; ?>"/>
           
            </div>
          
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