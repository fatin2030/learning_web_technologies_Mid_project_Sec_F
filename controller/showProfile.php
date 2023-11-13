<?php

require_once('../model/userModel.php');
require_once('../controller/sessionCheck.php');

   // session_start();

    require_once('../view/header.php');
?>

<table align="center">
<?php
  $result = searchUsers($_SESSION['userName']);  // Get the result set.

while ($user = mysqli_fetch_assoc($result)) {
    // Loop through each user and display their information.
    ?>
    <tr>

    <tr >
        <td align="left"> <image src="<?php echo "../upload/".$user['ProfilePic'] ?>" width ="150"alt="Image" ></td>
    </tr>

        <td></td>

        <td>
        <h2>User Information</h2>


    <tr>

    <td></td>

        <td><b>Name  :   <?=$user['Name']?></b></td><br>

    </tr>
    
    <tr>

    <td></td>
        <td><b>Email :  <?=$user['Email']?></b></td></tr><br>
  
    <tr> 

        <td></td>

    <td><b>Username :    <?=$user['UserName']?></b></td>
    </tr>

    <tr>
        <td></td>
        <td><b>Phone Number : <?=$user['Phone']?></b></td></tr>
    <tr>
        <td></td>
         <td><b>Date of Birth  : <?=$user['DOB']?></b> </td>
    </tr>
        </td>
    </tr>
<?php
}
 
?>

</table>


<?php
if ($_SESSION['userName'] == 'admin') { ?>
    <a href="../view/adminHome.php"><h4>Go back</h4></a>
<?php }

else if ($_SESSION['userName'] == 'hotelManagement') { ?>
    <a href="../view/hotelManagement.php"><h4>Go back</h4></a>
<?php }
 else { ?>
    <a href="../view/home.php"><h4>Go back</h4></a>
<?php } ?>
