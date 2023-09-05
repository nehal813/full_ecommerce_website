<?php include('../includes/conn.php'); 
include '../functions/functions.php';
@session_start(); 
//include '../header.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css"/>
<title>admin Login</title>
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


          
<body>
<style>
    .div2{
        width:99% ;
        height: 55%;
        text-align:center;
        justify-content:center;
        float:center;
    }
    .imgl{
      width:77%;
    }
    </style>

</ul>
<div class="container-fluid m-3">
<center><h2 class ="text-align-center">Admin Login</h2></center>
<div class="row d-flex">
<div class="col-lg-5 ">
    <img class="imgl" src='./login.png' class="img-fluid">
</div>

<div class="col-lg-5 " class="text-align-center">
  <form action="" method="post"  class="form-control" enctype="multipart/form-data">
    <label for="fname"><h5> name<h5></label>
    <input type="text" id="username" class="form-control" name="name" placeholder="user name..">

    <label ><h4>email<h4></label>
    <input type="email"   class="form-control" name="email" placeholder="email..">

   

    <input class="bg-info" type="submit" value="login" name="admin_login">

    <p> have no account ! <a href="admin_register.php"> register</a></p>
    <p>return back ! <a href="index.php"> return</a></p>
  </form>
</div>
</div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>

<?php

if(isset($_POST['admin_login'])){
  
  $name=$_POST['name'] ;
 // $user_password =$_POST['user_password'];
 $email =$_POST['email'];
$user_ip=getIPAddress();  


if(empty($name ) || empty( $email)  ){
  echo "<script> alert('please fill all the data')</script>";
//  exit();
}
  $query1="select * from admin_table where name='$name' and  email='$email'  ";
 $result1=mysqli_query($con,$query1);
$num=mysqli_num_rows($result1);

if($num > 0){
  $_SESSION['name']=$name;
  if($num == 1 ){
    $_SESSION['name']=$name;
    echo "<script> alert('You are logged in ,thank you :)')</script>";
    echo "<script> window.open('index.php','_self')</script>";
  }


}else{
  echo "<script> alert('Invalid login')</script>";

}}
