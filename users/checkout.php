<?php  include('../includes/conn.php');  session_start(); 
//include('../functions/functions.php');

?>
   <link rel="stylesheet" href="../main.css"/>
   <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css"/>
<title>check out</title>
</head>
<body><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img class="navbar-brand" src="../shop.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
     
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" 
          aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      
      </ul>

  

</ul>
      <form class="d-flex" action="search_pro.php" method="get" role="search">

        
        <input class="form-control me-2" type="search" name="search_name" placeholder="Search" aria-label="Search">
        <input class="bg-info px-3 py-2 border-0 " type="submit" name="search" value="search">
      </form>
    </div>
  </div>
</nav>



<!--layer 2 -->
<ul class="nav justify-content-center bg-secondary">
<li class="nav-item">
          <a class="nav-link active text-light " aria-current="page" href="#" type="logo" >Welcome Home</a>
        </li>

        <?php 
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link text-light' href='user_login.php'>Login</a>
        </li>";
        }else{       
          echo  "<li class='nav-item'>
          <a class='nav-link text-light' href='logout.php'>Logout</a>
        </li>";
        }
        ?>
 
 
  
</ul>
<!--   layer 3 --> 
<div class="bg-light">
<h3  class="text-center"> Hidden Store </h3>
<p  class="text-center" > if you cannot make it, pay it. </p>

</div>

<!--   layer 4   getting products --> 
<div class="row">
    <div class="col-md-12">
        <div class="row">
        <?php  
 if(!isset($_SESSION['username'])){
    include('user_login.php');
 }else{
    include('payment.php');
 }
    ?>
<!-- row end
 
</div>
  </div>-->

  </div>
</div>
 <!-- Sidebar brands
<div class="col-md-2 bg-secondary p-0" >
<ul class="navbar-nav me-auto text-center">
  <li class="nav-item bg-info">
    <a class="nav-link  active text-light" aria-current="page" href="#"><h3>Brands</h3></a>
  </li>
 <?php 
 
 ?>
</ul>

  Sidebar categories
<ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a class="nav-link  active text-light" aria-current="page" href="#"><h4>categories</h4></a>
        </li>-->
        <?php
    
  ?>
</ul>

  </div>

</div>

<?php
//include '../footer.php';