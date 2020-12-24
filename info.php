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
  $info = $_POST['textarea'];
  $filename = $_FILES["uploadfile"]["name"]; 
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  if($name == ""|| $info == ""){
  $passmsg =  '<div class="c"><h3 style="color:red;">fild all details</h3/div>';
  }else{

  
		$folder = "uplod/".$filename; 


  
 

     if (move_uploaded_file($tempname, $folder)) { 
      
      $sql = "INSERT INTO info_submit2 (infoh1,info,img) VALUES ('$name','$info','$filename')";
      $chec = mysqli_query($con,$sql);
      if($chec){
        
        
         $passmsg =  '<div class="c"><h3>your data submitad </h3/div>';
         
        
        }
        

   }else{ 
     $passmsg =  '<div class="c"><h3 style="color:red;">imge not uplode </h3/div>';
 } 
  }

  }
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/info.css">
  <link rel="stylesheet" href="css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <style>
.info-box{
  margin-top: 50px;
}
body{
  background-color:#ffffff;
}
.t1{
  border: 2px solid black;
  height: 36px;
  margin: 0px 5px;
}
.btn-submit{
    margin-left: 0px;
    margin-bottom: 10px;
}
.c{
  
   text-align: center;
}

.c h3{
  color:#4fce70;
}
.mr{
  
  padding: 8px 0px;

}
.informstion-form{

  border: 2px solid black;
}
.heding-info h1 {
    font-size: 35px;
    text-align: center;
}
.mr label{
     font-size:30px;
     text-align:center;
}
.btn-back{
  display:flex;
  justify-content: center;
}
@media (max-width: 360px){
.info-box {
    flex-direction: column;
    height: 550px;
    width: 96%;
}
.search .searchsubmit{
    width: 160px;
    height: 40px;
    border: 1px solid black;
}
.img-box img{
    width: 100%;
    height: 100%;
}
.search{
    margin-top: 90px;
}

}




@media (max-width: 330px){
  .search .searchsubmit{
    width: 160px;
    height: 30px;
}
.footer-row h2 {
    color: white;
    font-size: 16px;
}
}
@media (max-width: 360px){
  .footer-row h2 {
    color: white;
    font-size: 16px;
}
.informstion-form{
  width:98%;
  border: 2px solid black;
}
.btn-submit{
  margin-left: 0%;
}
.btn-back{
  display:flex;
  justify-content: center;
}
.t1{
  height: 35px;
  border: 1px solid black;
}
.mr{
  padding: 8px 0px;
}
.mr label{
     font-size:30px;
     text-align:center;
}
}
  </style>
  <title>informations</title>
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
        <a href="profile.php"><li><i class="fas fa-user-circle bar1"></i></li></a>


      </ul>

    </div>
    <a href="#" onclick="java()" id="bar4" class="bar2"><i class="fas fa-bars"></i></a>
    <a href="#" onclick="jav()" id="jave" class="bar3"><i class="far fa-window-close"></i></a>

  </div>
  
  <section class="information-bigcontainer">
  
    <div class="search">
      <input type="text" class="searchbox" placeholder="search..">
      <input type="submit" class="btn button searchsubmit" value="search">
    </div>
    <div class="c">
    
                <?php if(isset($passmsg)){ echo $passmsg; }  ?>  
    </div>
    
      
  <section class="informstion-form" >
    <form action="" method="POST"   enctype="multipart/form-data"> 
      <div class="mr">
        <label for="">your info headding</label>
        <input class="t1" type="text" placeholder="hadding" name="name" >
      </div>
      <div class="mr">
        <label for="">upload your img</label>
        <input class="t1" type="file"  name="uploadfile" >
      </div>
      <div class="mr">
        <label for="">eanter your information</label>
        <textarea class="t1" name="textarea" id="textarea" cols="30" rows="10" 
          placeholder="informarion.."></textarea>
      </div>
      <div class="btn-back">
      <input class="btn btn-submit" id="submit" type="submit" value="submit" name="submit">
      </div>
    </form>



  </section>
    <?php
    

       $sql = "SELECT * FROM info_submit2";
       $result = mysqli_query($con,$sql);
     
       while( $row = mysqli_fetch_assoc($result)){
        // echo $row['infoh1'];
     $h1 = $row['infoh1'];
     $info = $row['info'];
     $imgp = $row['img'];
     
        echo '     
        
        <div class="info-box">
        
        <div class="img-box">
        <img src="uplod/' . $imgp . '" >
      </div>
      <div class="information">
        <div class="heding-info">
          <h1>' . $h1 . '</h1>
        </div>
        <p>' . $info . '</p>
      </div>
    </div>';

       }

    ?>

  </section>

  <section class="footer">
    <div class="footer-row">
      <h2>Copyrights 2008-20. All Rights Reserved. Privacy | Terms | Infringement | View Just Dial on Smartphone| Mobile
      </h2>
    </div>
  </section>











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