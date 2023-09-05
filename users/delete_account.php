<?php  include('../includes/conn.php');  

if(isset($_GET['delete_account'])){
    $username=$_SESSION['username'];
  $select="select * from user_table where username='$username'";

$result=mysqli_query($con,$select);
$row=mysqli_fetch_assoc($result);
$username=$row['username'];
$email=$row['user_email'];
$user_id=$row['user_id'];


if(isset($_POST['user_delete'])){

    $delete="delete from user_table where user_id=$user_id";
    $result2=mysqli_query($con,$delete);
    print_r($result2);
    echo $delete;
    if($result2){
        echo "<script> alert('paccount has been deleted successfully')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
    }else{
        echo "<script> alert('account has not been deleted successfully')</script>";
         // die(myaqli_error($result2));
    
    }

    }
    if(isset($_POST['return'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>delete account</title>
</head>

<body>
<style>
    .div3{
        width:77% ;
        height: 75%;
        text-align:center;
        justify-content:center;
        float:right;
    }
    </style>


<h3>Delete Account :</h3>

<div class="div3" class="form-outline mb-4">
  <form class="form-control"  action="" method="post" enctype="multipart/form-data">
  <label for="fname"><h4><h4></label>
    <input type="text" id="username" name="username" value="<?=$username;?>" placeholder="user name.."  class="form-control" >

    <label for="lname"><h4><h4></label>
    <input  class="form-outline mb-4 w-55 margin-auto"type="email" value="<?=$email;?>"  class="form-control"
     name="user_email" placeholder="email..">

     <h6>please , make sure you want delete this account !</h6>
    <input class="bg-danger" type="submit" value="delete"  name="user_delete">
    <a href="profile.php"><input class="bg-info" type="submit" value="return"  name="return"></a>
    </form>
</div>
 
</body>
</html> 