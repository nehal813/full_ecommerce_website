<center><h3>All users</h3></center>
<?php 

if(isset($_GET['list_users'])){

$query="select * from user_table ";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num == 0){
   echo  "<div class='alert alert-danger' role='alert'>
 No users for now!
</div>";

}
    while($row=mysqli_fetch_assoc($result)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_email=$row['user_email'];
    $user_img=$row['user_img'];
    $user_address=$row['user_address'];
   // $total_products=$row['total_products'];
   $user_mobile=$row['user_mobile'];
   // $status=$row['order_status'];*/
  
    
    

?>

<form method="get">
 <table class="table thead-dark">
  <thead>
    <tr>
    <th scope="col">U id</th>
      <th scope="col">username</th>
      <th scope="col">email </th> 
      <th scope="col">img</th> 
      <th scope="col">address</th>
      <th scope="col">mobile</th>

      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?=$user_id;?></th>
      <th scope="row"><?=$username;?></th>
      <td><?=$user_email;?></td>
      <td><img src='../users/user_imgs/<?=$user_img;?>'></td>
      <td><?=$user_address;?></td>
      
      <td><?=$user_mobile;?></td>

    <?php/*
      $sold="select * from orders_pending where product_id=$pro_id";
      $result2=mysqli_query($con,$sold);
      $num=mysqli_num_rows($result2);
      echo $num;*/
      ?>
 
     <td> 
      <a href="delete_user.php?user_id=<?=$user_id;?>" class="btn btn-secondary">delete</a></td>
      
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