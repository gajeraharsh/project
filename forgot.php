<?php
 session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <?php
     include 'connection.php';
     if(isset($_POST['submit'])){
         $email = $_POST['email'];
        
         $passwordu = $_POST['password'];
         $pass = password_hash($passwordu,PASSWORD_DEFAULT);
         $email_search = "select * from singup where email = '$email'";
         $query = mysqli_query($con,$email_search);
         $email_count = mysqli_num_rows($query);
         if($email_count == 1){
          
            
           
               

                $sql = "UPDATE SINGUP SET password  = '$pass' WHERE email = '$email '";
               $check =  mysqli_query($con,$sql);
                if($check){
                    
                    echo "<script>alert('your password change successfuly');
                    location.replace('login.php');
                    </script>";


                }else{
                    echo "<script>alert('password not change successfully ')</script>";
                }

            
             
              
              
                
        
         }else{
            echo "<script>alert('invalid email')</script>";
         }

     }
     
     

    ?>

    <style>
    *{
        margin:0px;
        padding:0px;
    }
    .container{
        
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color:#81d0ff;
        width: 100%;
   
        height: 95vh;
      
   
    }
    .container form{
        display: flex;
        align-items: center;
        flex-direction: column;
        background-color: white;
        width:40%;
        
    }
    .margin{
        margin-top: 20px;
        width: 95%;
        border: 2px solid black;
        padding: 7px 0px;
    }
    .btn:hover{
    background-color: white; 
  color: black; 
  border: 2px solid black;
}
.btn{
    background-color: #4CAF50;
    color: white;
    width: 170px;
    
    transition: 0.3s;


}
.container h2{
    color: black;
}


@media (max-width: 330px){

   .container form{
       width: 100%
   }
}
@media (max-width: 360px){
    .container form{
       width: 100%
   }
}
    
    </style>
</head>
<body>

    




<div class="container">
<form action="<?php ?>" method="post">
   <h2>forgot your password</h2>


<input class="margin" type="email" name="email" placeholder="email"required>

<input class="margin" type="password" name="password" placeholder="change your passsword"required>
<input class="margin btn" type="submit" onclick="return check()" value="change" name="submit">


<p>you forgont your password</p><a href="login.php">login</a>


</div>
</form>
</body>
</html>