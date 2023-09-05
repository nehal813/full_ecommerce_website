<?php include('../includes/conn.php');

if(isset($_GET['pay_id'])){
  $pay_id=$_GET['pay_id'];

$cat="select * from user_pay where pay_id=$pay_id ";
$result_cat=mysqli_query($con,$cat);
while($row=mysqli_fetch_assoc($result_cat)){
   // $cat_id=$row['cat_id'];
    $pay_mode=$row['pay_mode'];
 

}
}

if(isset($_POST['pay_delete'])){
 // $cat_id=$_POST['cat_id'];
  //$cat_title=$_POST['cat_title'];
  $delete="delete from user_pay where pay_id=$pay_id";
  $result=mysqli_query($con,$delete);
  if($result){

    echo "<script> alert('payment is deleted ,thanks :)')</script>";
  echo "<script> window.open('index.php','_self')</script>";

  }
  echo "<script> alert('payment is not deleted:)')</script>";
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

<center><h2 class ="text-align-center">delete payment</h2><p>make sure you want delete this data !</p></center>

<div class="div2">
  <form action="" method="post" class="form-control"  enctype="multipart/form-data">
    <label for="fname"><h4>payment mode<h4></label>
    <input type="text"  class="form-control"  value="<?=$pay_mode;?>" name="mode">

  

    <input class="bg-danger" type="submit" value="delete" name="pay_delete">
    <p>check more products ! <a href="view_pro.php"> products</a></p>
    <p>return back ! <a href="index.php"> return</a></p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>
