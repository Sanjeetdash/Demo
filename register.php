<?php
include 'connection.php';
if(!$con)
{
    die(mysqli_error($con));
}

if(isset($_POST['reg_submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password1=$_POST['password1'];
    echo"$password1";

    $sql="insert into `register` (name,email,password) values('$name','$email','$password1')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo"inserted";

    }
    else{


        
        die(mysqli_error($con));
        
    }
}


?>