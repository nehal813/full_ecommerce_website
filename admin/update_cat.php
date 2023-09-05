<?php include('../includes/conn.php');

if(isset($_GET['cat_id'])){
  $cat_id=$_GET['cat_id'];

$cat="select * from categories where cat_id=$cat_id ";
$result_cat=mysqli_query($con,$cat);
while($row=mysqli_fetch_assoc($result_cat)){
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];
    echo $cat_id;

}
}
if(isset($_POST['cat_update'])){
 // $cat_id=$_POST['cat_id'];
  $cat_title=$_POST['cat_title'];
  $update="update categories set cat_title='$cat_title' where cat_id=$cat_id";
  $result=mysqli_query($con,$update);
  if($result){

    echo "<script> alert('category is updated ,thank you :)')</script>";
  echo "<script> window.open('view_cat.php','_self')</script>";

  }
  echo "<script> alert('category is not updated ,thank you :)')</script>";
}
//die(mysqli_error($con));
include 'header.php';
?>


<!DOCTYPE html>
<html>
<head>
<title>update</title>
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

<center><h2 class ="text-align-center">update category</h2><p>make sure you fill all data !</p></center>

<div class="div2">
  <form action="" method="post" class="form-control"  enctype="multipart/form-data">
    <label for="fname"><h4>category name<h4></label>
    <input type="text"  class="form-control"  value="<?=$cat_title;?>" name="cat_title">

  

    <input class="bg-info" type="submit" value="update" name="cat_update">
    <p>check more categories ! <a href="view_cat.php"> categories</a></p>
    <p>return back ! <a href="index.php"> return</a></p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>
