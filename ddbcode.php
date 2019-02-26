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
$dfname=$_POST['dfname'];
$dmname=$_POST['dmname'];
$dlname=$_POST['dlname'];
$ddob=$_POST['ddob'];
$dgender=$_POST['dgender'];
$dregidno=$_POST['dregidno'];
$dcaste=$_POST['dcaste'];
$dreligion=$_POST['dreligion'];
$daddress=$_POST['daddress'];
$dphonenumber=$_POST['dphonenumber'];
$dzipcode=$_POST['dzipcode'];
$demailadd=$_POST['demailadd'];
$dstate=$_POST['dstate'];   
$dnameofdegree=$_POST['dnameofdegree'];
$dinstitution=$_POST['dinstitution'];
$dyearpassed=$_POST['dyearpassed'];
$dspecialization=$_POST['dspecialization'];

 if(empty($dfname))
 {
  echo  "enter first name !";
  
 }
else if (ctype_alpha($dfname) === false) {
           echo  ' Name must only contain letters!';
}
else if(strlen($dfname)>20)
 {
  echo  " First Name 20 characters only !";
  
}
//else if (ctype_alpha($dmname) === false) 
//{
//            echo 'Middle Name must only contain letters!';
//}
//else if(strlen($dmname)>20)
// {
//  echo "Middle Name 20 characters only !";
// 
//}
//else if (ctype_alpha($dlname) === false) 
//{
//            echo  'Last Name must only contain letters!';
//}
//else if(strlen($dlname)>20)
// {
//  echo "Last Name 20 characters only !";
//  
//}
else if(empty($ddob))
 {
  echo  "Select date of Birth!";

 }

else if(empty($dgender))
 {
  echo "Select gender !";
  
 }
//else if(!is_numeric($regidno))
// {
//  echo "Numbers only! in License";
// 
// }
//else if(strlen($regidno)>10)
// {
//  echo " License no 10 characters only !";
//  
//}
//
//else if (ctype_alpha($dcaste) === false) {
//            echo ' Caste only contain letters!';
//}
//else if(strlen($dcaste)>10)
// {
//  echo " Caste 10 characters only !";
//  
//}
//else if (ctype_alpha($dreligion) === false) {
//            echo ' Cast only contain letters!';
//}
//else if(strlen($dreligion)>10)
// {
//  echo " Religion 10 characters only !";
//  
//}
else if(strlen($daddress)>100)
 {
  echo "Address 10 characters only !";
 
}
else if(empty($dphonenumber))
 {
  echo "enter  phone number !";
  
 }
else if(!is_numeric($dphonenumber))
 {
  echo "Phoneno Numbers only !";
 
 }
else if(strlen($dphonenumber)!=10)
 {
 echo " Phoneno 10 Numbers only !";
  
}
//else if(!is_numeric($dzipcode))
// {
//  echo "Zipcode Numbers only!";
// 
// }
//else if(strlen($dzipcode)!=6)
// {
//  echo "Zipcode 6 Numbers only !";
//  
//}
//else if (!filter_var($demailadd, FILTER_VALIDATE_EMAIL))
//{
//  echo "Invalid email format"; 
//}
//else if(strlen($dstate)>16)
// {
//  echo "Email 16 Characters only !";
//  
//}
//else if(empty($nameofdegree))
// {
//  echo "Enter name of degree !";
//  
// }
//else if (ctype_alpha($dnameofdegree) === false) {
//            echo " Name OF Degree only contain letters!";
//}
// else if(strlen($dnameofdegree)>20)
// {
//  echo "Name of Degree 20 Characters only !";
//  
//}
//else if (ctype_alpha($dinstitution) === false) {
//            echo " Institution only contain letters!";
//}
//else if(strlen($dyearpassed)!=4)
// {
//  echo "Year Graduated 6 Numbers only !";
//  
//}
//else if(!is_numeric($dyearpassed))
// {
//  echo "Zipcode Numbers only!";
// 
// }
    
else if(empty($dspecialization))
 {
  echo  "enter speicalization name !";
  
 }
else if (ctype_alpha($dspecialization) === false) {
           echo  ' Name must only contain letters!';
}
else if(strlen($dspecialization)>20)
 {
  echo  " 20 characters only !";
  
}
    
else {
    
    $sql = "INSERT INTO doctor_master(first_name, middle_name, last_name, date_of_birth, gender, reg_id_number, caste, religion, address, phone_number, zipcode, email_address, state, name_of_degree, institution, year_passed, specialization)VALUES ('$dfname','$dmname','$dlname','$ddob','$dgender','$dregidno','$dcaste','$dreligion','$daddress','$dphonenumber','$dzipcode','$demailadd','$dnameofdegree','$dstate','$dinstitution','$dyearpassed','$dspecialization')";
    
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