<?php
 $err=False;
 $showerror=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include "partials/conn.php";
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $sqlexists="SELECT * FROM `users` WHERE `user`='$username'";
    $result=mysqli_query($conn,$sqlexists);
    $numrows=mysqli_num_rows($result);

    if($numrows>0){
      $showerror="username already exists";

    }
    else{
      if($password==$cpassword) {
        $sql="INSERT INTO `users` (`slno`, `user`, `password`, `date`) VALUES (NULL, '$username', '$password', current_timestamp())";
        $data=mysqli_query($conn,$sql);
        if($data){
            $err=true;
        } 
    }
else{
   $showerror="password does not match";
    }
  }
   
    

    //checks both the password and for the availability of the same data in database
    
    
    
}
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
</head>
<body>
    <?php
    require "partials/nav.php";
    ?>
    <h1 class="text-center">signup here</h1>
    <?php
    
    
    if($err){ 
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Account created.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
    else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Not submitted</strong> fill the form and submit
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
   }
  
    ?>
    <div class="container ">
    <form action="signup.php" method="post">
  <div class="mb-3 col-3 ">
    <label for="exampleInputEmail1" class="form-label">user name</label>
    <input type="text " name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 col-3  ">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" name="password" class="form-control" id="exampleInputPassword">
  </div>
  <div class="mb-3 col-3 " >
    <label for="exampleInputPassword1" class="form-label">confirm Password</label>
    <input type="text" name="cpassword" class="form-control" id="exampleInputPassword1">
    <div id="emailHelp" class="form-text text-center">verify your password!!</div>
  </div>
  
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>