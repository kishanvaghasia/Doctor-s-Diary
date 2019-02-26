<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
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
//else if(strlen($daddress)>60)
// {
//  echo "Address 10 characters only !";
// 
//}
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
           echo  'doctor specialization must only contain letters!';
}
else if(strlen($dspecialization)>20)
 {
  echo  " 20 characters only !";
  
}
else
{
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $sql = "update doctor_master set first_name= '" . $_POST['dfname']."', middle_name = '".$_POST['dmname']."', last_name = '".$_POST['dlname']."', date_of_birth = '".$_POST['ddob']."', gender = '".$_POST['dgender']."', reg_id_number = '".$_POST['dregidno']."', caste = '".$_POST['dcaste']."', religion = '".$_POST['dreligion']."', address = '".$_POST['daddress']."', phone_number = '".$_POST['dphonenumber']."', zipcode = '".$_POST['dzipcode']."',  email_address = '".$_POST['demailadd']."', state = '".$_POST['dstate']."', name_of_degree = '".$_POST['dnameofdegree']."', institution = '".$_POST['dinstitution']."', year_passed= '".$_POST['dyearpassed']."', specialization = '".$_POST['dspecialization']."'   where doctor_id=". $_GET['id'];
        } 
		//else {
        //    $sql = "insert into student (name, age) values ('" . $_POST['txtName'] . "','" . $_POST['txtAge'] . "')";
       // }
        $res = mysqli_query($con,$sql);

        if ($res) {
            header("Location: doctorupdate1.php");
            exit;
        }
}
    }
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
	
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $sql = "DELETE FROM doctor_master where doctor_id= " . $_GET['id'];
		//die($sql);
        $result = mysqli_query($con,$sql);
        
        header("Location: doctorupdate1.php");
        exit;
    }
    else
    {
        $sql = "SELECT * FROM doctor_master where doctor_id= " . $_GET['id'];    
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
					<div class="panel-heading">Details</div>
					<div class="panel-body">
                        
                        <div class="col-md-6">
							<form role="form" action=" " method="post">
                            
                                <div class="form-group">
									<label>First Name*:</label>
									<input class="form-control" placeholder="First Name" name="dfname" required autofocus="" value="<?php echo isset($stdData['first_name'])? $stdData['first_name'] : ''; ?>" />
								</div>
																
								<div class="form-group">
									<label>Middle Name:</label>
									<input class="form-control" placeholder="Middle Name" name="dmname" value="<?php echo isset($stdData['middle_name'])? $stdData['middle_name'] : ''; ?>" />
								</div>
                                
                                <div class="form-group">
									<label>Last Name:</label>
									<input class="form-control" placeholder="Last Name" name="dlname" value="<?php echo isset($stdData['last_name'])? $stdData['last_name'] : ''; ?>" />
								</div>
																
								<div class="form-group">
									<label>Date Of Birth</label>
									<input  type="date" class="form-control" placeholder="Date of Birth" name="ddob" required value="<?php echo isset($stdData['date_of_birth'])? $stdData['date_of_birth'] : ''; ?>" />
								</div>
                                
                                <div class="form-group">
									<label>Gender*:</label>
									<div class="radio">
										<label>
											<input type="radio" name="dgender" id="optionsRadios1" value="Male"  value="Male" <?php if($stdData['gender']=="Male"){ echo "checked";}?>/> Male
										</label>
									</div>
                                    <div class="radio">
										<label>
											<input type="radio" name="dgender" id="optionsRadios1" value="Female"  required <?php if($stdData['gender']=="Female"){ echo "checked";}?>/>Female
										</label>
									</div>
                                    
                                    <div class="form-group">
									<label>Doctor Registration No:</label>
									<input class="form-control" placeholder="Number" name="dregidno" value="<?php echo isset($stdData['reg_id_no'])? $stdData['reg_id_no'] : ''; ?>" />
								    </div>
                                    
                                     <div class="form-group">
									<label>Caste:</label>
									<input class="form-control" placeholder="Caste" name="dcaste"  value="<?php echo isset($stdData['caste'])? $stdData['caste'] : ''; ?>" />
								     </div>
                                    
                                     <div class="form-group">
									<label>Religion:</label>
									<input class="form-control" placeholder="Religion" name="dreligion" value="<?php echo isset($stdData['religion'])? $stdData['religion'] : ''; ?>" />
								     </div>
                                    
                                    <div class="form-group">
									<label>Address</label>
								  	<textarea class="form-control" rows="3" placeholder="Address" name="daddress">
                                        <?php echo isset($stdData['address'])? $stdData['address'] : ''; ?> </textarea>
								   </div>
                                    
                                    <div class="form-group">
									<label>Phone Number*:</label>
									<input class="form-control" placeholder="Phone Number" name="dphonenumber" required value="<?php echo isset($stdData['phone_number'])? $stdData['phone_number'] : ''; ?>" />
								    </div>
                                    
                                    <div class="form-group">
									<label>Zipcode:</label>
									<input class="form-control" placeholder="Zipcode" name="dzipcode" value="<?php echo isset($stdData['zipcode'])? $stdData['zipcode'] : ''; ?>" />
                                    
                                    
                                    
                                   
                                    
                                    <div class="form-group">
									<label>Email Address:</label>
									<input class="form-control" placeholder="abc@abc.com" name="demailadd" value="<?php echo isset($stdData['email_address'])? $stdData['email_address'] : ''; ?>" />
								    </div>
                                    
                                    <div class="form-group">
									<label>State:</label>
									<input class="form-control" placeholder="State" name="dstate" value="<?php echo isset($stdData['state'])? $stdData['state'] : ''; ?>" />
								    </div>
                                    
                                                                        
                                    
                                    
                                    <div class="form-group">
									<label>Name Of Degree*:</label>
								<input class="form-control" placeholder="abc" name="dnameofdegree" value="<?php echo isset($stdData['name_of_degree'])? $stdData['name_of_degree'] : ''; ?>" />
								    </div>
                                        
                                        
                                    <div class="form-group">
									<label>Institution:</label>
								<input class="form-control" placeholder="abc" name="dinstitution"  value="<?php echo isset($stdData['institution'])? $stdData['institution'] : ''; ?>" />
								    </div>
                                        
                                        
                                    <div class="form-group">
									<label>Year Graduated:</label>
								<input class="form-control" placeholder="abc" name="dyearpassed"  value="<?php echo isset($stdData['year_passed'])? $stdData['year_passed'] : ''; ?>" />
								    </div>
                                        
                                        
                                    
                                    <div class="form-group">
									<label>Specialization*:</label>
								<input class="form-control" placeholder=" " name="dspecialization"  required value="<?php echo isset($stdData['specialization'])? $stdData['specialization'] : ''; ?>" />
								    </div>
                                    
                                    
                                 </div> 
                                
                                </div>
                                    
                                    
                                    
                                    
                                    
                                 
                                
								
								
								
							
							
								<button type="submit" class="btn btn-primary" name="submit" value="Save" >Submit</button>
                        
                        
                        
                        
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