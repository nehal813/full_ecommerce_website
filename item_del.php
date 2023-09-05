<?php include('./includes/conn.php');

if(isset($_GET['pro_id'])){
  $pro_id=$_GET['pro_id'];

echo $pro_id;

$pro="select * from products where pro_id=$pro_id ";
$result=mysqli_query($con,$pro);
while($row=mysqli_fetch_assoc($result)){
    $pro_id=$row['pro_id'];
    $pro_title=$row['pro_title'];
    //echo $cat_id;

}}
  global $con;
if(isset($_POST['item_delete'])){

  $delete="delete from cart_details  where product_id =$pro_id  ";
$result2=mysqli_query($con,$delete);
if($result2){
    echo "<script> alert('item is deleted ,thanks :)')</script>";
    echo "<script> window.open('index.php','_self')</script>";
  
}else{
    echo "<script> alert('item is not deleted ,thanks :)')</script>";
echo "<script>window.open('index.php','_self')</script>";

}
}

//die(mysqli_error($con));*/
//include 'header.php';
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

<center><h2 class ="text-align-center">delete item</h2><p>make sure you want delete this data !</p></center>

<div class="div2">
  <form action="" method="post" class="form-control"  enctype="multipart/form-data">
    <label for="fname"><h4>item name<h4></label>
    <input type="text"  class="form-control"  value="<?=$pro_title;?>" name="pro_title">

  

    <input class="bg-danger" type="submit" value="delete" name="item_delete">
    <p>check more itemss ! <a href="cart.php"> itemss</a></p>
    <p>return back ! <a href="index.php"> return</a></p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>