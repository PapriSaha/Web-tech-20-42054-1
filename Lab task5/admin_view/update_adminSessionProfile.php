<?php 
    include "../controller/session.php" ;
    include "../admin_controller/update_adminSessionProfileCntrl.php" ;
    require_once '../admin_controller/admininfoCntrl.php';
    $admin = fetchadmin($_GET['user_id']);
    
    if($_SESSION['usertype'] == "Admin"){}
    else{header("location: ../controller/hackerCntrl.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../resources/stylesheet/crowdfunding.css?v=<?php echo time(); ?>" rel="stylesheet">
    <title>Edit Profile</title>
</head>
<body>
    <?php include('../header_footer/header_after_login.php'); ?>
    <div class="main">
    <?php include('../controller/panelCntrl.php'); ?>
        <section>
            <form method="post" action="">
                <div>
                    <h1><legend>EDIT PROFILE</legend></h1>
                    <table>
                        <tr>
                            <td><label for="name">Name</label></td>
                            <td>: <input type="text" id="name" name="name" value="<?php echo $admin['name'] ?>">
                            <span class="error"> <?php echo $nameErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td>: <input type="email" id="email" name="email" value="<?php echo $admin['email'] ?>">
                            <span class="error"> <?php echo $emailErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Username</label></td>
                            <td>: <input type="text" id="username" name="username" value="<?php echo $admin['username'] ?>">
                            <span class="error"> <?php echo $userErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="address">Address</label></td>
                            <td>: <textarea id="address" name="address" rows="4" cols="23"><?php echo $admin['address'] ?></textarea>
                            <span class="error"> <?php echo $addressErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="phone">Phone</label></td>
                            <td>: <input type="text" id="phone" name="phone" value="<?php echo $admin['phone'] ?>">
                            <span class="error"> <?php echo $emailErr; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="usertype">User type</label></td>
                            <td>: <label> <?php echo $admin['usertype'] ?> </label>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="gender">Gender</label></td>
                            <td>: 
                            <input type="radio" name="gender" value="Male" <?php if (isset($admin['gender']) && $admin['gender']=="Male") echo "checked";?>>Male
                            <input type="radio" name="gender" value="Female" <?php if (isset($admin['gender']) && $admin['gender']=="Female") echo "checked";?>>Female
                            <input type="radio" name="gender" value="Other" <?php if (isset($admin['gender']) && $admin['gender']=="Other") echo "checked";?>>Other
                            <span class="error"> <?php echo $genderErr;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dob">Date of Birth</label></td>
                            <td>: <input type="text" id="dob" name="dob" value="<?php echo $admin['dob'] ?>">
                            <span class="error"> <?php echo $dobErr; ?></span>
                            <br><span>&nbsp;&nbsp;<i>(yyyy-mm-dd)</i></span></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
                                <input type="submit" name="update" value="Update" class="btn">
                            </td>
                        </tr>
                        <tr>
                            <td class="green" colspan="2">
                                <?php  
                                    if(isset($message))  
                                    {  
                                        echo $message;  
                                    }  
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </section>
    </div>
    <?php include('../header_footer/copyright.php'); ?>
</body>
</html>