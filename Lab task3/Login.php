<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
.error {color: #FF0000;}
.font {color:black;}
body{background-color: #FFFFFF;}
</style>
</head>
<?php
$unameErr = $passErr ="";
$uname = $pass ="";
$errmessage = '';  
if($_SERVER["REQUEST_METHOD"] == "POST"){  
if(empty($_POST["user"])){  
   $unameErr = "User Name is required";  
 }
  else if(strlen($_POST["user"]) <2){
  $unameErr = "User Name must contain at least two (2) characters";
 }
 else{
   $uname = $_POST['user'];
  if(!preg_match("/^[a-zA-Z0-9_ .-]*$/",$uname)){
   $unameErr = "User Name can contain alpha numeric characters, period, dash or underscore only!";
  }
}
if(empty($_POST["pass"])){  
  $passErr = "Password is required";  
 }  
 else if(strlen($_POST['pass']) <8){
  $passErr = "Password must not be less than eight (8) characters";
 }  
 else{  
  $message = "<h4>Successfully logged in</h4>";
  }  
}  
?>
<body class="font">
<form method="post" action="">
<fieldset>
<legend><h3>LOGIN</h3></legend>
<table>
<tr>
<td><label for="uname">User Name ;</label></td>
<td>:<input type="text" id="uname" name="uname">
<span class="error">* <?php echo $unameErr; ?></span></td>
</tr>
<tr>
<td><label for="pass">Password</label></td>
<td>:<input type="password" id="pass" name="pass">
<span class="error">* <?php echo $passErr; ?></span></td>
</tr>
<tr>
<td colspan="2"><input type="checkbox" name="remember" value="remember">Remember Me</td>
</tr>
<tr>
<td><br></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" style="font-size: 15px;"> <a href="#">Forgot Password?</a></td>
</tr>
<tr>
<td colspan="2">
<?php  
if(isset($errmessage)){
echo "<br>" .$errmessage;
} 
?>
</td>
</tr>
</table>
</fieldset>
</form>      
</body>
</html>