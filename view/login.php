
<html lang="en">

<head>
    <title>LOG IN</title>
</head>

<body>
    <center>
    <form method="post" action="../controller/loginCheck.php" enctype=""> 
    <table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td>
        <fieldset >
            <legend>Signin</legend>
        Username: <input type="text" name="userName" value="" /> <br>
        <br>
        Password: <input type="password" name="password" value="" /> <br>
        <br>
                <center>
                 <input type="submit" name="submit" value="submit" />
                 <a href="../controller/signup.php"> Signup</a><br>
                 </center>
                 <a href="forgetPass.php">Forget Password?</a>
        </fieldset>
    </form>
                </td>
		    </tr>                                
		</table>
    </center>
</body>

</html>