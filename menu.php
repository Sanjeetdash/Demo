
<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      
      form{
        background-color: #2b6777;
        padding: 10px 0px;
        margin: 10px;
        border-radius:10px;
      }
        .box{
            display: flex;
            flex-wrap:wrap;
            flex-direction:row;
            justify-content: space-around;
        }
        label{
          
          margin-left:20px;
          font-size: 18px;
          color: aliceblue; 
          
          
         }  
        
        table{
          
          margin:auto;
        }
      
        .display-box{
          margin:10px;
          padding:10px;
         
          background-color:#2b6777;
          border-radius:10px;
        }
       
       @media screen and (max-width:890px){
       
     
        .box{
        display:flex;
        flex-direction:column;
        
      
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
         font-size: 15px;
         color: aliceblue; 
        }  
    }       
    </style>
</head>

<body>
  <div class="mainbox ">
    
    <form   method="post" >
      <label for="">ADD MENU HERE</label>
      <div class="box my-3">
        
        <div >
         
          <input type="text" class="form-control my-2" name="dish_name" placeholder="Dish name" autocomplete="off">
        </div>
        <div >
          
          <textarea name="dish_desc" id="" cols="30" rows="3" placeholder="Dish_desc"></textarea>
        </div>
        <div >
          
          <input type="text" class="form-control my-2" name="dish_price" placeholder="price" autocomplete="off">
        </div>
        <div >
          <select name="dish_type" id="" class=" form-control input  my-2">
            <option value="">--DishType--</option>
            <option value="Nonveg">Nonveg</option>
            <option value="Veg">Veg</option>
          </select>
        </div>
        <div>
          <button name="sub" class="form-control btn btn-primary my-2 ">Submit</button>
        </div>
        
      </div>
    </form>
  </div>



        <?php
          include 'connection.php';
         if(isset($_POST['sub']))
          {
            $dish_name=$_POST['dish_name'];
            $dish_desc=$_POST['dish_desc'];
            $dish_price=$_POST['dish_price'];
            $dish_type=$_POST['dish_type'];
            
            
            $sql="insert into `menu` values('0','$dish_name','$dish_desc','$dish_price','$dish_type')";
            $result=mysqli_query($con,$sql);
            if($result)
            {
              
           header('location:menu.php');
            }
            else{
              die(mysqli_error($conn));
        
            }
        
          }
            
        ?>
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
            $dish_price=$row['dish_price'];
            $dish_type=$row['dish_type'];

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