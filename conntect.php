<?php
  session_start();
  if(!isset($_SESSION['email'])){
    header('location:login.php');
    
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/conntect.css">
  <link rel="stylesheet" href="css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
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
        <li><a id="a4" href="conntect.php">conntect</a></li>
        <a  href="profile.php"><li><i id="a5" class="fas fa-user-circle bar1"></i></li></a>


      </ul>

    </div>
    <a href="#" onclick="java()" id="bar4" class="bar2"><i class="fas fa-bars"></i></a>
    <a href="#" onclick="jav()" id="jave" class="bar3"><i class="far fa-window-close"></i></a>
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






  </script>

</body>
</html>