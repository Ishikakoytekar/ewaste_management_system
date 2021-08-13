<?php
    
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="register";
   
    $conn=new mysqli($host, $dbusername, $dbpassword, $dbname);
    if(isset($_POST['update'])){
        $pid=$_POST['id'];
      //  $pemail=$_SESSION['email'];
   
      
      $sql="UPDATE admin SET category='$_POST[category]', brand='$_POST[brand]', price='$_POST[price]', description='$_POST[description]'  WHERE category='$_POST[category]' " ;
      $result=mysqli_query($conn,$sql);
      if($result){
        echo '<script>alert("updated successfully")</script>';
       
      }
    //}
     else{
        echo '<script>alert("not updated ")</script>';
     }

    }
    

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><div class="home-box custom-box">
<?php include 'adminhome.php' ?>
 <div id="display_pro">
  <div id="pro_box">

<form action="edit.php" method="POST" enctype="multipart/form-data" >
   
<input type="hidden" name="id">
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
  
  
  <input type="submit" name="update" value="update" >

</form>
</div>
</div>
</div>
</body>
</html>