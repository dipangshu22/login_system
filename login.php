<?php

$login=False;
$showerror=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include "partials/conn.php";
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql="SELECT * FROM users where user='$username' AND password='$password'";
    $data=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($data);
    
    if($num==1){
      $login=true;
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$username;
      header("location:welcome.php");

    
    }
    else{
      $showerror=true;
    }  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
    require "partials/nav.php";
    if($login){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>you are logged in</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if($showerror){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>you are not logged</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    
    <h1 class="text-center">login here</h1>
    <div class="container ">
    <form action="login.php" method="post">
  <div class="mb-3 col-3 ">
    <label for="exampleInputEmail1" class="form-label">user name</label>
    <input type="text " name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 col-3  ">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  
  <button type="submit" class="btn btn-primary">login</button>
</form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>