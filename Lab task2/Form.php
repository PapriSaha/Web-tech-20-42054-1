<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr =$ddErr =$mmErr =$yyyyErr = $degreeErr =$bloodgroupErr = "";
$name = $email = $gender =$dd= $mm =$yyyy= $degree = $bloodgroup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[A-Z][a-zA-Z -]+$/",$name)) {
      $nameErr = "Name must be from letters, dashes, spaces and must not start with dash";
    }
  } 
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
if(empty($POST["dd"])){
    $ddErr= "Date is required";
}
else{
    $dd= $_POST["dd"];

if (preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])$/",$dd)) {
   return true;
} else {
   return false;
}  
}
if(empty($POST["mm"])){
    $mmErr= "Month is required";
}
else{
    $mm= $_POST["mm"];

if (preg_match("/^(0[1-9]|1[0-2])$/",$mm)) {
    return true;
} else {
    return false;
}
}
if(empty($POST["yyyy"])){
    $yyyyErr= "Year is required";
}
else{
    $yyyy= $_POST["yyyy"];

if (preg_match("/^[0-9]{4}$/",$yyyy)) {
    return true;
} else {
    return false;
}
}

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
if(empty($_POST["degree"])){
    $degreeErr= "Degree is required";

}
else{
    $degree= $_POST["degree"];
}

if(empty($_POST["bloodgroup"])){
    $bloodgroupErr= "Blood Group is required";

}
else{
    $bloodgroup= $_POST["bloodgroup"];
}
}

?>

<h2>PHP Form Validation </h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <h4>NAME</h4><br>
  <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <h4>EMAIL</h4><br>
  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <table>
  <tr><h4>DATE OF BIRTH</h4></tr>
  <tr>
  <td>dd</td>
  <td>mm</td>
  <td>yyyy</td>
  </tr>
  <tr>
  <td>
  <input type = "text" size="6" name="dd" value= "<?php echo $dd;?>">
  <span class="error">* <?php echo $ddErr;?></span>
  </td>
  <td>
  /<input type = "text" size="6" name="mm" value= "<?php echo $mm;?>">
  <span class="error">* <?php echo $mmErr;?></span>
  </td>
  <td>
  /<input type ="text" size="6" name= "yyyy" value= "<?php echo $yyyy;?>">
  <span class "error">* <?php echo $yyyyErr;?></span>
  </td>
  </tr>
  </table>
  <br><br>
 
  <h4>GENDER</h4><br>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <h4>DEGREE</h4><br>
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="SSC") echo "checked";?> value="SSC">SSC
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="HSC") echo "checked";?> value="HSC">HSC
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="BSc") echo "checked";?> value="BSc">BSc 
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="MSc") echo "checked";?> value="MSc">MSc
  <span class="error">* <?php echo $degreeErr;?></span>
  <br><br>

  <h4>BLOOD GROUP</h4><br>
  <select>
  <option value=""> </option>
  <option value="A+">A+</option>
  <option value="O+">O+</option>
  <option value="B+">B+</option>
  <option value="AB+">AB+</option>
  <option value="O-">O-</option>
  <option value="A-">A-</option>
  <option value="B-">B-</option>
  <option value="AB-">AB-</option>
  </select>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dd;
echo "<br>";
echo $mm;
echo "<br>";
echo $yyyy;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo"<br>";
echo $bloodgroup;
?>

</body>
</html>