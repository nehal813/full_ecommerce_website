<center><h3> all orders</h3> </center>
<?php 
if(isset($_GET['list_orders'])){

$query="select * from user_orders ";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num == 0){
   echo  "<div class='alert alert-danger' role='alert'>
 No users orders for now!
</div>";

}
    while($row=mysqli_fetch_assoc($result)){
        $order_id=$row['order_id'];
        $user_id=$row['user_id'];
        $amount=$row['amount'];
    $invoice_number=$row['invoice_number'];
    $total_products=$row['total_products'];
   $order_date=$row['order_date'];
    $status=$row['order_status'];
  
    
    

?>
<!DOCTYPE html>
<html>
<head>
<title>user orders</title>
<body>
<form method="get">
 <table class="table thead-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">U id</th>
      <th scope="col">amount due </th> 
      <th scope="col">invoice number</th> 
      <th scope="col">total products</th>
      <th scope="col">order date</th>
      <th scope="col">status</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?=$order_id;?></th>
      <th scope="row"><?=$user_id;?></th>
      <td><?=$amount;?></td>
      <td><?=$invoice_number;?></td>
      <td><?=$total_products;?></td>
      
      <td><?=$order_date;?></td>

    <?php/*
      $sold="select * from orders_pending where product_id=$pro_id";
      $result2=mysqli_query($con,$sold);
      $num=mysqli_num_rows($result2);
      echo $num;*/
      ?>
      <td><?=$status;?></td>
     <td> 
      <a href="delete_ord.php?ord_id=<?=$order_id;?>" class="btn btn-secondary">delete</a></td>
      
    </tr>
    
    <?php }}
    
if(isset($_GET['update_product'])){
  //include('update_product.php');
}
    
    
    
    ?>
   
  </tbody>
  <th> <a href="index.php" class="btn btn-info">return back</a> 
</table>
</form>
<?php
//include('footer.php');

