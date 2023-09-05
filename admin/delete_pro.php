<?php include('../includes/conn.php');
include 'header.php';

if(isset($_GET['pro_id'])){

    $pro_id=$_GET['pro_id'];

$query="select * from products where pro_id=$pro_id ";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);

while($row=mysqli_fetch_assoc($result)){
    $pro_id=$row['pro_id'];
   // echo $pro_id;
    $pro_title=$row['pro_title'];
$pro_desc=$row['pro_desc'];
$pro_key=$row['pro_key'];
$pro_cat=$row['cat_id'];
$pro_bran=$row['bran_id'];
$pro_price=$row['pro_price'];
$img1=$row['pro_img1'];
$img2=$row['pro_img2'];
$img3=$row['pro_img3'];
}
}
if(isset($_POST['pro_delete'])){

    $delete="delete from products where pro_id=$pro_id";
    $result2=mysqli_query($con,$delete);
    if($result2){
        echo "<script> alert('product has been deleted successfully')</script>";
        
        echo "<script>window.open('view_pro.php','_self')</script>";
    }else{
        echo "<script> alert('product has not been deleted successfully')</script>";
         // die(myaqli_error($result2));
    
    }

    }
   if(isset($_POST['return'])){
        echo "<script>window.open('view_pro.php','_self')</script>";
    }



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

<center><h2 class ="text-align-center">Delete Product</h2><p>make sure you want to delete this data !</p></center>

<div class="div2">
  <form action="" method="post" class="form-control"  enctype="multipart/form-data">
    <label for="fname"><h4>product name<h4></label>
    <input type="text" id="username" class="form-control"  value="<?=$pro_title?>" name="pro_title">

    <label for="lname"><h4>description<h4></label>
    <input type="text"  class="form-control"  value="<?=$pro_desc?>"  name="pro_desc" >

    <label for="lname"><h4>keywords</h4></label><br>
    <input type="text" class="form-control"  class="form-control"  value="<?=$pro_key?>" 
    name="pro_key" >
    <br>
   
</div>
<div class="form-outline mb-4 w-177 m-auto">
    <label for="lname" class="form-label" >product image 1 </label>
    <input type="file" id="img"  class="form-control " name="pro_img1"  value="src='./pro_imgs/<?=$img1?>'"  >
    <img src='./pro_imgs/<?=$img1?>'  >          <br>

</div>
<div>
<label for="lname"><h4>price</h4></label>
    <input type="text" id="address" name="pro_price" class="form-control"  value="<?=$pro_price?>" >
</div>

    <input class="bg-danger" type="submit" value="delete" name="pro_delete">
    
    <input class="bg-info" type="submit" value="return" name="return">
    <p>check more products ! <a href="view_pro.php"> products</a></p>
    <p>return back ! <a href="index.php"> return</a></p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>
