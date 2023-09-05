<?php include('../includes/conn.php');
include 'header.php';

$query="select * from products ";
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
    $img=$row['pro_img1'];
    

?><title>products</title>
<form method="get">
 <table class="table thead-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product name  </th> 
      <th scope="col">description</th> 
      <th scope="col">Keywords</th>
      <th scope="col">price</th>
      <th scope="col">total sold</th>
      <th scope="col">image</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?=$pro_id;?></th>
      <td><?=$pro_title;?></td>
      <td><?=$pro_desc;?></td>
      <td><?=$pro_key;?></td>
      
      <td><?=$pro_price;?></td>
      <td><?php
      $sold="select * from orders_pending where product_id=$pro_id";
      $result2=mysqli_query($con,$sold);
      $num=mysqli_num_rows($result2);
      echo $num;
      ?></td>
      <td><img src="./pro_imgs/<?=$img;?>"></td>
     <td> <a href="update_product.php?pro_id=<?=$pro_id;?>" class="btn btn-info">update</a>   
      <a href="delete_pro.php?pro_id=<?=$pro_id;?>" class="btn btn-secondary">delete</a></td>
      
    </tr>
    
    <?php }
    
if(isset($_GET['update_product'])){
  //include('update_product.php');
}
    
    
    
    ?>
   
  </tbody>
  <th> <a href="index.php" class="btn btn-info">return back</a> 
</table>
</form>
<?php
include('footer.php');

