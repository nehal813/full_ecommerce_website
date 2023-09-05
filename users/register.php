<?php include('../includes/conn.php'); 
include '../functions/functions.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>user  registeration</title>
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


</ul>-->


<center><h2 class ="text-align-center">User registeration</h2></center>

<div class="div2">
  <form action="" method="post" class="form-control"  enctype="multipart/form-data">
    <label for="fname"><h4>user name<h4></label>
    <input type="text" id="username" class="form-control" name="username" placeholder="user name..">

    <label for="lname"><h4>email<h4></label>
    <input type="email" id="email" class="form-control" name="user_email" placeholder="email..">

    <label for="lname"><h4>password</h4></label><br>
    <input type="password" class="form-control" id="pass" name="user_password" placeholder="password..">
    <br>
    <label for="lname"><h4>password confirm</h4></label><br>
    <input type="password" class="form-control"  name="pass_confirm" placeholder="password confirm..">
    

<div class="form-outline mb-4 w-50 ">
    <label for="lname" class="form-label" > user image </label>
    <input type="file" id="img"  class="form-control "name="user_img" placeholder="..">
</div>
<label for="lname"><h4>user address</h4></label>
    <input type="text" id="address" name="user_address" class="form-control" placeholder="address..">

    <label for="lname"><h4>user mobile</h4></label>
    <input type="text" id="lname" name="user_mobile"  class="form-control" placeholder="contact field..">


    <input class="bg-info" type="submit" value="register" name="user_register">
    <p>Already have an account ! <a href="user_login.php"> login</a></p>
    <p>return back ! <a href="../index.php"> return</a></p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>
<style>
    .div2{
        width:99% ;
        height: 55%;
        text-align:center;
        justify-content:center;
        float:center;
    }
    </style>
</body>
</html>

<?php

if(isset($_POST['user_register'])){
    //$user_id=$_POST['user_id'];
    $username=$_POST['username'] ;
    $user_email =$_POST['user_email'];
    $user_password =$_POST['user_password'];
    $pass_hash=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_password =$_POST['pass_confirm'];
    //$user_img =$_POST['user_img']	;
     $user_ip =getIPAddress();  
    $user_address =$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];

    //|| empty($conf_password)
    // accessing images
    $user_img=$_FILES['user_img']['name'];
   
    //accessing temp img
    $temp_img1=$_FILES['user_img']['tmp_name'];
   
    //check empty value
   if(empty($username )  || empty( $user_email)  ||  empty( $user_password) 
     || empty(  $user_address) || empty( $user_mobile)  || empty( $user_img)  ){
        echo "<script> alert('please fill all the data')</script>";
      //  exit();
    }elseif($user_password  != $conf_password ){
      echo "<script> alert('passwords are not the same')</script>";
     
    }else{
    move_uploaded_file($temp_img1,"./user_imgs/$user_img");
    
    // selsct
    
   $query1="select * from user_table where user_email='$user_email' or username='$username'   ";
    $result1=mysqli_query($con,$query1);
  $num=mysqli_num_rows($result1);
  if($num > 0){
    echo "<script> alert('this user has been added before')</script>";
    /*
    }elseif($user_password  != $conf_password ){
      echo "<script> alert('passwords are not the same')</script>";
     */
    }else{
    $query="insert into user_table ( username,user_email ,user_password ,user_img ,user_ip,user_address,user_mobile)
    values ('$username','$user_email',' $pass_hash ','$user_img', ' $user_ip','$user_address','$user_mobile')";
    $result=mysqli_query($con,$query);
    if($result){
      
      echo "<script> alert('data has been added successfully')</script>";
  

  }else{
   
    echo "<script> alert('something went wrong ! please repeat again ')</script>";

  }
  //select crt items

$select ="select * from cart_details where ip_address='$user_ip'";

$result=mysqli_query($con,$select);
$num=mysqli_num_rows($result);
if($num > 0){
  $_SESSION['username']=$username;
  echo "<script> alert('this cart has items')</script>";
 
    echo "<script> window.open('checkout.php','_self')</script>";
 } else{
  echo "<script> window.open('../index.php','_self')</script>";
    }
  
}
    }
}
