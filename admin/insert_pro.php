<?php include('../includes/conn.php');

if(isset($_POST['insert_pro'])){
    $pro_title=$_POST['pro_title'];
    $pro_desc=$_POST['pro_desc'];
    $pro_key=$_POST['pro_key'];
    $pro_cat=$_POST['pro_cat'];
    $pro_bran=$_POST['pro_bran'];
    $pro_price=$_POST['pro_price'];
    $pro_status='true';

    // accessing images
    $pro_img1=$_FILES['pro_img1']['name'];
    $pro_img2=$_FILES['pro_img2']['name'];
    $pro_img3=$_FILES['pro_img3']['name'];
    //accessing temp img
    $temp_img1=$_FILES['pro_img1']['tmp_name'];
    $temp_img2=$_FILES['pro_img2']['tmp_name'];
    $temp_img3=$_FILES['pro_img3']['tmp_name'];
    //check empty value
   if(empty( $pro_title)  || empty( $pro_desc)  ||  empty( $pro_key)  || empty( $pro_price) 
     || empty( $pro_cat) || empty( $pro_bran)  || empty( $pro_img1) || empty( $pro_img2)   || empty( $pro_img3) ){
        echo "<script> alert('please fill all the data')</script>";
      //  exit();
    }else{
    move_uploaded_file($temp_img1,"./pro_imgs/$pro_img1");
    move_uploaded_file($temp_img2,"./pro_imgs/$pro_img2");
    move_uploaded_file($temp_img3,"./pro_imgs/$pro_img3");

    // insert
    
   $query1="select * from products where pro_title='$pro_title'";
    $result1=mysqli_query($con,$query1);
  $num=mysqli_num_rows($result1);
  if($num > 0){
    echo "<script> alert('product has been added before')</script>";
    }else{
  

    $query="insert into products (pro_title,pro_desc,pro_key,cat_id,bran_id,pro_img1,pro_img2,pro_img3,
    pro_price,date,status) values ('$pro_title','$pro_desc','$pro_key',' $pro_cat','$pro_bran','$pro_img1',
    '$pro_img2','$pro_img3','$pro_price' ,NOW(),'$pro_status')";
    $result=mysqli_query($con,$query);
    if($result){
      
      echo "<script> alert('products has been added successfully')</script>";
  
  }
    }
}
}
    include 'header.php';
?>
<!DOCTYPE html>
<html><title>insert products</title>
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
    <link rel="stylesheet" href="../main.css"/>

<body>

<h3 class ="text-center">Insert Products</h3>

<div>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="fname"><h5>Product title<h5></label>
    <input type="text" id="fname" name="pro_title" placeholder="product name..">

    <label for="lname"><h5>product description<h5></label>
    <input type="text" id="lname" name="pro_desc" placeholder="product description..">

    <label for="lname"><h5>product keywords</h5></label>
    <input type="text" id="lname" name="pro_key" placeholder="product keywords..">


    <label for="country"><h5>Select a category</h5></label>
    <select id="country" name="pro_cat">
    <?php 
    $select_cat="select * from categories ";
 $result=mysqli_query($con,$select_cat);
 while($row=mysqli_fetch_assoc($result)){
  $cat_id=$row['cat_id'];
  $cat_title=$row['cat_title']; 
   
  echo "<option value='$cat_id'>$cat_title</option>";
     
   } ?>

  </select>
    <label for="country"><h5>Select a brand</h5></label>
    <select id="country" name="pro_bran">
 
    <?php 
    $select_bran="select * from brands ";
 $result=mysqli_query($con,$select_bran);
 while($row=mysqli_fetch_assoc($result)){
  $bran_id=$row['bran_id'];
  $bran_title=$row['bran_title']; 
   
  echo "<option value='$bran_id'>$bran_title</option>";
     
   } ?>
    </select>

<div class="form-outline mb-4 w-50 ">
    <label for="lname" class="form-label" >  product image 1</label>
    <input type="file" id="lname"  class="form-control "name="pro_img1" placeholder="..">
</div>
    
<div class="form-outline mb-4 w-50 ">
    <label for="lname" class="form-label" >  product image 2</label>
    <input type="file" id="lname"  class="form-control "name="pro_img2" placeholder="Ye..">
</div>
    
<div class="form-outline mb-4 w-50 ">
    <label for="lname" class="form-label" >  product image 3</label>
    <input type="file" id="lname"  class="form-control "name="pro_img3" placeholder="e..">
</div>
<label for="lname"><h5>product price</h5></label>
    <input type="text"  name="pro_price" placeholder="product pricefiles">


    <input type="submit" value="insert product" name="insert_pro">
  </form>
</div>

</body>
</html>