<?php
session_start();
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="register";

$conn=new mysqli($host, $dbusername, $dbpassword, $dbname);


if(isset($_POST["cart"])){
  if(isset($_SESSION["e_cart"])){
    $itemarrid=array_column($_SESSION["e_cart"], "item_brand");
    if(!in_array("item_brand",$itemarrid))
    {
        //$count=count($_SESSION["e_cart"]);
        $itemarr=array(
          'item_id'=>$_GET["id"],
          'item_category'=>$_POST["hid_category"],
          'item_brand'=>$_POST["hid_brand"],
          'item_price'=>$_POST["hid_price"],
    
          'item_description'=>$_POST["hid_description"]
        );
        echo '<script>alert("item added")</script>';
        $_SESSION["e_cart"][]=$itemarr;

    }
    else{
        echo '<script>alert("item already exists")</script>';
        header('location:buyitems.php');
    }
  }
  else{
    $itemarr=array(
      'item_id' => $_GET["id"],
      'item_category'=>$_POST["hid_category"],
      'item_brand'=>$_POST["hid_brand"],
      'item_price'=>$_POST["hid_price"],
      'item_description'=>$_POST["hid_description"]
    );
    $_SESSION["e_cart"][]=$itemarr;
  }
}

if(isset($_GET["action"])){
  if($_GET["action"]=="delete"){
     
     foreach($_SESSION["e_cart"] as $keys=>$values){
       if($values["item_id"]==$_GET["id"]){
         unset($_SESSION["e_cart"][$keys]);
         echo '<script>alert("item removed")</script>';
         header('location:cart.php');
       }
   }
 }
 }
 
if(isset($_GET["action"])){
  if($_GET["action"]=="add"){
     
     foreach($_SESSION["e_cart"] as $keys=>$values){
       if($values["item_id"]==$_GET["id"]){
         //unset($_SESSION["e_cart"][$keys]);
         $sqlbuy="insert into `orders`  SELECT * FROM `admin`";
  $result=mysqli_query($conn,$sqlbuy);
  if($result){
    echo '<script>alert("uploaded")</script>';
    header('location:buy.php');
  }
  else{
    echo '<script>alert("not uploaded")</script>';
    header('location:buy.php');
  }
}
 }      
 }
 }

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> cart</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>

<div class="container">
<table>
      <thead>
        <tr>
        
          <th>category</th>
          <th width=150px>brand</th>
          <th>price</th>
          <th>description</th>
          <th colspan="2" width=100px >Action</th>
        </tr>
      <thead>
      <?php
     // var_dump($_SESSION['e_cart']);
        if(!empty($_SESSION["e_cart"])){
          
          foreach($_SESSION["e_cart"] as $keys => $values)
          {
          ?>
              <tr>
                <form action="cart.php" method="post">
             
               <td><?php echo $values["item_category"]; ?></td>
            <td><?php echo $values["item_brand"]; ?></td>
            <td>Rs <?php echo number_format($values["item_price"],2); ?></td>
            <td><?php echo $values["item_description"]; ?></td>
           
            <td><a href="cart.php?action=add&id=<?php echo $values["item_id"]; ?>" class="btn"><span>Buy</span></a></td>
            <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="btn"><span>Remove</span></a></td>
           
            </tr>
            <?php
          }
        
       }
       ?>
     </form>
</table>

</div>  

</body>
</html>
