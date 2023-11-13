
<?php
require_once('../model/transectionModel.php');
require_once('../controller/sessionCheck.php');

?>
<html lang="en">
<head>
    <title>Deposite Money</title>
</head>
<body>
    <center>
    <form action="" method="post">
    <p>Enter Amount</p> 
    <input type="number" name="amount" value="">
 
    <p>Enter Password</p> 
    <input type="password" name="password" value =""><br>
    <br>
    <input type="submit" name="submit" value ="submit">
    <br>
    </form>
    </center>
</body>

<?php
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_REQUEST['amount']) && isset($_REQUEST['password'])) {
        // Payment method selected
        $amount = $_REQUEST['amount'];
        $password=$_REQUEST['password'];
        if ($amount<0) {
            echo "Write a valid amount";
        }
        else{
          if($password==$_SESSION['password'] )
          {
           
            $status= checkBalance( $_SESSION['Phone']);
            $previousBalance = $status['Balance'];
            $newBalance = $previousBalance +$amount;
    
            deposite($newBalance,$_SESSION['paymentMethod'], $_SESSION['Phone']);
            $flag=true;
            echo"SUCCESS";
              header('location: ../view/home.php');
           
          }
          else{
            echo " Wrong pass";
          }

        }
    } 
    else {
        echo "Something went wrong";
        }
}
?>
</html>