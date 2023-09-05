<?php include('../includes/conn.php');

if(isset($_GET['user_id'])){
  $user_id=$_GET['user_id'];

$cat="select * from user_table where user_id=$user_id ";
$result_cat=mysqli_query($con,$cat);
while($row=mysqli_fetch_assoc($result_cat)){
   
    $username=$row['username'];
    $user_email=$row['user_email'];
$user_img=$row['user_img'];
$user_address=$row['user_address'];
$user_mobile=$row['user_mobile'];




}
}

if(isset($_POST['user_delete'])){
 // $cat_id=$_POST['cat_id'];
  //$cat_title=$_POST['cat_title'];
  $delete="delete from user_table where user_id=$user_id";
  $result=mysqli_query($con,$delete);
  if($result){

    echo "<script> alert('user is deleted ,thanks :)')</script>";
  echo "<script> window.open('index.php','_self')</script>";

  }
  echo "<script> alert('user is not deleted:)')</script>";
}
//die(mysqli_error($con));
include 'header.php';
?>


<!DOCTYPE html>
<html>
<head>
<title>delete</title>
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

.div2{
        width:100% ;
        height: 75%;
        text-align:center;
        justify-content:center;
        float:right;
    }
</style>

<body>

<center><h2 class ="text-align-center">delete user</h2><p>make sure you want delete this data !</p></center>

<div class="div2">
  <form action="" method="post" class="form-control"  enctype="multipart/form-data">
    <label for="fname"><h4>username<h4></label>
    <input type="text"  class="form-control"  value="<?=$username;?>" name="name">

    <label for="fname"><h4>email<h4></label>
    <input type="text"  class="form-control"  value="<?=$user_email;?>" name="email">


    <input class="bg-danger" type="submit" value="delete" name="user_delete">
    <p>check more products ! <a href="view_pro.php"> products</a></p>
    <p>return back ! <a href="index.php"> return</a></p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>
