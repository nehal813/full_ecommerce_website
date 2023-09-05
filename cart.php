<?php  include('./includes/conn.php'); 
include('functions/functions.php');session_start();
 //include 'header.php';
// calling cart
getIPAddress();  
    cart(); 
    cart_item();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="main.css"/>
<title>Page Title</title>
</head>
<body><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
<img class="navbar-brand" src="shop.png" alt="logo"></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
 <li class="nav-item">
   <a class="nav-link active" aria-current="page" href="index.php">Home</a>
 </li>
 <li class="nav-item">
   <a class="nav-link" href="display.php">Products</a>
 </li>
 
  <li class="nav-item">
    <a class="nav-link  "  href="./users/register.php">register</a>
  </li>
 
 <li class="nav-item dropdown">
   <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" 
   aria-expanded="false">
     Dropdown
   </a>
   <ul class="dropdown-menu">
     <li><a class="dropdown-item" href="#">Action</a></li>
     <li><a class="dropdown-item" href="#">Another action</a></li>
     <li><hr class="dropdown-divider"></li>
     <li><a class="dropdown-item" href="#">Something else here</a></li>
   </ul>
 </li>

</ul>
<form class="d-flex" action="search_pro.php" method="get" role="search">

 
 <input class="form-control me-2" type="search" name="search_name" placeholder="Search" aria-label="Search">
 <input  class="bg-info px-3 py-2 border-0 " type="submit" name="search" value="search">
</form>
</div>
</div>
</nav>


<!--layer 2 -->
<ul class="nav justify-content-center bg-secondary">
<li class="nav-item">
          <a class="nav-link active text-light " aria-current="page" href="#" type="logo" >Welcome Home</a>
        </li>
        <?php 
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link text-light ' href='users/user_login.php'>Login</a>
        </li>";
        }else{       
          echo  "<li class='nav-item'>
          <a class='nav-link text-light' href='users/logout.php'>Logout</a>
        </li>";
        }
        ?>
  <li class="nav-item">
    <a class="nav-link  text-light"  href="#">Link</a>
  </li>
</ul>
<div class="bg-light">
<h3  class="text-center"> Hidden Store </h3>
<p  class="text-center" > if you cannot make it, pay it. </p>

</div>

<form method="post">
 <table class="table thead-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product name  </th> 
      <th scope="col">quantity</th>
      <th scope="col">price for one</th>
      <th scope="col">remove item</th>
      <th scope="col">image</th>
     <th scope="col">total price</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <?php       //display data
  global $con;
    $ip = getIPAddress();  
    $total_price=0;
   
    $query="select * from cart_details  where ip_address ='$ip'  ";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    if($num == 0){
        echo "<div class='alert alert-danger' role='alert'>
        This cart has no products for now !
      </div>";
     //elseif($num >0){
    /* echo    "  <thead> <tr>
        <th scope='col'>#</th>
        <th scope='col'>Product name  </th> 
        <th scope='col'>quantity</th>
        <th scope='col'>price for one</th>
        <th scope='col'>remove item</th>
        <th scope='col'>image</th>
      <!--  <th scope='col'>total price</th>-->
        <th scope='col'>operations</th>
      </tr>  </thead> ";*/
    }else{
    while($row=mysqli_fetch_assoc($result)){
     $pro_id=$row['product_id'];
     $query2="select * from products  where pro_id='$pro_id'  ";
     $result2=mysqli_query($con,$query2);
     while($row=mysqli_fetch_assoc($result2)){
        $pro_title=$row['pro_title'];
        $pro_desc=$row['pro_desc'];
        $pro_key=$row['pro_key'];
        $pro_price=$row['pro_price'];
        $img=$row['pro_img1'];
        
    
$product_price=array($row['pro_price']);
$product=array_sum($product_price);
$total_price+=$product;?>
<tr>
      <th scope="row"><?=$pro_id;?> <input type="hidden" id="custId" name="remove" value="3487">   </th>
      <td><?=$pro_title;?></td>   <td><input type="text" class="form-input w-50" name="quantity"></td>
      <?php
       global $con;
       $ip = getIPAddress();  
        if(isset($_POST['update'])){
         $quant=$_POST['quantity'];
         $update="update cart_details set quantity ='$quant' where ip_address='$ip'";
         $result_update=mysqli_query($con,$update);
         $total_price=$total_price*$quant;
}

global $con;
$ip = getIPAddress();  

 if(isset($_POST['delete'] )){
 // $remove=$_POST['remove_item'];
 $query="select * from product  where pro_id ='$pro_id'  ";
 $result=mysqli_query($con,$query);
 while($row=mysqli_fetch_assoc($result)){
  $pro_id=$row['pro_id'];  //6
  echo $pro_id;
 if($pro_id >= 1){
  $delete="delete * from cart_details where product_id='$pro_id'";
  $result=mysqli_query($con,$delete);
  if($result){
    echo "<div class='alert alert-danger' role='alert'>
    This cart has no products for now !
  </div>";
  }else{
  echo 'ddddyj';
  echo "<script>window.open('index.php')</script>";
  
  }}
 }}
?>
   

      <td><?=$pro_price ;?></td>
      <td> <?//=$pro_id?> <input type="checkbox"  name="removeitem[]" value="<?php echo $pro_id;?>"></td>
      <td><img src="./admin/pro_imgs/<?=$img;?>"></td>
      <!--<td><?php  // total_price();?>   <input href="item_del.php?pro_id=<?//=$pro_id?>" class=" bg-danger px-3  py-2 border-0 "
        name="item_delete "type="submit"  value="delete"> </td>-->
     <td> <input href="#" name="update"  class="bg-info px-3 py-2 border-0 " type="submit" value="update">
       <form method="get">
        <a href="item_del.php?pro_id=<?=$pro_id?>" class="btn btn-secondary">delete</a>
</form> </td>
      
    </tr>

    <?php }}  }   
    
    if(isset($_GET['item_delete'])){
      include("item_del.php");
    }
    ?>
   
  </tbody>
 
</table> <h4>Total price = <?php echo $total_price;//total_price() ;?>$</h4>
<button class="btn btn-info px-3 py-2 text-light" ><a href="index.php"
class="text-light text-decoration-none" >coninue shopping </a> </button>

 <button class="btn btn-secondary " class="text-light"><a href="./users/checkout.php" class="text-light text-decoration-none ">checkout </a> </button>
      <?php
     /* if(isset($_POST['cont'])){
       
header('location : index.php');
      }*/
      ?>
     </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>
</body>


<?php     
   /////////  delete
  /* function remove_item(){
  global $con;
if(isset($_POST['delete'])){
  
foreach($_POST['removeitem'] as $pro_id){
echo $pro_id;
  $delete="delete * from cart_details  where product_id ='$pro_id'  ";
$result2=mysqli_query($con,$delete);
if($result2){
  echo "<div class='alert alert-danger' role='alert'>
  This cart has no products for now !
</div>";
}else{
echo 'ddddyj';
echo "<script>window.open('index.php','_self')</script>";


}}
}
} */
//echo $remove_item=
//remove_item();

?>
</html>
 <?php
include 'footer.php';