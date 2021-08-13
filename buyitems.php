

<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" type="text/css" href="style.css">
 <title>Buy Items</title>
 
 
 </head>
<body>
<div class="home-box custom-box">
<?php include 'home.php' ?>
 <div id="display_pro">
  <div id="pro_box">
<?php
      $host="localhost";
      $dbusername="root";
      $dbpassword="";
      $dbname="register";
     
      $conn=new mysqli($host, $dbusername, $dbpassword, $dbname);
      
        $sql="SELECT * FROM admin";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)) {
         
          ?>
            
            <form method="post" action="cart.php?id=<?php echo $row["id"]; ?>"  >
         
            <h3><?php echo $row["brand"]; ?></h3>
            <?php echo '<img src="data:image;base64,'.base64_encode($row['image'] ).'" height="200px" width="200px"/>';?><br/>
           <h4 class="text_price"> <?php echo $row["category"]; ?></h4>
            
            <h4 class="text_price">Rs <?php echo number_format($row["price"],2); ?></h4>
            <p> <?php echo $row["description"]; ?></p>
            
    
            <input type="hidden" name="hid_id" value="<?php echo $row["id"]; ?>"/>
             <input type="hidden" name="hid_category" value="<?php echo $row["category"]; ?>"/>
            <input type="hidden" name="hid_brand" value="<?php echo $row["brand"]; ?>"/>
            <input type="hidden" name="hid_price" value="<?php echo  $row["price"]; ?>"/>
            <input type="hidden" name="hid_description" value="<?php echo $row["description"]; ?>"/>
            <input type="submit" name="cart" value="Add to cart" class="btn"/>
            
          </form>
          
          <?php
        }
      }
      ?>

 <?php
  
 ?>

 
 </div>
 </div>
 </div>

       
</body>
</html>