
<?php 
error_reporting(0); 
?> 
<?php 
$msg = ""; 

// If upload button is clicked ... 
if (isset($_POST['upload'])) { 

	$filename = $_FILES["uploadfile"]["name"]; 
	$tempname = $_FILES["uploadfile"]["tmp_name"];	 
		$folder = "uplod/".$filename; 
		
	$db = mysqli_connect("localhost", "root", "", "information"); 

		// Get all the submitted data from the form 
		$sql = "INSERT INTO info_submit2 (img) VALUES ('$filename')"; 

		// Execute query 
		$chec = mysqli_query($db, $sql); 
		if($chec){
			echo "check ok";
		}
		else{
			echo "check not ok";
		}
		
		// Now let's move the uploaded image into the folder: image 
		if (move_uploaded_file($tempname, $folder)) { 
		   echo "uplode success fully";
		}else{ 
			$msg = "Failed to upload image"; 
	} 
} 
$result = mysqli_query($db, "SELECT * FROM image"); 
?> 

<!DOCTYPE html> 
<html> 
  
<head> 
    <title>Image Upload</title> 
    <link rel="stylesheet" 
          type="text/css"
          href="style.css" /> 
          <style>
          #content{ 
	width: 50%; 
	margin: 20px auto; 
	border: 1px solid #cbcbcb; 
} 
form{ 
	width: 50%; 
	margin: 20px auto; 
} 
form div{ 
	margin-top: 5px; 
} 
#img_div{ 
	width: 80%; 
	padding: 5px; 
	margin: 15px auto; 
	border: 1px solid #cbcbcb; 
} 
#img_div:after{ 
	content: ""; 
	display: block; 
	clear: both; 
} 
img{ 
	float: left; 
	margin: 5px; 
	width: 300px; 
	height: 140px; 
} 

          </style>
</head> 
  
<body> 
    <div id="content"> 
  
        <form method="POST" 
              action="" 
              enctype="multipart/form-data"> 
            <input type="file" 
                   name="uploadfile" 
                   value="" /> 
  
            <div> 
                <button type="submit"
                        name="upload"> 
                  UPLOAD 
                </button> 
            </div> 
        </form> 
    </div> 
</body> 
  
</html> 