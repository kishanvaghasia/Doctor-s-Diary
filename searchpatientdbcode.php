<?php

 session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctor_diary";
$output='';

 $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"]))
{ 
    
$psearch=$_POST['psearch'];
    
    $query=mysql_query("SELECT * FROM patient_master WHERE patient_fname LIKE '%$psearch%'") or die("Could not search");
    $count= mysql_num_rows($query);
    
    if($count == 0)
    {
            $output="no search record found";
    }
    else
    {
        while ($row = mysql_fetch_array($query)){  
        $patientid=$row['patient_id'];
        $fname=$row['patient_fname'];
            
        echo "<td>$row[patientid]</td>";
        
    }
    //$sql = "SELECT * FROM patient_master WHERE patient_fname LIKE '%".$psearch."%'";
    
    //$r_query = mysql_query($sql);
    
    //while ($row = mysql_fetch_array($r_query)){  
      //  echo 'Primary key: ' .$row['patient_id'];  
      //  echo '<br /> Patient fname: ' .$row['patient_fname'];  
       
        
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}


/*if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

$conn->close();
?>