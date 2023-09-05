
<?php include('../includes/conn.php');


/*$cat="select * from categories";
$result=mysqli_query($con,$cat);
$num=mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result)){
        $cat_id=$row['cat_id'];
    
        $cat_title=$row['cat_title'];
    }
*/
    include 'header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
<title>view categories</title>
</head>
<form method="get">
 <table class="table thead-dark">
  <thead>
    <tr>
      <th scope="col"># id</th>
      <th scope="col">category name  </th> 
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
  $cat="select * from categories";
$result=mysqli_query($con,$cat);
$num=mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result)){
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
    
?>
    <tr>
      <th scope="row"><?=$cat_id;?></th>
      <td><?=$cat_title;?></td>
      
        <td> <a href="update_cat.php?cat_id=<?=$cat_id;?>" class="btn btn-info">update</a>   
      <a href="delete_cat.php?cat_id=<?=$cat_id;?>" class="btn btn-secondary">delete</a></td>

      </tbody>
 
  <?php }?>
</table>      <th> <a href="index.php" class="btn btn-info">return back</a> 
</form>
<?php
include('footer.php');

