
<?php 

require_once "../model/userModel.php";
require_once "../model/transectionModel.php";
require_once "../model/db.php";
session_start();

$nameError = $userNameError = $emailError = $phoneError = $dobError = $passwordError = "";

if (isset($_POST["submit"])) {
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $userName = $_REQUEST["userName"];
    $password = $_REQUEST["password"];
    $rePassword = $_REQUEST["rePassword"];
    $phone = $_REQUEST["phone"];
    $dob = $_REQUEST["dob"];
    $src = $_FILES['profilePic']['tmp_name'];
    $des = "../upload/".$_FILES['profilePic']['name'];
    $user= login($userName, $password);
    $result=searchUsers($userName);
    $check = mysqli_fetch_assoc($result);
    $numberCheck =checkBalance($phone);
    $checkMail=check($email);

    $checkUserName= false;
$checkPass=false;

$validUser="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

$validPass="@#*.";

for($i=0;$i<strlen($userName);$i++)
{
    for($j=0;$j<strlen($validUser);$j++)
    {
        if($userName[$i]==$validUser[$j])
        {
            $checkUserName=true;
        }
   
    }
}

for($i=0;$i<strlen($password);$i++)
{
    for($j=0;$j<strlen($validPass);$j++)
    {
        if($password[$i]==$validPass[$j])
        {
            $checkPass=true;
        }
   
    }

}


    if (empty($name)) {
        $nameError = "*Name is required";
    } if (empty($email)) {
        $emailError = "*Email is required";
    } if (empty($userName)) {
        $userNameError = "*Username is required";
    } if (empty($phone)) {
        $phoneError = "*Phone No is required";
    } if (empty($dob)) {
        $dobError = "*DOB is required";
    } if ($password !== $rePassword) {
        $passwordError = "*Passwords do not match";
    }
    if (!$checkUserName) {
        $userNameError = "Write a valid user Name";
    }
    if(!$checkPass){
        $passwordError = "* Password SHould contain @#*.";
    }
    else{
        if ($userName == "" || $password == "" || $email == "" || $phone == "" || $dob == "") {
            echo "null username or password or email!";
        } 
        else if($user){ ?>
         <center>
        <?php  echo"ACCOUNT EXIST " ; ?>
            
           
        <a href="../view/login.php"><h3>Sign IN Now</h3></a>
        </center>
        <?php
        
        }
        else if($check){ ?>
            <h1>
        <?php  echo"User Name Has been already Taken. Try Another One " ; ?>
            </h1>
        <?php
        }
        else if($checkMail){ ?>
            <h1>
        <?php  echo"This mail is  already registered " ; ?>
            </h1>
        <?php
        }
        else if($numberCheck){?>
            <h1>
          <?php  echo"This Number is registered. Try Another One " ; ?>
        </h1>
        <?php
        }
        else if($user){
            echo"ACCOUNT EXIST " ;
        ?>
            <a href="../view/login.php"><h3>Sign IN Now</h3></a>
            <?php

        }
        
        else if (!$user) {
            if(move_uploaded_file($src, $des)){
                echo "Success";
            }
            $status = signup($name, $email, $userName, $password, $phone, $dob,$des);
            if ($status) {
                $account=accountAdd($name,$userName,$phone);
                
                    $_SESSION['flag'] = 'true';?>
                  
                 <center>
                 <?php  echo"Registration Completed " ; ?>
            
           
                 <a href="../view/login.php"><h3>Sign IN Now</h3></a>
                 </center>
                 <?php

            }
                else{
                    echo "Registratin Faild";
                }
            } 
            else {
                echo "invalid user!";
            }

    }

}
?>

<html lang="en">
<head>
    <title>Registration</title>
</head>
<body>
<form method="post"  enctype="multipart/form-data" >

    <table width="100%" height="100%">
        <tr>
            <td align="center" valign="middle">
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <td colspan="2" align="center">
                            <h2>Registration</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" value=""><b><?php echo $nameError ?></b></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" value=""><b><?php echo $emailError ?></b></td>
                    </tr>
                    <tr>
                        <td>User Name:</td>
                        <td><input type="text" name="userName" value=""><b><?php echo $userNameError ?></b></td>
                    </tr>
                    <tr>
                        <td>PASSword:</td>
                        <td><input type="password" name="password" value=""><b><?php echo $passwordError ?></b></td>
                    </tr>
                    <tr>
                        <td>REType-PASSword:</td>
                        <td><input type="password" name="rePassword" value=""></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td><input type="number" name="phone" value=""><b><?php echo $phoneError ?></b></td>
                    </tr>
                    <tr>
                        <td>Upload Profile Pic:<input type="file" name="profilePic" value=""></td>
                    </tr>
                    <tr>
                        <td>DOB:</td>
                        <td><input type="date" name="dob" value=""><b><?php echo $dobError ?></b></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="Submit">
                            <p >Already have a account? Log in <a href="../view/login.php">Here</a></p>
                        </td>
                    </tr>
                </table>
              

            </td>
        </tr>
    </table>
</form>
  
</body>
</html> 
