<?php  include('./includes/conn.php'); 
include('functions/functions.php');
session_start();
 include 'header.php';
// calling cart
getIPAddress();  
    cart(); 
    cart_item();
?>

   <link rel="stylesheet" href="main.css"/>
<!--layer 2 -->
<ul class="nav justify-content-center bg-secondary">
<li class="nav-item">
          <a class="nav-link active text-light " aria-current="page" href="#" type="logo" >Welcome Home</a>
        </li>

        <?php 
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link text-light' href='users/user_login.php'>Login</a>
        </li>";
        }else{       
          echo  "<li class='nav-item'>
          <a class='nav-link text-light' href='users/logout.php'>Logout</a>
        </li>";
        }
        ?>
 
  <li class="nav-item">
    <a class="nav-link disabled" href="#">total price : <?php total_price();?>  </a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>

</ul>
<!--   layer 3 --> 
<div class="bg-light">
<h3  class="text-center"> Hidden Store </h3>
<p  class="text-center" > if you cannot make it, pay it. </p>

</div>

<!--   layer 4   getting products --> 
<div class="row">
    <div class="col-md-10">
        <div class="row">
        <?php  getprod();   //searchpro();
 get_uniqh_brands();
 get_uniqh_category();

 //$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

    ?>
<!-- row end
 
</div>
  </div>-->

  </div>
</div>
 <!-- Sidebar brands-->
 <div class="col-md-2 bg-secondary p-0" >
<ul class="navbar-nav me-auto text-center">
  <li class="nav-item bg-info">
    <a class="nav-link  active text-light" aria-current="page" href="#"><h3>Brands</h3></a>
  </li>
 <?php 
  getbrands();
 
 ?>
</ul>

  <!-- Sidebar categories-->
<ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a class="nav-link  active text-light" aria-current="page" href="#"><h4>categories</h4></a>
        </li>
        <?php
        getcat();
  ?>
</ul>

  </div>

</div>

<?php
include 'footer.php';