<?php
 session_start();


if(!isset($_SESSION['email'])){
   header('location:login.php');
   
}
?>
<?php 
    include 'connection.php';
       if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $feedback = $_POST['feedback'];


          $sql = "INSERT INTO feedback (name,email,feedback) VALUE('$name' , '$email' , '$feedback')";
          $query = mysqli_query($con,$sql);
             if($sql){
              $passmsg =  '<div class="c"><h3 style="color: #4fce70;">your data submitad </h3/div>';
             }else{
              $passmsg =  '<div class="c"><h3 style="color:red;">fild all details</h3/div>';
             }
       }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <style>


@media (max-width:330px){
  .informstion-form{
    width: 100%;
  }
}

 @media (max-width: 360px){
.info-box {
    flex-direction: column;
    height: 550px;
    width: 96%;
}
.mr{
    margin-left: 6px;
}
.container2{
  align-items: center;
}
  form .t1{
  width: 270px;
}
.informstion-form{
 width: 99%;
}
}
  </style>
</head>

<body>
  <div class="top">
    <div class="logo">
      <h1>harsh</h1>
    </div>
    <div class="nav" id="nav">

      <ul>
        <li><a id="a1" href="index.php">home</a></li>
        <li><a href="info.php">info</a></li>
        <li><a href="#">services</a></li>
        <li><a href="conntect.php">conntect</a></li>
         <a href="profile.php"><li><i class="fas fa-user-circle bar1"></i></li></a>

      </ul>

    </div>
    <a href="#" onclick="java()" id="bar4" class="bar2"><i class="fas fa-bars"></i></a>
    <a href="#" onclick="jav()" id="jave" class="bar3"><i class="far fa-window-close"></i></a>
  </div>
  
 

  <div class="bigcontainer">

    <div class="hometext">
      <h1>you interasted information to world? you have right website coming you</h1>
      <p>most popular information you,you can read information.</p>
    <a href="info.php"><button class="btn button">click hear</button></a>

    </div>
    <div class="right_ing">
      <div class="c"><img src="" alt=""></div>
    </div>
  </div>
  <div class="search">
    <input id="search" type="text" class="search1" placeholder="search" name="search">
    <input id="submit2" type="submit" class="s1 btn" value="search" name="submit">
  </div>


  <div class="hedding1">
    <h1>selact catagoris</h1>
  </div>



  <section class="cards">


    <div class="card">
      <img src="img/p2.jfif" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>politation</b></h4>
        <p>Architect & Engineer</p>
        <button class="btn button btn-cards">click</button>
      </div>
    </div>


    <div class="card margin-cards">
      <img src="img/p3.jfif" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>gaming</b></h4>
        <p>Architect & Engineer</p>
        <button class="btn button btn-cards">click</button>
      </div>

    </div>


    <div class="card margin-cards">
      <img src="img/p4.jfif" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>animals</b></h4>
        <p>Architect & Engineer</p>
        <button class="btn button btn-cards">click</button>
      </div>

    </div>

  </section>
  <section class="feedback">
    <div class="rowcenter">
      <div class="hedding2">
        <h1>feedback</h1>
      
      </div>
     
    


    </div>
    <div class="container2" id="go">
      <form action="" method="post">
        <div class="mr">
          <label for="">name</label>
          <input class="t1" type="text" placeholder="eante your name" name="name" required>
        </div>
        <div class="mr">
          <label for="">email</label>
          <input class="t1" type="email" placeholder="enter your email" name="email" required>
        </div>
        <div class="mr">
          <label for="">your feed back</label>
          <textarea class="t1" name="feedback" id="textarea" cols="30" rows="10" required
            placeholder="eanter your feed back"></textarea>
        </div>
        <input class="btn btn-submit" id="submit" type="submit" value="submit" name="submit">
      </form>
      <div class="c" style="   text-align: center;">
    
    <?php if(isset($passmsg)){ echo $passmsg; }  ?>  
</div>
    </div>
  </section>
  <section class="footer">
    <div class="footer-row">
      <h2 style="font-size: 18px;">Copyrights 2008-20.All Rights Reserved. Privacy | Terms | Infringement | View Just Dial on Smartphone| Mobile
      </h2>
    </div>
  </section>
</body>




<script>
  function java() {
    var e = document.getElementById('nav');
    var r = document.getElementById('jave');
    var t = document.getElementById('bar4');
    if (e.className === 'nav') {
      e.className += " resposive";
    }else {
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

</html>