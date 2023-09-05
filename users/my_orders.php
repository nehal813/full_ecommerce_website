<?php


?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>

<body>
<style>
    .div3{
        width:77% ;
        height: 55%;
        text-align:center;
        justify-content:center;
        float:right;
    }
    </style>
<h3>All orders </h3>

<table class="div3" class="table  table-borderd mt-5 thead-dark">

  <thead class="bg-info">
    <tr>
      <th scope="col">ORD N.</th>
      <th scope="col">price due  </th> 
      <th scope="col">total products</th> 
      <th scope="col">invoice number</th>
      <th scope="col">date</th>
      <th scope="col">complete/incomplete</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
  <?php

if(isset($_GET['my_orders'])){
    $username=$_SESSION['username'];
    $query1="select * from user_table where username ='$username'";
    $result1=mysqli_query($con,$query1);
    $row1=mysqli_fetch_assoc($result1);
    $user_id=$row1['user_id'];
//echo $user_id;
    // orders
    $query="select * from user_orders where user_id ='$user_id'";
    $result=mysqli_query($con,$query);
$num_cart=mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
//$user_id=$row['user_id'];
$order_id=$row['order_id'];

$amount=$row['amount'];
$invoice=$row['invoice_number'];
$total_pro=$row['total_products'];
$status=$row['order_status'];

if($status == 'pending'){
    $status ='incomplete';
}else{
    $status='complete';
}
$date=$row['order_date'];

if($total_pro == 0){
    echo "<script> alert('here are pending orders lately ')</script>";
}else{
?>
    <tr>
      <th scope="row"><?=$order_id;?></th>
      <td><?=$amount;?></td>
      <td><?=$total_pro;?></td>
      <td><?=$invoice;?></td>
      <td><?=$date;?></td>
     
      <td><?=$status;?></td>
    <?php if($status == 'complete'){
       echo  "<td> <a href='conf_payment.php?order_id=$order_id' class='btn btn-success'>payment done </a>   </td>
      
        </tr>";
    }else{
        echo  "<td> <a href='conf_payment.php?order_id=$order_id' class='btn btn-info'>confirm</a>   </td>
      
        </tr>";
    }
      
  ?>
    
    <?php } } }?>
   
  </tbody>
 
</table>