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
         $password = $_POST['password'];
         $email_search = "select * from singup where email = '$email'";
         $query = mysqli_query($con,$email_search);
         $email_count = mysqli_num_rows($query);
         if($email_count == 1){
            $email_pass = mysqli_fetch_assoc($query);
            $dbpassword = $email_pass['password'];
            $password_decord = password_verify($password,$dbpassword);
            if($password_decord){
               

                $_SESSION['email'] = $email_pass['email'];
                $_SESSION['name'] = $email_pass['name'];
                $_SESSION['mobil'] = $email_pass['mobil'];
                $_SESSION['id'] = $email_pass['id'];
            
             
                header('location:index.php');
                if(!isset($_SESSION['username'])){
                    echo "<script>alert('login successful')</script>";
                 }
              
                
            }else{
                echo "<script>alert('incorect password')</script>";
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
   <h2>login</h2>


<input class="margin" type="email" name="email" placeholder="email"required>

<input class="margin" type="password" name="password" placeholder="password"required>
<input class="margin btn" type="submit" onclick="return check()" value="login" name="submit">

<p>you not have any acount</p><a href="singin.php">singup</a>
<p>you forgon your password</p><a href="forgot.php">forgot</a>


</div>
</form>
</body>
</html>