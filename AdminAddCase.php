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
<li><a href="#">Add Case</a></li>
<li><a href="AdminAddOfficer.php">Add Officer</a></li>
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
<a href="#">Add Case</a>
</p>
<form name="AddCase" action="" method="post">
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
<tr>
<td align=right>Note: </td>
<td align=left><textarea name="note" cols="20" rows="5"></textarea></td>
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
$case_id = $_POST['cid'];
$case_name = $_POST['cname'];
$officer_id = $_POST['oid'];
$officer_name = $_POST['oname'];
$note = $_POST['note'];

$sql_query = "INSERT INTO cases(Case_ID, Case_Name, Officer_ID, Officer_Name, Note)
VALUES('$case_id', '$case_name', '$officer_id', '$officer_name', '$note')";

$ins = mysqli_query($conn,$sql_query);

if($ins){
?>

<script>
alert("Case added to the database successfully");
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
$sql_query2 = "INSERT INTO case_officers
               VALUE('$case_id','$officer_id')";

$ins2 = mysqli_query($conn,$sql_query2);
}
?>