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
$rstart=$_POST['rstartdate'];
$rend=$_POST['renddate'];

if(empty($rstart))
{
	echo "Please select Start date";
	
}
elseif(empty($rend))
{
	echo "Please select End Date";
	
}
else
{
	if($conn)
	{
    $db = mysqli_select_db($conn,"doctor_diary");
    
    $sql = "Select * from patient_master where patient_registrationdate='".$_GET['id']."'";
	#die($sql);
    //$res = mysqli_query($sql, $conn);
	$res = mysqli_query($conn,$sql);
    
    
    while($row = mysqli_fetch_object($res))
    {
        $data[] = $row;
    }
    
    
}
}