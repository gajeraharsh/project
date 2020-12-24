<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>singup</title>
  <link rel="stylesheet" href="css/reg.css">
            <style>
            *{
                margin:0px;
                padding:0px;
            }
            
            
            
            .he h2{
                font-size: 40px;
            }
            .h{
                height: 30px;
                border: 2px solid black;
            }
            .buttton{
            text-align: center;
            width: 100%;
            border: none;
            background-color: greenyellow;
            color: black;
            padding: 8px 0px;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 10px;
        }
        .buttton:hover{
            background-color: white;
            border: 2px solid black;


        }
    .con{
                    display: flex;
     flex-direction: column;
     align-items: center;
     background-color: #81d0ff;
     width: 100%;
     justify-content: center;
   height: 95vh;                 
                }
                .con form{
                    display: flex;
                    align-items: center;
                    flex-direction: column;
                    background-color: white;
                    width:40%;
              
                }
                .margin{
                    margin-top: 20px;
                    width: 88%;
                }
                .he h2{
                    color: black;
                }
                
@media (max-width: 330px){
   
.con form{
    width: 100%;
}
}
@media (max-width: 360px){
 
    .con form{
    width: 100%;
}      

}
            </style>
</head>
<body>



<?php
include 'connection.php';
       if(isset($_POST['submit'])){
           $username = mysqli_real_escape_string($con, $_POST['username']) ;
           $mo = mysqli_real_escape_string($con, $_POST['mobil']) ;
           $email = mysqli_real_escape_string($con, $_POST['email']) ;
           $password = mysqli_real_escape_string($con, $_POST['password']) ;
           $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
           $pass = password_hash($password,PASSWORD_DEFAULT);
           $cpass = password_hash($cpassword,PASSWORD_DEFAULT);

          
           $emailquery = " SELECT * FROM registration where email ='$email' ";
           $query = mysqli_query($con,$emailquery);
           $result = mysqli_num_rows($query);
           if($result>1){
               echo "<script>alert('email is alredy exist')</script>";
           }else{
            $_SESSION['ue'] = $username;

                $passquery = " SELECT * FROM singup where cpassword ='$cpassword' ";
                $que = mysqli_query($con,$passquery);
                $re = mysqli_num_rows($que);
                if($re>1){
                    echo "<script>alert('password is alredy exist choice strong password')</script>";
                }else{
             
           
              
                   $insertquery = "INSERT into singup( name, email,mobil,password, cpassword) values('$username','$email','$mo','$pass','$cpass')";
                   $iquery = mysqli_query($con,$insertquery);
                   if($iquery){
                 
                       
                      
                   echo "<script>alert(' signup success".$_SESSION['ue']." please login your acount')</script>";
                           echo "<script>
                               window.location.href = 'login.php';
                           </script>";
                     ?>
                       <?php
                       
                   }else{
                       
                    echo "<script>alert('try agin')</script>";
                       ?>
                       <?php
                   }
                }
            }
            }
           

       
           
       

     
?>







    <div class="con">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="f">
        <div class="he">
            <h2>singin</h2>
        </div>
        
            <input class="margin h" type="text" name="username" placeholder="username"required>

            <input class="margin h" type="text" name="mobil" placeholder="mobil nomber"required>

            <input class="margin h" type="email" name="email" placeholder="email"required>

            <input class="margin h" type="password" name="password" placeholder="password"required>

            <input class="margin h" type="password" name="cpassword" placeholder="conform password"required>

            <input class="margin buttton" type="submit" onclick="return check()" value="signup" name="submit" >

            <p>have your ancount</p><a href="login.php">login</a>
        </form>
    
        
    </div>
    <script>
        function check()
        {
            var pass = f.password.value;
            var cpass = f.cpassword.value;
            if(pass != cpass){
                alert('password are not idantified');
                return false;
            }else{
                return true;
            }
        }
    </script>
</body>
</html>