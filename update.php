<?php
include 'connection.php';
if(isset($_GET['updateid'])){
    $id=$_GET['updateid'];
    $sql="select * from menu where dish_id=$id ";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $row=mysqli_fetch_assoc($result);
        $dish_name=$row['dish_name'];
        $dish_desc=$row['dish_desc'];
        $dish_price=$row['dish_price'];
        $dish_type=$row['dish_type'];

        if(isset($_POST['update']))
        {
            $dish_name=$_POST['dish_name'];
            $dish_desc=$_POST['dish_desc'];
            $dish_price=$_POST['dish_price'];
            $dish_type=$_POST['dish_type'];
            
            $sql="update `menu` set dish_id='$dish_id',dish_name='$dish_name',dish_desc='$dish_desc',dish_price='$dish_price',dish_type='$dish_type' where dish_id=$id";
            $result=mysqli_query($con,$sql);
            if($result)
            {
            header('location:menu.php');
            }
            else{

            die(mysqli_error($conn));

            }

        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
  <style>

    *{
        margin:0px;
        padding:0px;

    
    }

    .box-up{
        background-color: #2b6777;
    padding: 20px;
    display: block;
    margin: 10vw;
    border-radius: 10px

    }

        form{
        padding: 10px 25px;
       
     
        }
        .mainbox{
         
          display:flex;
          justify-content:center;
        }
        label{
        
         margin:auto;
         font-size: 20px;
         color: aliceblue; 
        }

        @media screen  and (min-width:520px){
        .box-up{
        background-color: #2b6777;
        padding: 20px;
        display: block;
        margin: 20vw;
        border-radius: 10px

    }
            
        }
  </style>
</head>

<body>
  <div class="box-up my-4 "style="">
    <form method="post">
    <label for="">UPDATE HERE</label>
      <div class="box my-3">
        
        <div >
         
          <input type="text" class="form-control my-3" name="dish_name" placeholder="Dish name"  value="<?php echo$dish_name?>"autocomplete="off">
        </div>
        <div class="">
        <textarea name="dish_desc" class="form-control" style="height: 100px"placeholder="Dish_desc"  value=""><?php echo$dish_desc?></textarea>
 
        </div>
        <div >
          
          <input type="text" class="form-control my-3" name="dish_price" placeholder="price" autocomplete="off"  value="<?php echo$dish_price?>">
        </div>
        <div >
          <select name="dish_type" id="" class=" form-control  my-3 " >
            <option value=" ">--DishType--</option>
            <option value="Nonveg" <?php if($dish_type=="Nonveg")echo"selected"?>>Nonveg</option>
            <option value="Veg"<?php if($dish_type=="Veg")echo"selected"?>>Veg</option>
          </select>
        </div>
        <div>
          <button name="update" class="form-control btn btn-primary my-3 ">Update</button>
        </div>
        
      </div>
  </div>

</body>

</html>