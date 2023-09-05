<?php include('../includes/conn.php');

if(isset($_POST['insert_cat'])){
  $cat_title=$_POST['cat_title'];

 $query1="select * from categories where cat_title='$cat_title'";
  $result1=mysqli_query($con,$query1);
$num=mysqli_num_rows($result1);
if($num > 0){
  echo "<script> alert('categorie has been added before')</script>";
  }else{

  $query="insert into categories (cat_title) values ('$cat_title')";
  $result=mysqli_query($con,$query);
  if($result){
    
    echo "<script> alert('categorie has been added successfully')</script>";

}
  }}
?>
<h2 class="text-center"> insert categories </h2>
<form  method="post" class="mb-2">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">@</span>
  </div>
  <input type="text" class="form-control" placeholder="insert categorie" name="cat_title" aria-describedby="basic-addon1">
   <input type="submit" class="btn btn-primary" name="insert_cat" value="Insert">
</div>
</form>