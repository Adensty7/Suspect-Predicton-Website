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
<li><a href="AdminAddOfficer.php">Add Officer</a></li>
<li><a href="#">Add Case Officer</a></li>
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
<a href="#">Add Officer to Case</a>
</p>
<form name="AddCaseOfficer" action="" method="post">
<table width="500" border="0" cellspacing="2" cellpadding="2" align=center>
<tr>
<td align=right>Case ID: </td>
<td align=left><input type="text" id="cid" name="cid"></td>
</tr>
<tr>
<td align=right>Case Name: </td>
<td align=left><input type="text" id="cname" name="cname"></td>
</tr>
<tr>
<td align=right>Officer ID: </td>
<td align=left><input type="text" id="oid" name="oid"></td>
</tr>
<tr>
<td align=right>Officer Name: </td>
<td align=left><input type="text" id="oname" name="oname"></td>
</tr>
</table>
<input type="submit" value="Submit" name="submit">
</form>
</div>
</body>
</html>

<?php
include 'connection.php';
if(isset($_POST['submit'])){
$case_id = $_POST['cid'];
$officer_id = $_POST['oid'];

$sql_query = "INSERT INTO case_officers(Case_ID, Officer_ID)
VALUES('$case_id', '$officer_id')";

$ins = mysqli_query($conn,$sql_query);

if($ins){
?>

<script>
alert("Officer added to the case successfully");
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
