<?php

 session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctor_diary";
$output='';

 $conn = new mysqli($servername, $username, $password, $dbname);

$s=$_POST['psearch'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"]))
{
    
    $sql="SELECT * FROM patient_master WHERE patient_fname LIKE '%$s%'";
    
    $r=mysqli_query($sql) or die ("Failed to execute".mysql.error());
    $n=mysqli_num_rows($r);
    
    if($n!=0)
    {
        echo "<table border=1 align='center'>";
        echo "<tr><th>Id</th><th>Firstname</th></tr>";
        
        while($row=mysqli_fetch_array($r))
        {
        echo "<tr>";
            
            echo "<td>$row[0]</td>";
            //echo "<td>$row[1]</td>";
            
            echo"</tr>";
        }
    }
    else
    {
            echo"<font color='red'>No records found</font>";
    }
    }

$conn->close();
?>