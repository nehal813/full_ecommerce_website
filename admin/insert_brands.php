<?php include('../includes/conn.php');

if(isset($_POST['insert_bran'])){
  $bran_title=$_POST['bran_title'];

 $query1="select * from brands where bran_title='$bran_title'";
  $result1=mysqli_query($con,$query1);
$num=mysqli_num_rows($result1);
if($num > 0){
  echo "<script> alert('this brand has been added before')</script>";
  }else{

  $query="insert into brands (bran_title) values ('$bran_title')";
  $result=mysqli_query($con,$query);
  if($result){
    
    echo "<script> alert('brand has been added successfully')</script>";

}
  }}
?>
<h2 class="text-center"> insert brands </h2>
<form  method="post" class="mb-2">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">@</span>
  </div>
  <input type="text" class="form-control" placeholder="insert brands" name="bran_title"
   aria-label="Username" aria-describedby="basic-addon1">
   <input type="submit" class="btn btn-primary" name="insert_bran" value="Insert">
</div>
</form>