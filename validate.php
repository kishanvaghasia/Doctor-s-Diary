<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<?php
    
    $myusername="admin";
    $mypassword="admin";

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if($username == $myusername and $password == $mypassword)
    {
       // if(isset($_POST['remember']))
      //  {
            //setcookie('username', $username, time()+60*60*7);
            session_start();
            $_SESSION['username'] = $username;
            header("location: welcome.php");
            
            
      //  }
        
        
    }
    else
        {
        
       /* if (!empty($_SESSION['error'])){
    
    ?><h3>Invalid username and password</h3>
    <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        }*/

   
            $_SESSION['errMsg'] = "Invalid username or password";
            echo "Username or Password is Invalid.<br> Click here to <a href='login.php'> Try again </a>";
            
         }
}
 else
        {
                header("location: login.php");
        }
   
?>
      