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

// our cat
$cat="select * from categories where cat_id=$pro_cat ";
    $result_cat=mysqli_query($con,$cat);
    while($row=mysqli_fetch_assoc($result_cat)){
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
       // echo $cat_id;

    }
    // our brand
    $bran="select * from brands where bran_id=$pro_bran ";
    $result_bran=mysqli_query($con,$bran);
    while($row=mysqli_fetch_assoc($result_bran)){
       $bran_id=$row['bran_id'];
        $bran_title=$row['bran_title'];
      

    }

//  updateeeeeee
if(isset($_POST['pro_update'])){

$select ="select * from products where pro_id=$pro_id";
$result_sel=mysqli_query($con,$select);
$num=mysqli_num_rows($result_sel);
   $pro_title=$_POST['pro_title'];

$pro_desc=$_POST['pro_desc'];
$pro_key=$_POST['pro_key'];
$pro_cat=$_POST['cat_id'];
$pro_bran=$_POST['bran_id'];
$pro_price=$_POST['pro_price'];
echo $pro_bran;

$img1=$_FILES['pro_img1']['name'];
$temp_img=$_FILES['pro_img1']['tmp_name'];
move_uploaded_file($temp_img,"./pro_imgs/$img1");

$img2=$_FILES['pro_img2']['name'];
$temp_img=$_FILES['pro_img2']['tmp_name'];
move_uploaded_file($temp_img,"./pro_imgs/$img2");

$img3=$_FILES['pro_img3']['name'];
$temp_img=$_FILES['pro_img3']['tmp_name'];
move_uploaded_file($temp_img,"./pro_imgs/$img3");


//pro_img1='$img1', pro_img2='$img2' ,pro_img3='$img3'     cat_id ='$pro_cat',bran_id='$pro_bran'
$ins="update products set  pro_title='$pro_title' ,pro_desc='$pro_desc' ,pro_key='$pro_key' ,cat_id ='$pro_cat'
,bran_id='$pro_bran',pro_img2='$img2' , pro_img1='$img1' ,pro_img3='$img3' ,pro_price='$pro_price' where pro_id=$pro_id";
 
    $result_ins=mysqli_query($con,$ins);
       //if($result_ins){
        if(!$result_ins){

           die(mysqli_error($con));
       // echo "<script> alert('product is updated ,thank you :)')</script>";
       // echo "<script> window.open('logout.php','_self')</script>";

       }echo "<script> alert('product is updated ,thank you :)')</script>";
        echo "<script> window.open('view_pro.php','_self')</script>";

}}
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

<center><h2 class ="text-align-center">update product</h2><p>make sure you fill all data !</p></center>

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
   
<div class="form-outline my-4  w-99 m-auto" >
  <select   name="cat_id" class="form-select  " >
    <option value='<?=$cat_title?>' ><?=$cat_title?></option>
    <?php $sel2="select * from categories";
    $result2=mysqli_query($con,$sel2);
    $num=mysqli_num_rows($result2);
    
    while($row=mysqli_fetch_assoc($result2)){
        $cat_id=$row['cat_id'];
       // echo $cat_id;
        $cat=$row['cat_title'];
     echo "<option value='$cat_id'>$cat</option>";
    }
    ?>
  </select>
</div>
         
<div class="form-outline my-4 text-center w-99 m-auto" >
  <select   name="bran_id" class="form-select " >
    <option  value='<?=$bran_title?>'  ><?=$bran_title;?></option>
    <?php $sel1="select * from brands ";
    $result1=mysqli_query($con,$sel1);
    $num=mysqli_num_rows($result1);
    
    while($row=mysqli_fetch_assoc($result1)){
        $bran_id=$row['bran_id'];
        $bran=$row['bran_title'];
     echo "<option value='$bran_id'>$bran</option>";
    }
    ?>

  </select>
</div>
<div class="form-outline mb-4 w-177 m-auto">
    <label for="lname" class="form-label" >product image 1 </label>
    <input type="file" id="img"  class="form-control " name="pro_img1"  value="src='./pro_imgs/<?=$img1?>'"  >
    <img src='./pro_imgs/<?=$img1?>'  >          <br>

    <label for="lname" class="form-label" >product image 2 </label>
    <input type="file" id="img"  class="form-control " name="pro_img2" >  
   <img src='./pro_imgs/<?=$img2?>'  >
               <br>

    <label for="lname" class="form-label" >product image 3 </label>
    <input type="file" id="img"  class="form-control " name="pro_img3"    value="src='./pro_imgs/<?=$img3?>" >
    <img src='./pro_imgs/<?=$img3?>'  >
</div>
<div>
<label for="lname"><h4>price</h4></label>
    <input type="text" id="address" name="pro_price" class="form-control"  value="<?=$pro_price?>" >
</div>

    <input class="bg-info" type="submit" value="update" name="pro_update">
    <p>check more products ! <a href="view_pro.php"> products</a></p>
    <p>return back ! <a href="index.php"> return</a></p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>
