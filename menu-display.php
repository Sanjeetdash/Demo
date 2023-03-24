<?php
  include 'connection.php';
  if(isset($_POST['submit']))
  {
    $dish_name=$_POST['dish_name'];
    $dish_desc=$_POST['dish_desc'];
    $dish_price=$_POST['dish_price'];
    $dish_type=$_POST['dish_type'];
    
    
    $sql="insert into `menu` values('0','$dish_name','$dish_desc','$dish_price','$dish_type')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
      
    //   header('location:menu_display.php');
    }
    else{
      die(mysqli_error($conn));

    }

  }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <title>Document</title>
</head>
<body>
<div class="display-box">
    <table class="table bg-light" style="border-radius:5px;" >

      <thead>
        <tr class="table-th">
          
          <th class="col mr-3">DISH NAME</th>
          <th class="col">DISH DESC</th>
          <th class="col">DISH PRICE</th>
          <th class="col">DISH TYPE</th>
          <th class="col">Op</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $sql="select * from menu";
      $result=mysqli_query($con,$sql);
      if($result)
      {
        while($row=mysqli_fetch_assoc($result))
          {
            $id=$row['dish_id'];
            $dish_name=$row['dish_name'];
            $dish_desc=$row['dish_desc'];
            $dish_price=$row['dish_pricce'];
            $dish_type=$row['disht_type'];

              echo'
             <tr>
              
                      <td>'.$dish_name.'</td>
                      <td>'.$dish_desc.'</td>
                      <td>'.$dish_price.'</td>
                      <td>'.$dish_type.'</td>
                      <td>
                        <button class="btn "style="background-color:#2b6777;"><a href="delete.php?delid='.$id.'" class="text-light line"><i class="fa-solid fa-trash"></i></a></button>
                        <button class="btn "style="background-color:#2b6777;"><a href="update.php?updateid='.$id.'" class="text-light line">  <i class="fa-solid fa-pen-to-square"></i></a></button>
               </tr>';
            }
            
          }
          
          ?>

        </tbody>
        
      </table>
    </div>
    
    
</body>
</html>