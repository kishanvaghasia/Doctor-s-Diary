<?php

 session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctor_diary";

 $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"]))
{


    
$adate=$_POST['adate'];
$atime=$_POST['atime'];
$adoctor=$_POST['adoctor'];
$apatient=$_POST['apatient'];


 if(empty($adate))
 {
  echo  "Select Date !";
  
 }

else if(empty($atime))
 {
  echo  "Select Time !";

 }

else if(empty($adoctor))
 {
  echo "Enter Doctor Name !";
  
 }
else if (ctype_alpha($adoctor) === false) {
           echo  ' Doctor Name must only contain letters!';
}
else if(empty($apatient))
 {
  echo "Enter Patient Name !";
  
 }
else if (ctype_alpha($apatient) === false) {
           echo  ' Patient Name must only contain letters!';
}

    
else {
    
   

    
    
    $sql = "INSERT INTO appointment(app_date, app_time,app_doctor, app_patient)VALUES ('$adate','$atime','$adoctor','$apatient')";
    
    
    if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
        
    }
    
}
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