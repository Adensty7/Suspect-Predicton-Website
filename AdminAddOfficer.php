<!DOCTYPE html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="webpages.css">
</head>
<body bgcolor=cyan>
<div class="Header">
<h1> XYZ Investigative Agency </h1>
</div>
<br>
<div class="Bar" align=center>
<ul>
<li><a href="AdminAddCase.php">Add Case</a></li>
<li><a href="#">Add Officer</a></li>
<li><a href="AdminAddCOfficer.php">Add Case Officer</a></li>
<li><a href="AdminPredictResult.php">Predict Result</a></li>
<li><a href="AdminAddResult.php">Add Result</a></li>
<li><a href="AdminSuspects.php">View Suspects</a></li>
<li><a href="AdminEvidence.php">View Evidence</a></li>
<li><a href="AdminCaseHistory.php">View Case History</a></li>
<li><a href="FirstPage.php">Log Out</a></li>
</ul>
</div>
<br><br><br>
<div class="Main">
<p>
<a href="#">Add Officer</a>
</p>
<form name="AddOfficer" action="" method="post">
<table width="500" border="0" cellspacing="2" cellpadding="2" align=center>
<tr>
<td align=right>Officer ID: </td>
<td align=left><input type="text" id="oid" name="oid" value="<?php $res?>"></td>
</tr>
<tr>
<td align=right>Officer Name: </td>
<td align=left><input type="text" id="oname" name="oname"></td>
</tr>
<tr>
<td align=right>Contact Number: </td>
<td align=left><input type="text" id="cnum" name="cnum"></td>
</tr>
<tr>
<td align=right>Email ID: </td>
<td align=left><input type="text" id="eid" name="eid"></td>
</tr>
<tr>
<td align=right>Area: </td>
<td align=left><input type="text" id="oarea" name="oarea"></td>
</tr>
<tr>
<td align=right>Address: </td>
<td align=left><textarea name="address" cols="20" rows="5"></textarea></td>
</tr>
</table>
<input type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>

<?php
include 'connection.php';
if(isset($_POST['submit'])){
$officer_id = $_POST['oid'];
$officer_name = $_POST['oname'];
$contact_number = $_POST['cnum'];
$email_id = $_POST['eid'];
$area = $_POST['oarea'];
$address = $_POST['address'];

$sql_query = "INSERT INTO officer(Officer_ID, Officer_Name, Contact_No, Email_ID, Area, Address)
VALUES ('$officer_id', '$officer_name', '$contact_number', '$email_id', '$area', '$address')";

$ins = mysqli_query($conn,$sql_query);

if($ins){
?>

<script>
alert("Officer added to the database successfully");
</script>
<?php
}
else{
?>
<script>
alert("Data not added");
</script>
<?php
}
}
?>