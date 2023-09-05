<?php  include('../includes/conn.php');  
include('../functions/functions.php');
session_start(); 
?>    
   <!DOCTYPE html>
   <html>
<head>
<link rel="stylesheet" href="../main.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
 rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
 crossorigin="anonymous">
<title>welcome <?=$_SESSION['username'];?></title>
</head>
<body>
<style>
    .navbar{
        text-align:center;
        justify-content:center;
    }
.sidenav {
  
  width: 277px;
  height: 100%;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: lightblue  ;
  overflow-x: hidden;
  padding-top: 20px;

  
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 23px;
 
  color:black;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}
h3{
  text-align:center;
    color:blue ;
}
.profile_img{
    width:199px;
    height: 199px;
}

</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary  justify-content-center bg-secondary">
  <div class="container-fluid  justify-content-center ">
    <img class="navbar-brand" src="../shop.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav justify-content-center bg-secondary">

       
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display.php">contact</a>
        </li>
        
        <form class="d-flex" action="../search_pro.php" method="get" role="search">

        
<input class="form-control me-2" type="search" name="search_name" placeholder="Search" aria-label="Search">
<input class="bg-info px-3 py-2 border-0 " type="submit" name="search" value="search">
</form>
      </ul>

</ul></div>
</nav>

<ul class="nav justify-content-center bg-secondary">
<li class="nav-item">
          <a class="nav-link active text-light " aria-current="page" href="#" type="logo" >Welcome <?=$_SESSION['username'];?></a>
        </li>

        <?php 
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link text-light' href='./admin_login.php'>Login</a>
        </li>";
        }else{       
          echo  "<li class='nav-item'>
          <a class='nav-link text-light' href='logout.php'>Logout</a>
        </li>";
        }
        ?>
  
  <li class="nav-item">
    <a class="nav-link  text-light"  href=".//register.php">register</a>
  </li>
 
    </ul>
    <div >
<h3> user profile data </h3>
    </div>
    <div>
    <?php //user_order_details(); 
    
if(isset($_GET['edit_account'])){
    include('edit_account.php');
}
if(isset($_GET['my_orders'])){
  include('my_orders.php');
}
if(isset($_GET['delete_account'])){
  include('delete_account.php');
}
?>

    <div class="sidenav">
        <h3> Your profile </h3>
    <?php 
global $con;
    $username=$_SESSION['username'];
   // $user_email=$_SESSION['user_email'];
   // echo $user_email;
    $user="select * from user_table where username='$username'";
 $result=mysqli_query($con,$user);
 $row=mysqli_fetch_assoc($result);
 $user_img=$row['user_img'];

?>
    <a><?php echo " <img src='./user_imgs/$user_img' class='profile_img' >"; ?></a>
          <a class=" " aria-current="page" href="profile.php" type="logo" > pendeng orders</a>
          <a class=" " aria-current="page" href="profile.php?edit_account" type="logo" > edit account</a>

          <a class=" " aria-current="page" href="profile.php?my_orders" type="logo" > my orders</a>
          <a class=" " aria-current="page" href="profile.php?delete_account" type="logo" > delete account</a>
     
          <a class='' href='logout.php'>Logout</a>
        

          </div>
          </div>

    </body>
</html>

<?php
include 'footer.php';