<center><h3>All payments</h3></center>
<?php 

if(isset($_GET['list_payments'])){

$query="select * from user_pay ";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num == 0){
   echo  "<div class='alert alert-danger' role='alert'>
 No users orders for now!
</div>";

}
    while($row=mysqli_fetch_assoc($result)){
        $pay_id=$row['pay_id'];
        $order_id=$row['order_id'];
        $amount=$row['amount'];
    $invoice=$row['invoice'];
    $pay_mode=$row['pay_mode'];
   // $total_products=$row['total_products'];
   $date=$row['date'];
   // $status=$row['order_status'];*/
  
    
    

?>

<form method="get">
 <table class="table thead-dark">
  <thead>
    <tr>
    <th scope="col">U id</th>
      <th scope="col">#</th>
      <th scope="col">amount due </th> 
      <th scope="col">invoice number</th> 
      <th scope="col">pay mode</th>
      <th scope="col">pay date</th>

      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?=$order_id;?></th>
      <th scope="row"><?=$pay_id;?></th>
      <td><?=$amount;?></td>
      <td><?=$invoice;?></td>
      <td><?=$pay_mode;?></td>
      
      <td><?=$date;?></td>

    <?php/*
      $sold="select * from orders_pending where product_id=$pro_id";
      $result2=mysqli_query($con,$sold);
      $num=mysqli_num_rows($result2);
      echo $num;*/
      ?>
 
     <td> 
      <a href="delete_pay.php?pay_id=<?=$pay_id;?>" class="btn btn-secondary">delete</a></td>
      
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