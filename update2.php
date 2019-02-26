<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctor_diary";
 $con = new mysqli($servername, $username, $password, $dbname) or die(mysql_error());
 //$con = mysql_connect("localhost", "root") or die(mysql_error());
if ($con) {
    $db = mysqli_select_db($con,"doctor_diary") or die(mysql_error());
}
if (count($_POST)) {
    if ($_POST['submit'] == "Save") {

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
  $error="";  
    
 //var_dump(ctype_alpha($pfname)); exit();

 if(empty($pfname))
 {
  echo  "enter first name !";
  
 }
else if (ctype_alpha($pfname) == false) {
           
		   $error =  ' Name must only contain letters!';
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
    
    
    
    
else
{

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $sql = "update patient_master set patient_fname= '" . $_POST['pfname']."', patient_mname = '".$_POST['pmname']."', patient_lname = '".$_POST['plname']."', patient_dob = '".$_POST['pdob']."', patient_gender = '".$_POST['pgender']."', patient_identity_number = '".$_POST['plocalidno']."', patient_caste = '".$_POST['pcaste']."', patient_religion = '".$_POST['preligion']."', patient_phonenumber = '".$_POST['pphonenumber']."', patient_zipcode = '".$_POST['pzipcode']."', patient_address = '".$_POST['paddress']."', patient_emailaddress = '".$_POST['pemailadd']."', patient_state = '".$_POST['pstate']."', patient_registrationdate = '".$_POST['pregdate']."', patient_category = '".$_POST['pcategory']."', name_of_kim= '".$_POST['pnameofkim']."', patient_bloodgroup = '".$_POST['pbloodgrp']."', treatment_name = '".$_POST['ptreatment']."', treatment_fee = '".$_POST['ptreatmentfee']."'   where patient_id=". $_GET['id'];
        } 
		//else {
        //    $sql = "insert into student (name, age) values ('" . $_POST['txtName'] . "','" . $_POST['txtAge'] . "')";
       // }
        $res = mysqli_query($con,$sql);

        if ($res) {
            header("Location: update1.php");
            exit;
        }
	}
    }
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
	
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $sql = "DELETE FROM patient_master where patient_id= " . $_GET['id'];
		//die($sql);
        $result = mysqli_query($con,$sql);
        
        header("Location: update1.php");
        exit;
    }
    else
    {
        $sql = "SELECT * FROM patient_master where patient_id= " . $_GET['id'];    
        $result = mysqli_query($con,$sql);
        $stdData = mysqli_fetch_assoc($result);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
   
    
    
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Search Result</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
    
    
    


</head>

<body>
    

    
    
    
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="welcome.php"><span>Doctor's</span>Diary</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $_SESSION['username123'];?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                                    Report <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							
							<li><a href="report.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
 Patient</a></li>
                            <li><a href="appreport.php"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>

Appointment</a></li>
						</ul>
					</li>
                    
                    
				</ul>
				
				
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			
		</form>
		<ul class="nav menu">
			<li class="active"><a href="welcome.php">&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<svg class="glyph stroked home"><use xlink:href="#stroked-home"/><use xlink:href="#stroked-dashboard-dial"></use></svg> &nbsp;Home</a></li>
			
<!--
			<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1" ><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Patient </span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="addpatient.php">
							<svg class="glyph stroked chevrseron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Details
						</a>
					</li>
					<li>
						<a class="" href="searchpatient.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Search
						</a>
					</li>
					<li>
						<a class="" href="update1.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Edit
						</a>
					</li>
				</ul>
                
                 </li>
-->
            
            <hr>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
 Patient </b> </hr>
        <hr></hr>
    
           
            <li class="parent">
        
				<a href="addpatient.php">
                    <input type="button" class="btn btn-primary" name="addd" value="&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;     Add Details  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   ">
					
				</a>
				
                
            </li>
            
            <li class="parent">
        
				<a href="searchpatient.php">
                    <input type="button" class="btn btn-primary" name="dupdate" value="&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     Search &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;   ">
					
				</a>
				
                
            </li>
            
            <li class="parent">
        
				<a href="update1.php">
                    <input type="button" class="btn btn-primary" name="dsearch" value="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;   Edit &nbsp;&nbsp;&nbsp; &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;    ">
					
				</a>
				
                
            </li>
    
            <hr>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
 Appointment </b> </hr>
        <hr></hr>
            
            <li class="parent">
        
<!--
				<a href="addappointment.php">
                    <input type="button" class="btn btn-primary" name="addapp" value="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    Add Appointment &nbsp; &nbsp; &nbsp;    ">
					
				</a>
-->
				
                
            </li>
            
             <li class="parent">
        
				<a href="appupdate1.php">
                    <input type="button" class="btn btn-primary" name="appedit" value="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    Edit Appointment  &nbsp; &nbsp;&nbsp;      ">
					 
				</a>
				
                
            </li>
            
            <li class="parent">
        
				<a href="searchapp.php">
                    <input type="button" class="btn btn-primary" name="appedit" value="&nbsp;  &nbsp; &nbsp;   Search Appointment    &nbsp;&nbsp;     ">
					
				</a>
				
                
            </li>
    
            <hr>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b><svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>
 Doctor </b> </hr>
        <hr></hr>
    
           
            <li class="parent">
        
				<a href="adddoctor.php">
                    <input type="button" class="btn btn-primary" name="addd" value="&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;     Add Doctor &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   ">
					
				</a>
				
                
            </li>
            
            <li class="parent">
        
				<a href="doctorupdate1.php">
                    <input type="button" class="btn btn-primary" name="dupdate" value="&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;     Edit Doctor &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   ">
					
				</a>
				
                
            </li>
            
            <li class="parent">
        
				<a href="searchdoctor.php">
                    <input type="button" class="btn btn-primary" name="dsearch" value="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    Search Doctor &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    ">
					
				</a>
				
                
            </li>
             
            
            
            
            
            
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit</h1>
			</div>
		</div><!--/.row-->
		
       
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php  ?>Details</div>
					<div class="panel-body">
                        
                        <div class="col-md-6">
							<form role="form" action=" " method="post">
                            
                                <div class="form-group">
									<label>First Name*:</label>
									<input required class="form-control" type="text" name="pfname" id="txtName" value="<?php echo isset($stdData['patient_fname'])? $stdData['patient_fname'] : ''; ?>" />
								</div>
																
								<div class="form-group">
									<label>Middle Name:</label>
									<input class="form-control" name="pmname" id="txtAge" value="<?php echo isset($stdData['patient_mname'])? $stdData['patient_mname'] : ''; ?>" />
								</div>
                                
                                 <div class="form-group">
									<label>Last Name:</label>
									<input class="form-control" placeholder="Last Name" name="plname" value="<?php echo isset($stdData['patient_lname'])? $stdData['patient_lname'] : ''; ?>" />
								</div>
                                
                                <div class="form-group">
									<label>Date Of Birth:*</label>
									<input required type="date" class="form-control" placeholder="Date of Birth" name="pdob" required value="<?php echo isset($stdData['patient_dob'])? $stdData['patient_dob'] : ''; ?>" />
								</div>
                                
                                    <label>Gender*:</label>
									<div class="radio">
                                        
										<label>
											<input type="radio" name="pgender" id="optionsRadios1" value="Male" <?php if($stdData['patient_gender']=="Male"){ echo "checked";}?>/> Male
										</label>
                                        
                                        <br/>
										<label>
											<input type="radio" name="pgender" id="optionsRadios1" value="Female" <?php if($stdData['patient_gender']=="Female"){ echo "checked";}?>/>Female
										</label>
									</div>
                                
                                    <div class="form-group">
									<label>Aadhar Number:</label>
									<input class="form-control" placeholder="Aadhar Number" name="plocalidno" value="<?php echo isset($stdData['patient_identity_number'])? $stdData['patient_identity_number'] : ''; ?>" /> 
								    </div>
                                
                                    <div class="form-group">
									<label>Caste:</label>
									<input class="form-control" placeholder="Caste" name="pcaste" value="<?php echo isset($stdData['patient_caste'])? $stdData['patient_caste'] : ''; ?>" /> 
								     </div>
                                    
                                     <div class="form-group">
									<label>Religion:</label>
									<input class="form-control" placeholder="Religion" name="preligion" value="<?php echo isset($stdData['patient_religion'])? $stdData['patient_religion'] : ''; ?>" />
								     </div>
                                    
                                    <div class="form-group">
									<label>Phone Number*:</label>
									<input required class="form-control" placeholder="Phone Number" name="pphonenumber" required value="<?php echo isset($stdData['patient_phonenumber'])? $stdData['patient_phonenumber'] : ''; ?>" />
								    </div>
                                
                                    <div class="form-group">
									<label>Zipcode:</label>
									<input class="form-control" placeholder="Zipcode" name="pzipcode" value="<?php echo isset($stdData['patient_zipcode'])? $stdData['patient_zipcode'] : ''; ?>" /> 
                                    
                                    </div>
                                    
                                    
                                   <div class="form-group">
									<label>Address</label>
								  	<textarea class="form-control" rows="3" placeholder="Address" name="paddress" ><?php echo isset($stdData['patient_address'])? $stdData['patient_address'] : ''; ?></textarea>
								   </div>
                                    
                                    <div class="form-group">
									<label>Email Address:</label>
									<input class="form-control" placeholder="abc@abc.com" name="pemailadd" value="<?php echo isset($stdData['patient_emailaddress'])? $stdData['patient_emailaddress'] : ''; ?>" />
								    </div>
                                    
                                    <div class="form-group">
									<label>State:</label>
									<input class="form-control" placeholder="State" name="pstate" value="<?php echo isset($stdData['patient_state'])? $stdData['patient_state'] : ''; ?>" />
								    </div>
                                    
                                    <div class="form-group">
									<label>Registration Date*:</label>
									<input required  type="date" class="form-control" placeholder="Date" name="pregdate" required value="<?php echo isset($stdData['patient_registrationdate'])? $stdData['patient_registrationdate'] : ''; ?>" />
								    </div>
                                        
                                    <div class="form-group">
									<label>Disease:</label>
								 <input class="form-control" placeholder="Disease" name="pcategory" value="<?php echo isset($stdData['patient_category'])? $stdData['patient_category'] : ''; ?>" /> 
								    </div>
                                    
                                    <div class="form-group">
									<label>Name Of Kim:</label>
								<input class="form-control" placeholder="abc" name="pnameofkim" value="<?php echo isset($stdData['name_of_kim'])? $stdData['name_of_kim'] : ''; ?>" /> 
								    </div>
                                    
                                    <div class="form-group">
									<label>Patient Blood Group:</label>
								<input class="form-control" placeholder="o+" name="pbloodgrp" value="<?php echo isset($stdData['patient_bloodgroup'])? $stdData['patient_bloodgroup'] : ''; ?>" />
								    </div>
                                
                               
                            
                                <div class="form-group">
									<label>Treatment Name:</label>
									<select name="ptreatment">
                                                <option value="Select">---- </option>
                                              <option value="General surgery"<?php if($stdData['treatment_name']=="General surgery"){ echo "selected";}?>>General surgery </option>
                                              <option value="Orthopaedics"<?php if($stdData['treatment_name']=="Orthopaedics"){ echo "selected";}?>>Orthopaedics</option>
                                              <option value="Virology"<?php if($stdData['treatment_name']=="Virology"){ echo "selected";}?>>Virology </option>
                                              <option value="Arthroscopy"<?php if($stdData['treatment_name']=="Arthroscopy"){ echo "selected";}?>>Arthroscopy</option>
                                              
                                            </select>
								    </div>
                                    
                                     <div class="form-group">
									<label>Treatment_fee:</label>
								    <input class="form-control" placeholder="fee" name="ptreatmentfee" value="<?php echo isset($stdData['treatment_fee'])? $stdData['treatment_fee'] : ''; ?>">
								    </div>
                                
                                    <div class="form-group">
									<label>Medicine:</label>
								    <input class="form-control" placeholder="Medicine" name="pmedicine" value="<?php echo isset($stdData['medicine'])? $stdData['medicine'] : ''; ?>">
								    </div>
                        
                                <button type="submit" class="btn btn-primary" name="submit" value="Save" >&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;</button>
                        
                        
                            </form>
                            
                        </div>
                        </div>
				</div>
			</div>
		</div><!--/.row-->	
        
        
        
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>