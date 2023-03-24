<?php
include 'connection.php';
if(isset($_POST['log_submit']))
{
    $password=$_POST['password'];
    $email=$_POST['email'];
    $catagory=$_POST['catagory'];
    echo"$catagory";
    if($catagory=="admin")
    {
        $sql="select * from `admin` where email='$email' and password='$password'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($result){
            header('location:admin.php');
        }
        else{
            header('location:login.html');
        }
        
    }
    else if($catagory=="user")
    {
        $sql="select * from `register` where email='$email' and Password='$password'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            header('location:home.php');
        }
        else{
            header('location:login.html');
        }

    }
    else if($catagory=="shopkeeper")
    {
        $sql="select * from `register` where email='$email' and Password='$password'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            header('location:shopkeeper.php');
        }
        else{
            header('location:login.html');
        }

        
    }
    
    else{
        echo"invalid";
    }

}

?>