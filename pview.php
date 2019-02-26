<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctor_diary";
 $conn = new mysqli($servername, $username, $password, $dbname) or die(mysql_error());
//$con = mysql_connect("localhost", "root");
$data = array();
if($conn)
{
    $db = mysqli_select_db($conn,"doctor_diary");
    
    $sql = "Select * from patient_master where patient_id= " . $_GET['id']; 
	#die($sql);
    //$res = mysqli_query($sql, $conn);
	$res = mysqli_query($conn,$sql);
    
    
    while($row = mysqli_fetch_object($res))
    {
        $data[] = $row;
    }
    
    
}

?>






<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Doctor's Diary</title>

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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
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
			<li class="active"><a href="welcome.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/><use xlink:href="#stroked-dashboard-dial"></use></svg>Home</a></li>
			
			<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1" ><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Patient </span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="addpatient.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Details
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
            <hr>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b> Doctor </b> </hr>
        <hr></hr>
           
            <li class="parent">
        
				<a href="addpatient.php">
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
                    <input type="button" class="btn btn-primary" name="dsearch" value="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    Search Doctor &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    ">
					
				</a>
				
                
            </li>
             <hr>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b> Appointment </b> </hr>
        <hr></hr>
            
            <li class="parent">
        
				<a href="addappointment.php">
                    <input type="button" class="btn btn-primary" name="addapp" value="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    Add Appointment &nbsp; &nbsp; &nbsp;    ">
					
				</a>
				
                
            </li>
            
             <li class="parent">
        
				<a href="appupdate1.php">
                    <input type="button" class="btn btn-primary" name="appedit" value="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   Edit Appointment &nbsp; &nbsp; &nbsp;    ">
					
				</a>
				
                
            </li>
            
            <li class="parent">
        
				<a href="searchapp.php">
                    <input type="button" class="btn btn-primary" name="appedit" value="&nbsp;  &nbsp; &nbsp;   Search Appointment  &nbsp; &nbsp;    ">
					
				</a>
				
                
            </li>
</div><!--/.sidebar-->        

    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit</div>
					<div class="panel-body">
                    
                    
                    
                    <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true"  data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        
                        
						    <thead>
						    <tr>
						        
						        <th  data-sortable="true">ID</th>
						        <th   data-sortable="true">Firstname</th>
						        <th  data-sortable="true">Middle Name</th>
                                <th  data-sortable="true">Last Name</th>
                                <th  data-sortable="true">Date OF Birth</th>
                                 <th  data-sortable="true">Gender</th>
                                <th  data-sortable="true">Aadhar Number</th>
                                <th  data-sortable="true">Caste</th>
                                <th  data-sortable="true">Religion</th>
                                <th  data-sortable="true">Address</th>
                                <th  data-sortable="true">Phone Number</th>
                                <th  data-sortable="true">Zicode</th>
                                <th  data-sortable="true">Email Address</th>
                                <th  data-sortable="true">State</th>
                                <th  data-sortable="true">Registration Date</th>
                                <th  data-sortable="true">Category</th>
                                <th  data-sortable="true">Name of Kim</th>
                                <th  data-sortable="true">Blood Group</th>


                                
						    </tr>
						    </thead>
                        
                            <?php
                            $cnt = count($data);
                            for($i=0; $i < $cnt; $i++)
                            {
                                $std = $data[$i];
                            ?>
                            
                        <tr>
                        <td>
                            <?php echo $std->patient_id; ?>
                        </td>
                            
                        </tr>
                        <td>
                            <?php echo $std->patient_fname; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_mname; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_lname; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_dob; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_gender; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_identity_number; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_caste; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_religion; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_address; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_phonenumber; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_zipcode; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_emailaddress; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_state; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_registrationdate; ?>
                        </td>
                         <td>
                            <?php echo $std->patient_category; ?>
                        </td>
                        <td>
                            <?php echo $std->name_of_kim; ?>
                        </td>
                        <td>
                            <?php echo $std->patient_bloodgroup; ?>
                        </td>
                            
                         </tr>
                        
                        <?php
                            }
                            ?>
                        
                            
                        
						</table>
                        
                        
                        
                        
					</div>
				</div>
			</div>
		</div><!--/.row-->	
        
        
            
			
		</ul>

	
		
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

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
