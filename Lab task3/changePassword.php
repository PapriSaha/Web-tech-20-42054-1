<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<style>
.error {color: #FF0000;}
.font {color: black;}
 body {background-color: #FFFFFF;}
</style>
</head>
<?php
 $currentPassErr = $newPassErr = $currentnewPassErr ="";
 $newPass = $currentnewPass = $errmessage= "";
 $currentPass= 'abc@1234';
 if(isset($_POST["submit"])){  
 if(empty($_POST["currentPass"])){  
   $currentPassErr = "Current Password is Required!";  
      } 
      else if($_POST['currentPass'] == $currentPass){
       echo "Current Password is matched";
      }
      else{
      $currentPassErr = "Current password is not matched!";
      }
     if($_POST["currentPass"] == $_POST["newPass"]) {
     $newPassErr = "New Password should not be the same as current Password!";
      }
     if(empty($_POST["newPass"])){
      $newPassErr ="New Password is Required!";
        }
     else{
      $newPass= $_POST['newPass'];
      if(!preg_match('/^[0-9A-Za-z!@#$%]*$/',$newPass)){
      $newPassErr ="Password must contain Alphabets,Numbers,Special Charecter!";
       }
     }
  if(empty($_POST["currentnewPass"])) {
            $currentnewPassErr = "Retype New password!";
        } 
   else if($_POST["newPass"] !== $_POST["currentnewPass"]){
            $cnewPassErr = "Confirm password is not matched!";
    }
   else{
       $message = "<h4>Password Changed Successfuly</h4>";
    }
 }
?>
<body class="font">
<form method="post" action="">
<fieldset>
<legend><h3>CHANGE PASSWORD</h3></legend>
<table>
<tr>
<td><label for="currentPass">Current Password</label></td>
<td>:<input type="text" id="currentPass" name="currentPass" placeholder="abc@1234" value="">
<span class="error">* <?php echo $currentPassErr; ?></span></td>
</tr>
<tr>
<td><label for="newPass">New Password</label></td>
<td>:<input type="text" id="newPass" name="newPass" >
<span class="error">* <?php echo $newPassErr; ?></span></td>
</tr>
<tr>
<td><label for="cnewPass"> Retype New Password</label></td>
<td>:<input type="text" id="currentnewPass" name="currentnewPass" >
<span class="error">* <?php echo $currentnewPassErr; ?></span></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Submit" style="font-size: 16px;"></td>
</tr>
<tr>
<td colspan="2">
<?php  
if(isset($errmessage)){
echo "<br>".$errmessage;
} 
?>
</td>
</tr>
</table>
</fieldset>
</form>      
</body>
</html>