<?php
if(isset($_GET['edit_account'])){
    $username=$_SESSION['username'];
    $query="select * from user_table where username ='$username'";
    $result=mysqli_query($con,$query);
$num_cart=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
$user_id=$row['user_id'];
$username=$row['username'];
$email=$row['user_email'];
$phone=$row['user_mobile'];
$address=$row['user_address'];
$img=$row['user_img'];
}
global $con;
if(isset($_POST['user_update'])){
    $username=$_SESSION['username'];
    $query="select * from user_table where username ='$username'";
    $result=mysqli_query($con,$query);
    $update_id=$user_id;
    $username=$_POST['username'];
    $email=$_POST['user_email'];
    $phone=$_POST['user_mobile'];
     $address=$_POST['user_address'];
    
    $user_img=$_FILES['user_img']['name'];
    $temp_img=$_FILES['user_img']['tmp_name'];
    move_uploaded_file($temp_img,"./user_imgs/$user_img");

    $update="update user_table set  username='$username', user_email=' $email', user_mobile='$phone', 
     user_address='$address',  user_img='$user_img' where user_id=$update_id ";

     $result2=mysqli_query($con,$update);
     if(!$result2){

	die(mysqli_error($con));
}else{

        echo "<script> alert('Your account is updated ,thank you :)')</script>";
        echo "<script> window.open('logout.php','_self')</script>";

     }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>

<body>
<style>
    .div3{
        width:57% ;
        height: 55%;
        text-align:center;
        justify-content:center;
        float:right;
    }
    </style>

   
<h3>Edit Account :</h3>

<div class="div3" class="form-outline mb-4">
  <form class="form-control"  action="" method="post" enctype="multipart/form-data">
  <label for="fname"><h4><h4></label>
    <input type="text" id="username" name="username" value="<?=$username;?>" placeholder="user name.."  class="form-control" >

    <label for="lname"><h4><h4></label>
    <input  class="form-outline mb-4 w-55 margin-auto"type="email" value="<?=$email;?>"  class="form-control"
     name="user_email" placeholder="email..">

    <input type="file" id="img"  value="src='./user_imgs/<?=$img;?>'"  name="user_img" placeholder="your image.." class="form-control"  >

    <input type="text" id="address" name="user_address" value="<?=$address;?>" placeholder="your address.." class="form-control"   >

    <input type="text" id="lname"  name="user_mobile" value="<?=$phone;?>" placeholder="contact field.."  class="form-control"  >


    <input class="bg-info" type="submit" value="update"  name="user_update">
    </form>
</div>
 
</body>
</html> 