<?php  include('../includes/conn.php');  

session_start(); 
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
  $select="select * from user_orders where order_id='$order_id'";

    $result=mysqli_query($con,$select);
$row=mysqli_fetch_assoc($result);
$invoice=$row['invoice_number'];
$amount=$row['amount'];

}
if(isset($_POST['conf_payment'])){
    
 $invoice=$_POST['invoice'];
$amount=$_POST['amount'];
$pay_mode=$_POST['pay_mode'];

$insert ="insert into user_pay (order_id ,	invoice ,	amount ,	pay_mode ,	date )
values ('$order_id','$invoice','$amount', '$pay_mode',NOW() ) ";
$result2=mysqli_query($con,$insert);
if($result2){
    echo "<script> alert('payment process has been confirmed successfully')</script>";
        
    echo "<script>window.open('profile.php?my_orders','_self')</script>";
}else{
    echo "<script> alert('payment process has not been confirmed successfully')</script>";
      

}
$update="update user_orders set order_status='complete' where order_id='$order_id'";
$result3=mysqli_query($con,$update);

}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../main.css"/>
<title>Page Title</title>
</head>
<body><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
 rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
  crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}

.form-select {
  position: relative;
  font-family: Arial;
}

.form-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: DodgerBlue;
}

h3{
    text-align:center;
}



</style>
</head>
<body>


<form method="post">
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>confirm payment</h3>

            <label for="email"><i class=""></i> invoice number</label>
            <input type="text" id="email" name="invoice" value="<?=$invoice;?>"placeholder="">
            <label for="fname"><i class=""></i>Price Amount </label>
            <input type="text" id="fname" name="amount" value="<?=$amount;?>" placeholder="product amount...">
           
          

<div class="form-outline my-4 text-center w-50 m-auto" >
  <select   name="pay_mode" class="form-select   w-50 m-auto" >
    <option value="0">Select a payment method :</option>
    <option >cash</option>
    <option >bank</option>
    <option >cridet card</option>
    <option >paypal</option>
    <option >Honda</option>
  
  </select>
</div>
           

          </div>
          
        </div>
       
        <input type="submit" value="Confirm" name="conf_payment" class="btn">
      </form>
    </div>
  </div>
  


  </div>
</div>
</form>
</body>
</html>