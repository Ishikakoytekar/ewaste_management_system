<?php
session_start();
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="register";

$conn=new mysqli($host, $dbusername, $dbpassword, $dbname);
if(isset($_POST['remove'])){
$pid=$_POST['hid_id'];
//$pemail=$_POST['hid_email'];
$pemail=$_SESSION['email'];

$sqlcheck=mysqli_query($conn,"SELECT * FROM admin WHERE id='$pid' ");

if(mysqli_num_rows($sqlcheck)>0){
    
    $sqldelete=mysqli_query($conn,"DELETE  FROM admin WHERE id='$pid' AND email='$pemail'  ");
    if($sqldelete){
      
    echo '<script>alert("item deleted")</script>';
    header('location:view2.php');
    }
  
  else {
    echo '<script>alert("you can not delete")</script>';

    header('location:view2.php');
  }

}

}
  else{
    echo '<script>alert("item does not exists")</script>';
    header('location:view2.php');
  }


?>