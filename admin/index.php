<?php include('../includes/conn.php');
session_start();
include 'header.php';
if(!isset($_SESSION['name'])){
    include("admin_register.php");
    die;
}
?> <link rel="stylesheet" href="../main.css"/>

<!--   layer 2 --> 
<div class="bg-black m-auto">
<p  class="text-center text-light" > welcome admin : <?=$_SESSION['name']?> </p>
<h3  class="text-center text-light"> Manage Details </h3>

</div>
<!--   layer 3 --> 
<div class="row">
    <?php if(isset($_SESSION['name'])){
        
?>
    
<div class="col-md-12 bg-secondary p-1 d-flex align-items-center" >
    <div class="col-md-4 mb-2">
         <div class="card" >
  <img class="card-img-top" src="admin.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="text-center"><?=$_SESSION['name']?></h5>
</div>
  </div>
</div>
    <?php }?>
<div class="button text-center my-1">
<a type="button" class="btn btn-primary my-1"  href= "view_pro.php"  >View Products</a>
<a type="button" class="btn btn-secondary my-1" href= "insert_pro.php" >Insert products</a>
<a type="button" class="btn btn-success my-1  " href="view_cat.php" >View Ctegories</a>
<a href= "index.php?insert_categ" type="button " class="btn btn-danger my-1 " >  Insert categories</a>

<a type="button" class="btn btn-success my-1 " href="view_bran.php">view brands</a>
<a  href= "index.php?insert_brands"  type="button" class="btn btn-info my-1 ">insert brands</a>
<a type="button" class="btn btn-light  my-1" href="index.php?list_orders">All orders</a>
<a type="button" class="btn btn-dark my-1" href="index.php?list_payments">All payments</a>
<a type="button" class="btn btn-light"  href="index.php?list_users" >List users</a>
<a type="button" class="btn btn-link" href="logout.php">Log out</a>
</div>
</div>
</div>
<!-- layer 4 --> 
<div class="container my-5">
    <?php 
    if(isset($_GET['insert_categ'])){
        include 'insert_categ.php';
    }
    if(isset($_GET['insert_brands'])){
        include 'insert_brands.php';
    }
    if(isset($_GET['list_orders'])){
        include 'list_orders.php';
    }
    if(isset($_GET['list_payments'])){
        include 'list_payments.php';
    }
    if(isset($_GET['list_users'])){
        include 'list_users.php';
    }
    ?>
</div>

<?php 
include '../footer.php';