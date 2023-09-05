<?php  include('./includes/conn.php'); 
include('functions/functions.php');
session_start();
    include 'header.php';
    // calling cart
    cart();
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
    <a class="nav-link  text-light"  href="#">Link</a>
  </li>
 
        <li class="nav-item">
          <a class="nav-link" href="users/register.php">Register</a>
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
        
       <h4 class="text-center text-info mb-5"> Related Data </h4><?php viewmore() ; 
 get_uniqh_brands();
 get_uniqh_category();
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