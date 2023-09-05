
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
<title>view brands</title>
</head>
<form method="get">
 <table class="table thead-dark">
  <thead>
    <tr>
      <th scope="col"># id</th>
      <th scope="col">brand name  </th> 
  

      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody><?php
  $bran="select * from brands";
$result=mysqli_query($con,$bran);
$num=mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result)){
        $bran_id=$row['bran_id'];
    
        $bran_title=$row['bran_title'];
    
?>
    <tr>
      <th scope="row"><?=$bran_id;?></th>
      <td><?=$bran_title;?></td>
      
        <td> <a href="update_bran.php?bran_id=<?=$bran_id;?>" class="btn btn-info">update</a>   
      <a href="delete_bran.php?bran_id=<?=$bran_id;?>" class="btn btn-secondary">delete</a></td>

      </tbody>
 
  <?php }?>
</table>      <th> <a href="index.php" class="btn btn-info">return back</a> 
</form>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>
<?php
include('footer.php');
