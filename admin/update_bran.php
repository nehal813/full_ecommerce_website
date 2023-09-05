<?php include('../includes/conn.php');

if(isset($_GET['bran_id'])){
  $bran_id=$_GET['bran_id'];

$bran="select * from brands where bran_id=$bran_id ";
$result1=mysqli_query($con,$bran);
while($row=mysqli_fetch_assoc($result1)){
    $bran_id=$row['bran_id'];
    $bran_title=$row['bran_title'];
   // echo $cat_id;

}
}
if(isset($_POST['bran_update'])){
 // $cat_id=$_POST['cat_id'];
 $bran_title=$_POST['bran_title'];
  $update="update brands set bran_title='$bran_title' where bran_id=$bran_id";
  $result=mysqli_query($con,$update);
  if($result){

    echo "<script> alert('brand is updated ,thank you :)')</script>";
  echo "<script> window.open('view_bran.php','_self')</script>";

  }
  echo "<script> alert('brand is not updated ,thank you :)')</script>";
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

<center><h2 class ="text-align-center">update brand</h2><p>make sure you fill all data !</p></center>

<div class="div2">
  <form action="" method="post" class="form-control"  enctype="multipart/form-data">
    <label for="fname"><h4>brand name<h4></label>
    <input type="text"  class="form-control"  value="<?=$bran_title;?>" name="bran_title">

  

    <input class="bg-info" type="submit" value="update" name="bran_update">
    <p>check more brands ! <a href="view_bran.php"> brands</a></p>
    <p>return back ! <a href="index.php"> return</a></p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>
