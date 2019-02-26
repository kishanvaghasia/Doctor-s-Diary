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
        
            
            $adate=$_POST['adate'];
            $atime=$_POST['atime'];
            $adoctor=$_POST['adoctor'];
            $apatient=$_POST['apatient'];
            $appfees=$_POST['appfees'];
            
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
         else if (ctype_alpha($apatient) === false) {
                       echo  'patient Name must only contain letters!';
            }
            else if (ctype_alpha($adoctor) === false) {
                       echo  'Doctor Name must only contain letters!';
            }
            else
            {            
            
            if (isset($_GET['id']) && !empty($_GET['id'])) {
            
            
            //$sql1=mysqli_query($con,"SELECT doctor_id,first_name FROM doctor_master");
            $sql = "update appointment set app_date= '" . $_POST['adate']."', app_time = '".$_POST['atime']."', app_doctor = '".$_POST['adoctor']."', app_patient = '".$_POST['apatient']."',app_fees = '".$_POST['appfees']."'  where app_id=". $_GET['id'];
            
        } 
        
        
		//else {
        //    $sql = "insert into student (name, age) values ('" . $_POST['txtName'] . "','" . $_POST['txtAge'] . "')";
       // }
        $res = mysqli_query($con,$sql);

        if ($res) {
            header("Location: appupdate1.php");
            exit;
        
            }
                }
    }
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
	
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $sql = "DELETE FROM appointment where app_id= " . $_GET['id'];
		//die($sql);
        $result = mysqli_query($con,$sql);
        
        header("Location: appupdate1.php");
        exit;
    }
    else
    {
        $sql = "SELECT * FROM appointment where app_id= " . $_GET['id'];    
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
									<label>Appointment Date*:</label>
									<input  type="date" class="form-control" placeholder="Appointment date" name="adate" required value="<?php echo isset($stdData['app_date'])? $stdData['app_date'] : ''; ?>" />
								</div>
                                
                                    
                                    <div class="form-group">
									<label>Time*:</label>
									<input type="time" class="form-control"  name="atime" required value="<?php echo isset($stdData['app_time'])? $stdData['app_time'] : ''; ?>" />
								    </div>
                                
                                    
                                
                                
                                
                                
                                    
                                     <div class="form-group">
									<label>Appointment Doctor*:</label>
									<select name="adoctor" required>
                                                <option value="Select">---- </option>
                                        <option value="Sumit" <?php if($stdData['app_doctor']=="Sumit"){ echo "selected";}?>>Sumit </option>
                                              <option value="Ramu"<?php if($stdData['app_doctor']=="Ramu"){ echo "selected";}?>>Ramu</option>
                                              <option value="anish" <?php if($stdData['app_doctor']=="anish"){ echo "selected";}?>>Anish </option>
                                             
                                              
                                              
                                            </select>
								    </div>
                                
                                    <div class="form-group">
									<label>Appointment Patient*:</label>
									<input class="form-control" placeholder="Patient fname" name="apatient" required autofocus="" value="<?php echo isset($stdData['app_patient'])? $stdData['app_patient'] : ''; ?>" />
								    </div>
                                
                                    <div class="form-group">
									<label>Appointment Fee*:</label>
									<input class="form-control" placeholder="Fees" name="appfees" required autofocus="" value="<?php echo isset($stdData['app_fees'])? $stdData['app_fees'] : ''; ?>" />
								    </div>
                                    
                                    
                                  
                                
                                
                                
                                
                                
                                    <button type="submit" class="btn btn-primary" name="submit" value="Save" >Submit</button>
                                 </div> 
                                
                                </div>
                                    
                                   
                                    
                                 
                                
								
								
								
							
							
								
                        
                        
                        
                        
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