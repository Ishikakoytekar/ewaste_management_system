<?php
   //connect database
    $email=filter_input(INPUT_POST,'email');
    $pass=filter_input(INPUT_POST,'pass');
    $pass=MD5($pass);
    $fname=filter_input(INPUT_POST,'fname');
    $lname=filter_input(INPUT_POST,'lname');
    $phone=filter_input(INPUT_POST,'phone');
    $applicant=filter_input(INPUT_POST,'applicant');

    if(!empty($email)){
        if(!empty($pass)){
            $host="localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="register";
            
            $conn=new mysqli($host, $dbusername, $dbpassword, $dbname);

            if(mysqli_connect_error()){
                die('Connect Error('.
                    mysqli_connect_error().')'
            
                );
            }
            else{
                $sql="INSERT INTO user(fname,lname,phone,email,password,applicant)  values('$fname','$lname','$phone','$email', '$pass','$applicant') ";
             
               
                if($conn->query($sql)){
                    echo '<script>alert("registerd successfully")</script>';
                    header("Location: login.php");

                }
                else{
                    echo "error:".$sql ."<br>".$conn->error;
                }
                $conn->close();
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>registration form</title>
    
</head>
<body>

<div class="home-box custom-box">
<div class=inc_nav>
    <?php include 'home1.php' ?></div>
    <div class="home-box custom-box">
    <div class="container">
   
        <h1>Register</h1>
    <form class="form" action="register.php" method="POST" >
        <label>First Name</label>
        <input type="text" name="fname" class="fname" required>
        <label>Last Name</label>
        <input type="text" name="lname" class="lname" required><br>
        <label>Phone no</label>
        <input type="number" name="phone" required><br>
        <label>E-mail</label>
        <input type="email" name="email" required><br>
        <label>Password</label>
        <input type="password" name="pass" required><br>
        <div class="applicant">
        <label>User Type</label>
        <select name="applicant">
        <option>User</option>
        <option>Admin</option>
        </select><br><br>
        </div>
        <button type="submit" class="btn" name="submit">Register</button><br><br>
        <p>
            Already logged in?<a href="login.php">Login</a>
        </p>
    </form>
    </div>
   
<div>
</body>
</html>