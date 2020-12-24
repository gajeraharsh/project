<?php
  session_start();
  if(!isset($_SESSION['email'])){
    header('location:login.php');
    
 }
?>
       <?php
include 'connection.php';



$emails =   $_SESSION['email'];


$sql = " SELECT * FROM singup where email = '$emails' ";
$result = mysqli_query($con,$sql);
$r = mysqli_num_rows($result);
   if($r==1){
  
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $email = $row['email'];
    $mobil= $row['mobil'];
   }
  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profil.css">
  <link rel="stylesheet" href="css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <style>

* {
            margin: 0px;
            padding: 0px;
        }
        .session{
            width: 100%;
             
         height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-direction: column;
            justify-content: center;
          background-color: #e4d7d7;
         height: 100vh;
        }
        .big-connteiner{
                  display: flex;
                  flex-direction: column;    
                background-color: #00ff37;
                width: 40%;
                height: auto;
              box-shadow: 0px -1px 6px 0px grey;;
        }
        .ditail-h{
            display: flex;
            justify-content: center;

        }
        .ditail-h h1{
            padding: 15px 0px;
        }
        .p{
            display: flex;
            padding: 10px 0px;
            
        }
        .details{
            display: flex;
          
            flex-direction: column;
            align-items: center;
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
        .logout{
          padding: 7px 43px;
        }
        @media (max-width: 360px){
            .big-connteiner{
                width: 99%;
            }
            .c{
              display: flex;
              align-items: center;
          flex-direction: column;
            }
            .c h2{
              font-size: 21px;
            }
        }
  </style>
    <title>Document</title>
</head>
<body>
<div class="top">
    <div class="logo">
      <h1>harsh</h1>
    </div>
    <div class="nav" id="nav">

      <ul>
        <li><a href="index.php">home</a></li>
        <li><a id="a2" href="info.php">info</a></li>
        <li><a href="#">services</a></li>
        <li><a href="conntect.php">conntect</a></li>
        <a  href="profile.php"><li><i id="a5" class="fas fa-user-circle bar1"></i></li></a>


      </ul>

    </div>
    <a href="#" onclick="java()" id="bar4" class="bar2"><i class="fas fa-bars"></i></a>
    <a href="#" onclick="jav()" id="jave" class="bar3"><i class="far fa-window-close"></i></a>
  </div>


  <div class="session">

<div class="big-connteiner">





    <div class="ditail-h">
        <h1>Profil details</h1>
    </div>
    <div class="details">
    <div class="p c">
            <h2>Email : </h2>
            <h2><?php echo $email ?></h2>
        </div>
        <div class="p">
            <h2>Name : </h2>
            <h2><?php echo   $name  ?></h2>
        </div>
      
        <div class="p">
            <h2>Mobil no. : </h2>
            <h2><?php echo   $mobil  ?></h2>
        </div>
        <div class="logout">
        <a href="logout.php"><button class="buttton logout">logout</button></a>
        </div>

               <div class="up">
                   <p>upder your Profil</p>
                 <a href="updet.php"><button class="buttton">updet</button></a>
               </div>

    </div>


</div>

</div>





  



  <script>
    function java() {
      var e = document.getElementById('nav');
      var r = document.getElementById('jave');
      var t = document.getElementById('bar4');
      if (e.className === 'nav') {
        e.className += " resposive";
      } else {
        e.className = "nav";
      }
      if (r.className === 'bar3') {
        r.className += " end";
      } else {
        r.className = "bar3";
      }
      if (t.className === 'bar2') {
        t.className += " end2";
      }


    }
    function jav() {
      var r = document.getElementById('nav');
      var t = document.getElementById('jave');
      var y = document.getElementById('bar4');
      if (r.className === 'nav') {
        r.className += " resposive";
      } else {
        r.className = "nav";
      }
      if (y.className = 'end2') {
        y.className = "bar2";
        t.className = "bar3";

      }

    }



    var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



  </script>

</body>
</html>