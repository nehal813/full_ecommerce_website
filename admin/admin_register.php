<?php include('../includes/conn.php'); 
include '../functions/functions.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>admin registeration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
   <!-- <link rel="stylesheet" href="../main.css"/>-->

<body>
<!--
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img class="navbar-brand" src="shop.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_login.php">login</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" 
          aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      
      </ul>
      <form class="d-flex" action="search_pro.php" method="get" role="search">

        
        <input class="form-control me-2" type="search" name="search_name" placeholder="Search" aria-label="Search">
        <input class="bg-info px-3 py-2 border-0 " type="submit" name="search" value="search">
      </form>
    </div>
  </div>
</nav>
<label for="lname"><h4>user ip</h4></label>
    <input type="text"  name="user_ip" placeholder="product pricefiles">

admin-
</ul>-->

<div class="container-fluid m-3">
<center><h2 class ="text-align-center">admin registeration</h2></center>
<div class="row d-flex">
<div class="col-lg-6 ">
    <img class="imgr" src='./register.png' class="img-fluid">
</div>

<div class="col-lg-6 "  class="text-align-center" >
  <form action="" method="post" class="form-control"  enctype="multipart/form-data">
    <label for="fname"><h4>name<h4></label>
    <input type="text" id="username" class="form-control" name="name" placeholder="admin name..">

    <label for="lname"><h4>email<h4></label>
    <input type="email" id="email" class="form-control" name="email" required="required" placeholder="email..">

    <label for="lname"><h4>password</h4></label><br>
    <input type="password" class="form-control" id="pass" name="password" required="required" placeholder="password..">
    <br>
    <label for="lname"><h4>password confirm</h4></label><br>
    <input type="password" class="form-control"  name="pass_confirm" placeholder="password confirm..">

    <input class="bg-info" type="submit" value="register" name="admin_register">
    <p>Already have an account ! <a href="admin_login.php"> login</a></p>
    <p>return back ! <a href="index.php"> return</a></p>
  </form>
</div></div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>
<style>
    .imgr{
        width:66%;
        
    }
    
    </style>
</body>
</html>

<?php

if(isset($_POST['admin_register'])){
  //  $admin_id=$_POST['admin_id'];
    $name=$_POST['name'] ;
    $email =$_POST['email'];
    $password =$_POST['password'];
    $pass_hash=password_hash($password,PASSWORD_DEFAULT);
    $conf_password =$_POST['pass_confirm'];
    //$user_img =$_POST['user_img']	;
     $user_ip =getIPAddress();  

    //|| empty($conf_password)
   
    //check empty value
  if(empty($username )  || empty( $email)  ||  empty( $password)  ){
        echo "<script> alert('please fill all the data')</script>";
      //  exit();
    }elseif($password  != $conf_password ){
      echo "<script> alert('passwords are not the same')</script>";
     
    }else{
    //move_uploaded_file($temp_img1,"./user_imgs/$user_img");
    
    // selsct
    
   $query1="select * from admin_table where email='$email' or name='$name'   ";
    $result1=mysqli_query($con,$query1);
  $num=mysqli_num_rows($result1);
  if($num > 0){
    echo "<script> alert('this user has been added before')</script>";
    /*
    }elseif($user_password  != $conf_password ){
      echo "<script> alert('passwords are not the same')</script>";
     */
    }else{
    $query="insert into admin_table ( name,email ,password )
    values ('$name','$email',' $pass_hash')";
    $result=mysqli_query($con,$query);
    if($result){
      
      echo "<script> alert('data has been added successfully')</script>";
  

  }else{
   
    echo "<script> alert('something went wrong ! please repeat again ')</script>";

  }

}
    }
}
