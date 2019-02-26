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


    //$pid=$_POST['pid'];
$pfname=$_POST['pfname'];
$pmname=$_POST['pmname'];
$plname=$_POST['plname'];
$pdob=$_POST['pdob'];
$pgender=$_POST['pgender'];
$plocalidno=$_POST['plocalidno'];
$pcaste=$_POST['pcaste'];
$preligion=$_POST['preligion'];
$paddress=$_POST['paddress'];
$pphonenumber=$_POST['pphonenumber'];
$pzipcode=$_POST['pzipcode'];
$pemailadd=$_POST['pemailadd'];
$pbloodgrp=$_POST['pbloodgrp'];
$pstate=$_POST['pstate'];
$pregdate=$_POST['pregdate'];
$pcategory=$_POST['pcategory'];
$pnameofkim=$_POST['pnameofkim'];
$ptreatment=$_POST['ptreatment'];
$ptreatmentfee=$_POST['ptreatmentfee'];
$pmedicine=$_POST['pmedicine'];
    
$adate=$_POST['adate'];
$atime=$_POST['atime'];
$adoctor=$_POST['adoctor'];
$appfees=$_POST['appfees'];

    


 if(empty($pfname))
 {
  echo  "enter first name !";
  
 }
else if (ctype_alpha($pfname) === false) {
           echo  ' Name must only contain letters!';
}
else if(strlen($pfname)>20)
 {
  echo  " First Name 20 characters only !";
  
}
//else if (ctype_alpha($pmname) === false) 
//{
//            echo 'Middle Name must only contain letters!';
//}
//else if(strlen($pmname)>20)
// {
//  echo "Middle Name 20 characters only !";
// 
//}
//else if (ctype_alpha($plname) === false) 
//{
//            echo  'Last Name must only contain letters!';
//}
//else if(strlen($plname)>20)
// {
//  echo "Last Name 20 characters only !";
//  
//}
else if(empty($pdob))
 {
  echo  "Select date of Birth!";

 }

else if(empty($pgender))
 {
  echo "Select gender !";
  
 }
//else if(!is_numeric($plocalidno))
// {
//  echo "Numbers only! in Aadhar number";
// 
// }
//else if(strlen($plocalidno)!=12)
// {
//  echo " Aadhar 12 Numbers only !";
//  
//}
//else if (ctype_alpha($pcaste) === false) {
//            echo ' Caste only contain letters!';
//}
//else if(strlen($pcaste)>10)
// {
//  echo " Caste 10 characters only !";
//  
//}
//else if (ctype_alpha($preligion) === false) {
//            echo ' Cast only contain letters!';
//}
//else if(strlen($preligion)>10)
// {
//  echo " Religion 10 characters only !";
//  
//}
//else if(strlen($paddress)>60)
// {
//  echo "Address 10 characters only !";
// 
//}
else if(empty($pphonenumber))
 {
  echo "enter  phone number !";
  
 }
else if(!is_numeric($pphonenumber))
 {
  echo "Phoneno Numbers only !";
 
 }
else if(strlen($pphonenumber)!=10)
 {
 echo " Phoneno 10 Numbers only !";
  
}
//else if(!is_numeric($pzipcode))
// {
//  echo "Zipcode Numbers only!";
// 
// }
//else if(strlen($pzipcode)!=6)
// {
//  echo "Zipcode 6 Numbers only !";
//  
//}
//else if (!filter_var($pemailadd, FILTER_VALIDATE_EMAIL))
//{
//  echo "Invalid email format"; 
//}
//else if(strlen($pstate)>16)
// {
//  echo "Email 16 Characters only !";
//  
//}
else if(empty($pregdate))
 {
  echo "Select Registration date !";
  
 }
//else if (ctype_alpha($pcategory) === false) {
//            echo " Category only contain letters!";
//}
//else if(strlen($pcategory)>15)
// {
//  echo " Category 15 Characters only !";
//  
//}
//else if (ctype_alpha($pnameofkim) === false) {
//            echo ' Name of kim only contain letters!';
//}
//else if(strlen($pnameofkim)>20)
// {
//  echo " Name of kim 20 Characters only !";
//  
//}
//else if(strlen($pbloodgrp)>3)
// {
//  echo " Blood Group 3 Characters only !";
//  
//}
    
else if(empty($adate))
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
           echo  'Doctor Name must only contain letters!';
}
   
    
    
    
    
    
else
{
    $sql = "INSERT INTO patient_master(patient_fname,patient_mname,patient_lname,patient_dob,patient_gender,patient_identity_number,patient_caste,patient_religion,patient_address,patient_phonenumber,patient_zipcode,patient_emailaddress,patient_bloodgroup,patient_state,patient_registrationdate,patient_category,name_of_kim,treatment_name,treatment_fee,medicine)VALUES ('$pfname','$pmname','$plname','$pdob','$pgender','$plocalidno','$pcaste','$preligion','$paddress','$pphonenumber','$pzipcode','$pemailadd','$pbloodgrp','$pstate','$pregdate','$pcategory','$pnameofkim','$ptreatment','$ptreatmentfee','$pmedicine')";
    
    
    
    $sql1 = "INSERT INTO appointment(app_date, app_time,app_doctor,app_patient,app_fees)VALUES ('$adate','$atime','$adoctor','$pfname','$appfees')";
    

    
    if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
        
    }
    
    if ($conn->query($sql1) === TRUE) {
   echo "New record created successfully";
        
    }
}
}
else
{
    
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}


/*if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

$conn->close();
?>