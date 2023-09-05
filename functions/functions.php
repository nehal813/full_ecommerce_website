<?php //include('./includes/conn.php');

 function getprod(){

    global $con ;

if(!isset($_GET['brand'])){  


    if(!isset($_GET['category'])){

    $query="select * from products order by rand() limit 0,9 ";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
        while($row=mysqli_fetch_assoc($result)){
            $pro_id=$row['pro_id'];
            $pro_title=$row['pro_title'];
        $pro_desc=$row['pro_desc'];
        $pro_key=$row['pro_key'];
       // $pro_cat=$row['pro_cat'];
      //  $pro_bran=$row['pro_bran'];
      $img=$row['pro_img1'];
        $pro_price=$row['pro_price'];
        
      echo "<div class='col-md-4 mb-2'> 
        <div class='card' >
      <img class='card-img-top' src='./admin/pro_imgs/$img' alt='Card image cap' >
      <div class='card-body'>
        <h5 class='card-title'>$pro_title</h5>
        <p class='card-text'>$pro_desc </p>
        <p class='card-text'> price : $pro_price </p>
        <a href='index.php?add_to_cart=$pro_id' class='btn btn-info'>Add to card</a>   
     <a href='product_details.php?pro_id=$pro_id' class='btn btn-secondary'>view more</a>

        </div>
      </div>
        </div>";
}
 }

}
}

//  getting all products

function getallprod(){

  global $con ;

if(!isset($_GET['brand'])){  


  if(!isset($_GET['category'])){

  $query="select * from products order by rand()  ";
  $result=mysqli_query($con,$query);
  $num=mysqli_num_rows($result);
      while($row=mysqli_fetch_assoc($result)){
          $pro_id=$row['pro_id'];
          $pro_title=$row['pro_title'];
      $pro_desc=$row['pro_desc'];
      $pro_key=$row['pro_key'];
     // $pro_cat=$row['pro_cat'];
    //  $pro_bran=$row['pro_bran'];
    $img=$row['pro_img1'];
      $pro_price=$row['pro_price'];
      
    echo "<div class='col-md-4 mb-2'> 
      <div class='card' >
    <img class='card-img-top' src='./admin/pro_imgs/$img' alt='Card image cap' >
    <div class='card-body'>
      <h5 class='card-title'>$pro_title</h5>
      <p class='card-text'>$pro_desc </p> <p class='card-text'> price : $pro_price </p>
      <a href='index.php?add_to_cart=$pro_id' class='btn btn-info'>Add to card</a>      <a href='product_details.php?pro_id=$pro_id'
      class='btn btn-secondary'>view more</a>

      </div>
    </div>
      </div>";
}
}

}
}

//get uniqh brands
function get_uniqh_brands(){

    global $con ;

if(isset($_GET['brand'])){  

$bran_id=$_GET['brand'];
    $query="select * from products where bran_id ='$bran_id' ";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    if($num > 0){
        while($row=mysqli_fetch_assoc($result)){
            $pro_id=$row['pro_id'];
            $pro_title=$row['pro_title'];
        $pro_desc=$row['pro_desc'];
        $pro_key=$row['pro_key'];
       // $pro_cat=$row['pro_cat'];
      //  $pro_bran=$row['pro_bran'];
      $img=$row['pro_img1'];
        $pro_price=$row['pro_price'];
        
      echo "<div class='col-md-4 mb-2'> 
        <div class='card' >
      <img class='card-img-top' src='./admin/pro_imgs/$img' alt='Card image cap' >
      <div class='card-body'>
        <h5 class='card-title'>$pro_title</h5>
        <p class='card-text'>$pro_desc </p> <p class='card-text'> price : $pro_price </p>
        <a href='index.php?add_to_cart=$pro_id' class='btn btn-info'>Add to card</a>   
          <a href='product_details.php?pro_id=$pro_id'
      class='btn btn-secondary'>view more</a>

        </div>
      </div>
        </div>";
}
 }
 else{
    echo "<div class='alert alert-danger' role='alert'>
    So sorry ,This brand has no products for now !
  </div>";
}
}
}
//get uniqh categ
function get_uniqh_category(){

    global $con ;

if(isset($_GET['category'])){  

$cat_id=$_GET['category'];
    $query="select * from products where cat_id ='$cat_id' ";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    if($num > 0){
        while($row=mysqli_fetch_assoc($result)){
            $pro_id=$row['pro_id'];
            $pro_title=$row['pro_title'];
        $pro_desc=$row['pro_desc'];
        $pro_key=$row['pro_key'];
       // $pro_cat=$row['pro_cat'];
      //  $pro_bran=$row['pro_bran'];
      $img=$row['pro_img1'];
        $pro_price=$row['pro_price'];
        
      echo "<div class='col-md-4 mb-2'> 
        <div class='card' >
      <img class='card-img-top' src='./admin/pro_imgs/$img' alt='Card image cap' >
      <div class='card-body'>
        <h5 class='card-title'>$pro_title</h5>
        <p class='card-text'>$pro_desc </p> <p class='card-text'> price : $pro_price </p>
        <a href='index.php?add_to_cart=$pro_id' class='btn btn-info'>Add to card</a>   
           <a href='product_details.php?pro_id=$pro_id'
        class='btn btn-secondary'>view more</a>
  
        </div>
      </div>
        </div>";
} } 
else{
    echo "<div class='alert alert-danger' role='alert'>
    So sorry ,This category has no products for now !
  </div>";

 }
}
}

// display brands
function getbrands(){
global $con;

$select_bran="select * from brands ";
 $result=mysqli_query($con,$select_bran);
 while($row=mysqli_fetch_assoc($result)){
  $bran_id=$row['bran_id'];
  $bran_title=$row['bran_title'];
  
  echo "<li class='nav-item'>
    <a class='nav-link text-light' href='index.php?brand=$bran_id'>$bran_title</a>
  </li>";
 }
  }

// display category
function getcat(){
    global $con;
    

  $select_cat="select * from categories ";
 $result=mysqli_query($con,$select_cat);
 while($row=mysqli_fetch_assoc($result)){
  $cat_id=$row['cat_id'];
  $cat_title=$row['cat_title']; 
  echo "<li class='nav-item'>
    <a class='nav-link text-light' href='index.php?category=$cat_id'>$cat_title</a>
  </li>";
 }
 } 
 
 //serch prod
 function searchpro(){
  global $con;
 
 if(isset($_GET['search'])){
  $pro_title=$_GET['search_name'];
  //echo $pro_title;
   $query="select * from products where pro_title = '$pro_title' limit 0,1 ";
  $result=mysqli_query($con,$query);
  //$num=mysqli_num_rows($result);
      while($row=mysqli_fetch_assoc($result)){
        $pro_id=$row['pro_id'];
        $pro_title=$row['pro_title'];
    $pro_desc=$row['pro_desc'];
    $pro_key=$row['pro_key'];

    $img=$row['pro_img1'];
    $pro_price=$row['pro_price'];
    
  echo "<div class='col-md-4 mb-2'> 
    <div class='card' >
  <img class='card-img-top' src='./admin/pro_imgs/$img' alt='Card image cap' >
  <div class='card-body'>
    <h5 class='card-title'>$pro_title</h5>
    <p class='card-text'>$pro_desc </p> <p class='card-text'> price : $pro_price </p>
    <a href='index.php?add_to_cart=$pro_id' class='btn btn-info'>Add to card</a>   
       <a href='product_details.php?pro_id=$pro_id'
      class='btn btn-secondary'>view more</a>

    </div>
  </div>
    </div>";
}}  
 }
 
// view more
 function viewmore(){

  global $con ;

if(isset($_GET['pro_id'])){

$pro_id=$_GET['pro_id'];
  $query="select * from products  where pro_id ='$pro_id' order by rand() limit 0,9 ";
  $result=mysqli_query($con,$query);
  $num=mysqli_num_rows($result);
      while($row=mysqli_fetch_assoc($result)){
          $pro_id=$row['pro_id'];
          $pro_title=$row['pro_title'];
      $pro_desc=$row['pro_desc'];
      $pro_key=$row['pro_key'];
      $img3=$row['pro_img3'];
      $img2=$row['pro_img2'];
  
    $img1=$row['pro_img1'];
      $pro_price=$row['pro_price'];
      
    echo "<div class='col-md-4 mb-2'> 
      <div class='card' >
    <img class='card-img-top' src='./admin/pro_imgs/$img1' alt='Card image cap' >
    <div class='card-body'>
      <h5 class='card-title'>$pro_title</h5>
      <p class='card-text'>$pro_desc </p> <p class='card-text'> price : $pro_price </p>
      <a href='index.php?add_to_cart=$pro_id' class='btn btn-info'>Add to card</a>   
          <a href='index.php' class='btn btn-secondary'>Go home</a>

      </div>
    </div>
      </div>";
      echo "<div class='col-md-4 mb-2'> 
      <div class='card' >
    <img class='card-img-top' src='./admin/pro_imgs/$img2' alt='Card image cap' >
    <div class='card-body'>
    <h5 class='card-title'>$pro_title</h5>
    <p class='card-text'>$pro_desc </p>
      </div>
    </div>
      </div>";

      echo "<div class='col-md-4 mb-2'> 
      <div class='card' >
    <img class='card-img-top' src='./admin/pro_imgs/$img3' alt='Card image cap' >
    <div class='card-body'>
    <h5 class='card-title'>$pro_title</h5>
    <p class='card-text'>$pro_desc </p>
      </div>
    </div>
      </div>";


}
}

 }

//get  ip addrss
  function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
$ip = getIPAddress();  

// cart 
function cart(){
  global $con;

  if(isset($_GET['add_to_cart'])){

    $ip = getIPAddress();  
    $pro_id=$_GET['add_to_cart'];
    $query="select * from cart_details  where ip_address ='$ip' and product_id='$pro_id' ";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
        if($num > 0){
          echo "<script>alert('this item is already added to cart !')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
  }else{

    $insert="insert into cart_details (product_id ,ip_address ,quantity) values (' $pro_id','$ip',0)";
    $result=mysqli_query($con,$insert);
    echo "<script>alert(' item is added to cart succesfylly !')</script>";
   
    echo "<script>window.open('index.php','_self')</script>";

  }
}
}

 
// cart item numbers 
function cart_item(){
return getIPAddress();  
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();  
    $pro_id=$_GET['add_to_cart'];
    $query="select * from cart_details  where ip_address ='$ip'  ";
    $result=mysqli_query($con,$query);
    $num_items=mysqli_num_rows($result);
     
  }else{
    global $con;
    $query="select * from cart_details  where ip_address ='$ip' ";
    $result=mysqli_query($con,$query);
    $num_items=mysqli_num_rows($result);
       
  }
  echo $num_items;
}
// total price

function total_price(){
  
    global $con;
    $ip = getIPAddress();  
    $total_price=0;
   
    $query="select * from cart_details  where ip_address ='$ip'  ";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($result)){
     $pro_id=$row['product_id'];
     $query2="select * from products  where pro_id='$pro_id'  ";
     $result2=mysqli_query($con,$query2);
     while($row=mysqli_fetch_assoc($result2)){
     
$product_price=array($row['pro_price']);
$product=array_sum($product_price);
$total_price+=$product;



     }}
     echo $total_price;
    }

//}

// user profile

function user_order_details(){
  global $con;
  $ip = getIPAddress();  
  $username=$_SESSION['username'];
  $user="select * from user_table where username='$username'";
  $result1=mysqli_query($con,$user);
 
 while( $row=mysqli_fetch_assoc($result1) ){

  $user_id=$row['user_id'];
  if(!isset($_GET['edit_account'])){

   if(!isset($_GET['delete_account'])){
    
  if(!isset($_GET['my_orders'])){

    $order="select * from user_orders where user_id='$user_id' and order_status='pending'";
    $result=mysqli_query($con,$order);
    $num=mysqli_num_rows($result) ;

  
if($num >0){
  echo "<h3> your profile has $num pending orders </h3><br>";
   echo "<a class='text-dark' href='profile.php?my_orders'  > <h3>my orders</h3><br></a> ";
}else{
  echo "<h3> your profile has zero pending orders </h3><br>";
   echo "<a class='text-dark' href='../index.php'  > <h3>explore products</h3><br></a> ";

}
   }}}}}
















 ?>