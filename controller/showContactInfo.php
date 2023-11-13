<?php

require_once('../model/contactModel.php');
require_once('../controller/sessionCheck.php');

   // session_start();

    require_once('../view/header.php');
?>
 



<table border=1 align="center">
    <tr>
        <td>Company Name</td>
        <td align="center"  width=30%>Email</td>
        <td>Phone Number</td>

    </tr>
    <h3 align="center">All Contact Information</h3>

   
    <form action="" method="post">
    
    Search User: <input type="text" name="name" value="" /> <br>
    <input type="submit" value="submit">
    </form>
    <?php
  
    if (isset($_REQUEST['name'])) {
        $contactName = $_REQUEST['name'];
        $result = searchContact($contactName);


        while ($user = mysqli_fetch_assoc($result)) {
            // Display the user information matching the search query.
            ?>
            <tr>
                <td><?= $user['CompanyName'] ?></td>
                <td><?= $user['Email'] ?></td>
                <td><?= $user['Phone'] ?></td>
        
            </tr>
        <?php
        }
    }
    else{

    $result =showAllContact();
    while ($user = mysqli_fetch_assoc($result)) {
        // Loop through each user and display their information.
        ?>
        
        <tr>
            <td><?=$user['CompanyName']?></td>
            <td><?=$user['Email']?></td>
            <td><?=$user['Phone']?></td>
        </tr>
        
    <?php
    }
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

