<?php
session_start(); 
    $servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "doctor_diary";
	
	//$con = mysql_connect("localhost", "root") or die(mysql_error());
	

   $username= trim($_POST['username']);
     $password= trim($_POST['password']);


        if(isset($_POST['submit']))
        {
            $con = new mysqli($servername, $dbusername, $dbpassword, $dbname) or die(mysql_error());

            if ($con) {
            $db = mysqli_select_db($con,"doctor_diary") or die(mysql_error());
        }
    //        $q = "select * from user where user_name = '".$username."' AND user_password = '".$password."'";
    //		echo $q;
            $result=mysqli_query($con,"select * from user where user_name='".$username."' AND user_password='".$password."'");
            while($row=mysqli_fetch_array($result))
            {
                $r=$row['user_name'];
                 $b=$row['user_password'];

            }
    //        if (!row) {
    //            printf("Error: %s\n", mysqli_error($con));
    //            exit();
    //        }
            if($username==$r && $password==$b)
            {

                $_SESSION['username123']=$username;
                header('location:welcome.php');
            }
            else
            {
    //			print_r($_SESSION);
                echo "Username or Password is Invalid.<br> Click here to <a href='login.php'> Try again </a>";
            }
        }
?>