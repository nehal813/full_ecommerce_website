<?php include('../includes/conn.php'); 
include '../functions/functions.php';
@session_start(); 
//include '../header.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css"/>
<title>User Login</title>
</head>
<body><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

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
          <a class="nav-link" href="register.php">Register</a>
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
  </div> <label for="lname"><h4>password</h4></label><br>
    <input type="password" class="" id="pass" name="user_password" placeholder="password..">
</nav>-->

<body>
<style>
    .div2{
        width:99% ;
        height: 55%;
        text-align:center;
        justify-content:center;
        float:center;
    } .imgl{
      width:77%;
    }
    </style>

</ul>

<div class="container-fluid m-3">
<center><h2 class ="text-align-center">User Login</h2></center>
<div class="row d-flex">
<div class="col-lg-5 ">
    <img class="imgl" src='../admin/login.png' class="img-fluid">
</div>
<div  class="col-lg-5 "   class="text-align-center">
  <form action="" method="post"  class="form-control" enctype="multipart/form-data">
    <label for="fname"><h5>user name<h5></label>
    <input type="text" id="username" class="form-control" name="username" placeholder="user name..">

    <label for="lname"><h4>email<h4></label>
    <input type="email" id="email"   class="form-control" name="user_email" placeholder="email..">

   

    <input class="bg-info" type="submit" value="login" name="user_login">

    <p> have no account ! <a href="register.php"> register</a></p>
    <p>return back ! <a href="../index.php"> return</a></p>
  </form>
</div></div></div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>

<?php

if(isset($_POST['user_login'])){
  
  $username=$_POST['username'] ;
 // $user_password =$_POST['user_password'];
 $user_email =$_POST['user_email'];
$user_ip=getIPAddress();  


if(empty($username ) || empty( $user_email)  ){
  echo "<script> alert('please fill all the data')</script>";
//  exit();
}
  $query1="select * from user_table where username='$username' and   user_email='$user_email'  ";
 $result1=mysqli_query($con,$query1);
$num=mysqli_num_rows($result1);

// select cart
$query_cart="select * from cart_details where ip_address='$user_ip'  ";
$result2=mysqli_query($con,$query_cart);
$num_cart=mysqli_num_rows($result2);
$row=mysqli_fetch_assoc($result2);

if($num > 0){
  $_SESSION['username']=$username;
  if($num == 1 && $num_cart ==0){
    $_SESSION['username']=$username;
    echo "<script> alert('You are logged in ,thank you :)')</script>";
    echo "<script> window.open('profile.php','_self')</script>";
  }
  }else{
    $_SESSION['username']=$username;
  
 echo "<script> alert('You are logged in ,thank you :)')</script>";
 echo "<script> window.open('payment.php','_self')</script>";
  }

}else{
  echo "<script> alert('Invalid login')</script>";

}


//include '../footer.php';
//if(password_verify($user_password,$row['user_password'])){
   // print_r( $row['user_password']);