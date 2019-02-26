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

if(isset($_POST['submit']))
{
$query = $_POST['psearch'];
?>
<html>
<head>
<title><?php echo $query;?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
$min_length = 1;
if(strlen($query) >= $min_length)
{
$query = htmlspecialchars($query);
$query = mysqli_real_escape_string($query);
echo "<table border='0' width='300' align='center' cellpadding='1' cellspacing='1'>";
echo "<tr align='center' bgcolor='#002C40' style='color:#FFF'>
<td height='35px' width='150px'>Title</td> <td>Author</td>

</tr>";
$raw_results =

mysqli_query("SELECT * FROM patient_master WHERE (`patient_fname` LIKE '%".$query."%') ");
if(mysql_num_rows($raw_results) > 0)
{
while($results = mysql_fetch_array($raw_results))
{
echo "<tr align='center' bgcolor='#0f7ea3'>

<td height='25px'>".$results['title']."</td> <td>".$results['text']."</td>

</tr>" ;
}

}
else{
echo "<tr align='center' bgcolor='#6C0000'>

<td colspan='2' height='25px'>No results</td><tr>";
echo "</table>";
}
}
else{
echo "Minimum length is ".$min_length;
}}

?>
</body>
</html> 