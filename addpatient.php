<?php session_start();



 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctor_diary";

 $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql=mysqli_query($conn,"SELECT doctor_id,first_name FROM doctor_master");






?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Patient</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
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
				<h1 class="page-header">Patient</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add Patient Details</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" action="pdbcode1.php" method="post">
							
								<div class="form-group">
									<label>First Name*:</label>
									<input class="form-control" placeholder="First Name" name="pfname" required autofocus="">
								</div>
																
								<div class="form-group">
									<label>Middle Name:</label>
									<input class="form-control" placeholder="Middle Name" name="pmname" >
								</div>
                                
                                <div class="form-group">
									<label>Last Name:</label>
									<input class="form-control" placeholder="Last Name" name="plname" >
								</div>
																
								<div class="form-group">
									<label>Date Of Birth:*</label>
									<input  type="date" class="form-control" placeholder="Date of Birth" name="pdob" required>
								</div>
                                
                                <div class="form-group">
									<label>Gender*:</label>
									<div class="radio">
										<label>
											<input type="radio" name="pgender" id="optionsRadios1" value="Male"  checked required>Male
										</label>
									</div>
                                    <div class="radio">
										<label>
											<input type="radio" name="pgender" id="optionsRadios1" value="Female"  required>Female
										</label>
									</div>
                                    
                                    <div class="form-group">
									<label>Aadhar Number:</label>
									<input class="form-control" placeholder="Aadhar Number" name="plocalidno" >
								    </div>
                                    
                                     <div class="form-group">
									<label>Caste:</label>
									<input class="form-control" placeholder="Caste" name="pcaste" >
								     </div>
                                    
                                     <div class="form-group">
									<label>Religion:</label>
									<input class="form-control" placeholder="Religion" name="preligion" >
								     </div>
                                    
                                    <div class="form-group">
									<label>Phone Number*:</label>
									<input class="form-control" placeholder="Phone Number" name="pphonenumber" required >
								    </div>
                                    
                                    <div class="form-group">
									<label>Zipcode:</label>
									<input class="form-control" placeholder="Zipcode" name="pzipcode" >
                                    
                                    
                                    
                                   <div class="form-group">
									<label>Address</label>
								  	<textarea class="form-control" rows="3" placeholder="Address" name="paddress"></textarea>
								   </div>
                                    
                                    <div class="form-group">
									<label>Email Address:</label>
									<input class="form-control" placeholder="abc@abc.com" name="pemailadd" >
								    </div>
                                    
                                    <div class="form-group">
									<label>State:</label>
									<input class="form-control" placeholder="State" name="pstate"  >
								    </div>
                                    
                                    <div class="form-group">
									<label>Registration Date*:</label>
									<input  type="date" class="form-control" placeholder="Date" name="pregdate" required>
								    </div>
                                    
                                    <div class="form-group">
									<label>Disease:</label>
								 <input class="form-control" placeholder="Disease" name="pcategory"  >
								    </div>
                                    
                                    <div class="form-group">
									<label>Name Of Kim:</label>
								<input class="form-control" placeholder="abc" name="pnameofkim"  >
								    </div>
                                    
                                    <div class="form-group">
									<label>Patient Blood Group:</label>
								<input class="form-control" placeholder="o+" name="pbloodgrp" >
								    </div>
                                    
                                    <div class="form-group">
									<label>Treatment Name:</label>
									<select name="ptreatment">
                                                <option value="Select">---- </option>
                                              <option value="General surgery">General surgery </option>
                                              <option value="Orthopaedics">Orthopaedics</option>
                                              <option value="Virology">Virology </option>
                                              <option value="Arthroscopy">Arthroscopy</option>
                                              
                                            </select>
								    </div>
                                    
                                     <div class="form-group">
									<label>Treatment_fee:</label>
								    <input class="form-control" placeholder="fee" name="ptreatmentfee" >
								    </div>  
                                    
                                    <div class="form-group">
									<label>Medicine:</label>
								    <input class="form-control" placeholder="" name="pmedicine" >
								    </div>
                                    
                                        
                                 </div>   
                                    
                                 <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Appointment</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add Appointment Details</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" action="adbcode.php" method="post">
							
								
																
								
																
								<div class="form-group">
									<label>Appointment Date*:</label>
									<input  type="date" class="form-control" placeholder="Appointment date" name="adate" required>
								</div>
                                
                                    
                                    <div class="form-group">
									<label>Time*:</label>
									<input type="time" class="form-control"  name="atime" required >
								    </div>
                                
                                <div class="form-group">
                                <label>Appointment Doctor*:</label>
                         <?php        echo "<select name='adoctor'>";

                                    while ($row = $sql->fetch_assoc()) {

                                                  unset($id, $name);
                                                  $id = $row['doctor_id'];
                                                  $name = $row['first_name']; 
                                                  echo '<option value="'.$name.'">'.$name.'</option>';

                                            }

                                                echo "</select>";?>
                                    </div>
                                    
<!--
                                     <div class="form-group">
									<label>Appointment Doctor*:</label>
									<select name="adoctor" required>
                                                <option value="Select">---- </option>
                                              <option value="anish">anish </option>
                                              <option value="manish">manish</option>
                                              <option value="sumit">Sumit </option>
                                              <option value="ramu">Ramu</option>
                                              
                                            </select>
								    </div>
-->
                                
                                    
                                    <div class="form-group">
									<label>Appointment fee:</label>
								    <input class="form-control" placeholder="fee" name="appfees" >
								    </div>
                                    
                                    
                                    
                                    
                                    
                                               
                                    
                                <br> 
                                    
                                    
                                 <button type="submit" class="btn btn-primary" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;         </button>
                                
								
								
								
							
							
								
								
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->   
                                    
                                    
                                    
                                 
                                
								
								
								
							
							
								
								
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
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
