<?php 
    require_once('../controller/sessionCheck.php');
    require_once('../view/header.php')
?>


   <html lang="en">
   <head>
	
	<title>Admin home PAge</title>
   </head>
   <body>
	
   
    <center>
	<a href="../controller/showProfile.php">Profile</a> <br>
	<br/>
	<a href="changePass.php">Change Password</a> <br>
	<br/>
	<a href="../controller/showAllUser.php">View Users</a> <br>
	<br/>
	<a href="..//controller/showBalanceAll.php">Show All USers Balance</a> <br>
	<br/>
	<a href="..//controller/addContactInfo.php">ADD Contact Information</a> <br>
	<br/>
	<a href="..//controller/showContactInfo.php"> Contact Information</a> <br>
	<br/>
	<a href="..//controller/editContactInfo.php"> EDIT Contact Information</a> <br>
	<br>
	<a href="..//controller/createHotelManagement.php">Create Account For Hotel Management</a><br>
	<br/>
	<a href="..//controller/logout.php">Logout</a>
</center>


</body>
   </html>