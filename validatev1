<?php 
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "doctor_diary";
	$con = new mysqli($servername, $username, $password, $dbname) or die(mysql_error());
	//$con = mysql_connect("localhost", "root") or die(mysql_error());
	if ($con) {
		$db = mysqli_select_db($con,"doctor_diary") or die(mysql_error());
	}

   $username= trim($_POST['username']);
     $password= trim($_POST['password']);

 if($username!=''&&$password!='')
 {
   $query=mysqli_query("select * from user where user_name='".$username."' and user_password='".$password."'") or die(mysqli_error());
   $res=mysqli_fetch_row($query,$con);
   if($res)
   {
    session_start();
    $_SESSION['username']=$username;
    header('location:welcome.php');
   }
   else
   {
    echo'You entered username or password is incorrect';
   }
 }
 else
 {
  echo'Enter both username and password';
 }
}
?>
    



?>