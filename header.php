<?php  include('./includes/conn.php'); 
       //include('./functions/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css"/>
<title>ShOppingOo</title>
</head>
<body><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
 rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
  crossorigin="anonymous">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img class="navbar-brand" src="shop.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="cart.php">My cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="">total price :<?php  total_price() ;?>$</a>
        </li>
        <?php 
        if(isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link active' href='users/profile.php'>my account</a>
        </li>";
        }else{       
          echo  "<li class='nav-item'>
          <a class='nav-link active' href='users/register.php'>register</a>
        </li>";
        }
        ?>
        
      
      </ul>
      <form class="d-flex" action="search_pro.php" method="get" role="search">

        
        <input class="form-control me-2" type="search" name="search_name" placeholder="Search" aria-label="Search">
        <input class="bg-info px-3 py-2 border-0 " type="submit" name="search" value="search">
      </form>
    </div>
  </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>
</body>
</html> 