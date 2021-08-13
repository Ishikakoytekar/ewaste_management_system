<?php
session_start();
 $host="localhost";
 $dbusername="root";
 $dbpassword="";
 $dbname="register";
 
 $conn=new mysqli($host, $dbusername, $dbpassword, $dbname);

    if(isset($_POST['login'])){
       
        $email=filter_input(INPUT_POST,'email');
        $pass=filter_input(INPUT_POST,'pass');
        $pass=MD5($pass);
        $sql="SELECT * FROM user WHERE email='$email' AND password='$pass'";
        $result=mysqli_query($conn,$sql);
        $applicant=mysqli_fetch_array($result);
        
        if($applicant['applicant']=="Admin"){
            $_SESSION['email']=$email;
            echo '<script>alert("you are logged in successfully")</script>';
            header('location:adminhome.php');
        }
        else if($applicant['applicant']=="User"){
            $_SESSION['email']=$email;
            echo '<script>alert("you are logged in successfully")</script>';
            header('location:userhome.php');
        }
        else{
            echo '<script>alert("log in fail")</script>';
            header('location:login.php');
        }
           
}

        
 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="home-box custom-box">
<?php include 'home1.php' ?>
<div class="container">
    <h1>Login</h1>
    <form class="form" action="login.php" method="POST" >
       
       <label>E-mail</label>
       <input type="email" name="email" required><br><br>
       <label>Password</label>
       <input type="password" name="pass" required><br><br>
       <button type="submit" class="btn" name="login">Login</button><br><br>
      
       register first<a href="index1.php">Register</a>
        </p>
    </form>
</div>
</div>
</body>
</html>