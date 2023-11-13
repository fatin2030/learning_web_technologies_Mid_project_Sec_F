<?php 
session_start();
require_once('../model/userModel.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_REQUEST['email'];
    $_SESSION['email'] = $email;
    
  //  $flag = true;

//     if (empty($email)) {
//         $_SESSION['email_err_msg'] = "Enter your email";
//         $flag = false;
//         header("Location: ../view/forgetPass.php");
//     } else {
//         $_SESSION["email_err_msg"] = "";
//         $_SESSION["email"] = $email;
//     }
// }


    forgetPass($email);
}

?>