

<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "information";
$con = mysqli_connect($server,$user,$password,$db);
if($con){
    ?>
    <script>
   
    </script>
    <?php
}else{
    ?>
    <script>
        alert(" no connection ");
    </script>
    <?php
}
?>




