<!DOCTYPE html>
<html>
<head>
<title>Profile Picture</title>
<style>
.error {color: #FF0000;}
.center {margin-left: auto; margin-right: auto; margin-top: 20px;}
.font {color:black;}
body {background-color: #FFFFFF;}
</style>
</head>
<?php
$uploadErr=$uploadSuccess="";
$errmessage="";
$success="";
$successImg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){   
    $target_file="files/".$_FILES["fileupload"]["name"];
    $file_extension = pathinfo($_FILES["fileupload"]["name"], PATHINFO_EXTENSION);
    $allowed_image_extension = array("png","jpg","jpeg","PNG","JPG","JPEG");
 if (!in_array($file_extension, $allowed_image_extension)){
   $uploadErr = "Upload valid images. Only PNG,JPG and JPEG are allowed.";
    } 
else if(($_FILES["fileupload"]["size"] > 4000000)){
  $uploadErr= "Image size exceeds 4MB";
    } 
else if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_file)){
       $uploadSuccess= "you have uploaded ".$_FILES["fileupload"]["name"];
       $successImg= "<img src=" .$target_file.">";
       $message = "Image uploaded successfully.";
 }
}
?>
<body class="font">
<form method="post" action=""enctype="multipart/form-data">
<fieldset>
<legend><h3>PROFILE PICTURE</h3></legend>
<table>
<tr>
<td colspan="2"><img src="https://media.istockphoto.com/vectors/user-icon-people-icon-isolated-on-white-background-vector-vector-id1210939712?k=20&m=1210939712&s=612x612&w=0&h=xJqEPQnMiNofprbLXWdEtJQ75QL79lQ5N76J4JOdTIM=" alt="sampleImage" height="180px"></td>
</tr>
<tr>
<td><input type="file" name="fileupload" value="No file chosen"  style="font-size: 15px;"></td>
</tr>
<tr colspan="2">
<td><span class="error"><?php echo $uploadErr; ?></span></td>
</tr>
<tr><td colspan="2">
<?php  
if(isset($errmessage)){
echo $errmessage;
}
?>
</td>
</tr>
</table>
<br>
<input type="submit" value="Submit"  style="font-size: 15px;">
</fieldset>
<table class="center">
<tr>
<td>
<?php  
if(isset($uploadSuccess)){
echo $uploadSuccess;
}
?>
</td>
</tr>
<tr>
<td>
<?php
if(isset($successImg)){
  echo $successImg;
}
?>
</td>
</tr>
</table>
</form>      
</body>
</html>