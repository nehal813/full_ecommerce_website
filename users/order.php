<?php  include('../includes/conn.php');  //session_start(); 
include('../functions/functions.php');
session_start(); 
if(isset($_GET['user_id'])){
  $user_id=$_GET['user_id'];
  
}

global $con;
$ip = getIPAddress();  
$total_price=0;

$query="select * from cart_details  where ip_address ='$ip'  ";
$result=mysqli_query($con,$query);
$total_products=mysqli_num_rows($result);
$invoice_number=mt_rand();
$status='pending';
while($row=mysqli_fetch_assoc($result)){
  $product_id=$row['product_id'];

  $query2="select * from products where pro_id='$product_id'";
  $result2=mysqli_query($con,$query2);
while($row2=mysqli_fetch_assoc($result2)){

$product_price=array($row2['pro_price']);
$product=array_sum($product_price);
$total_price+=$product;
}
}
//$subtotal=0;
// gettting quantity
$cart="select * from cart_details  ";
$result=mysqli_query($con,$cart);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
$quantity=$row['quantity'];
if($quantity ==0){
  $quantity=1;
  $subtotal=$total_price;
  echo $total_price;
}else{
$quantity=$quantity;
$subtotal=$subtotal*$quantity;

}
//echo $subtotal;
//echo $total_price;

global $con;
$insert="insert into user_orders (user_id ,	amount ,	invoice_number ,	total_products ,	order_date ,
	order_status ) values ('$user_id', '$total_price' ,'$invoice_number' ,'$total_products' ,NOW(),'$status')";
  $result_ins=mysqli_query($con,$insert);
 

  if($result_ins ){
   
    echo "<script> alert('pending orders has been added successfully')</script>";
        
    echo "<script>window.open('profile.php','_self')</script>";
  }else{
    echo "<script> alert('data has not been added successfully')</script>";

  }
// orders pending
$insert2="insert into orders_pending (user_id ,	invoice_number, 	product_id ,	quantity 	,order_status )
 values ('$user_id' ,'$invoice_number' ,'$product_id','$quantity' ,'$status')";
  $result_pend=mysqli_query($con,$insert2);

//delete items  
$delete ="delete  from cart_details where ip_address ='$ip'";
$result_del=mysqli_query($con,$delete);
?>
   <link rel="stylesheet" href="../main.css"/>
   <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css"/>
<title>check out</title>
</head>
<body><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img class="navbar-brand" src="../shop.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
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

  

</ul>
<ul class="nav justify-content-center bg-secondary">
<li class="nav-item">
          <a class="nav-link active text-light " aria-current="page" href="#" type="logo" >Welcome Home</a>
        </li>

        <?php 
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link text-light' href='users/user_login.php'>Login</a>
        </li>";
        }else{       
          echo  "<li class='nav-item'>
          <a class='nav-link text-light' href='users/logout.php'>Logout</a>
        </li>";
        }
        ?>
  
  <li class="nav-item">
    <a class="nav-link  text-light"  href="./users/register.php">register</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>

    </ul>


  