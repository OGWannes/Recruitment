<?php


global $con;
include_once 'valid.php';


if(isset($_GET['email'])){
    $email=$_GET['email'];

    $sql="DELETE FROM persone WHERE email=$email";
    $res = mysqli_query($con,$sql);
    if($res){
        echo "<script>alert('Your Account is Deleted Successfully')</script>";
        header('location:index.php');
    }else{
        echo "<script> alert('Error deleting your account please contact us via mail.')</script>";
    }

}


?>