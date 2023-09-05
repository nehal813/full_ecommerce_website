
<?php include('../includes/conn.php'); 
include '../functions/functions.php';
@session_start(); 
//include '../header.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../main.css"/>
<title>payment</title>
<syyle>
   
</style>

</head>
<body><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<form method="post">
<h3></h3>
<?php  
if(isset($_SESSION['username'])){
    global $con;
    $user_ip=getIPAddress(); 
 
   // where user_ip='$user_ip'
$user="select * from user_table   ";
 $result=mysqli_query($con,$user);

$row=mysqli_fetch_assoc($result);
//if(is_array($row) && empty($row) ){
$user_id=$row['user_id'];
//echo $user_id;

//}else{$user_id=$row['user_id'];
  
}
?>
<div class="container" >
    <h2 class="text-center text-info">payment options</h2>
    
    <div class="row d-flex">
    <div class="col-md-6 justify-content-center align-items-center">
        <a href=" https://www.paypal.com"><img style="width:344px; height:333px;" src="./imgs/payment.png" target="_blank" alt="payment"></a>
</div>
<div class="col-md-6">
         <a href="order.php?user_id=<?php echo $user_id;?>"> 
        <h2 class="text-center text-info text-decoration-none"> pay offline </h2></a>

      <!-- <input class="bg-info" type="submit" value="pay offline" name="payoffline">-->

    </div>
</div>
</div>
</form>

</html>

</body>
<?php
include '../footer.php';