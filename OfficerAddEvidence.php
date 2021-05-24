<!DOCTYPE html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="webpages2.css">
</head>
<body bgcolor=cyan>
<div class="Header">
<h1> XYZ Investigative Agency </h1>
</div>
<br>
<div class="Bar" align=center>
<ul>
<li><a href="OfficerAddSuspect.php">Add Suspect</a></li>
<li><a href="#">Add Evidence</a></li>
<li><a href="OfficerAddCHistory.php">Add Case History</a></li>
<li><a href="OfficerSuspects.php">View Suspects</a></li>
<li><a href="OfficerEvidence.php">View Evidence</a></li>
<li><a href="OfficerCaseHistory.php">View Case History</a></li>
<li><a href="FirstPage.php">Log Out</a></li>
</ul>
</div>
<br><br><br>
<div class="Main">
<p>
<a href="#">Add Evidence</a>
</p>
<form name="Evidence" action="" method="post">
<table width="500" border="0" cellspacing="2" cellpadding="2" align=center>
<tr>
<td align=right>Evidence Type: </td>
<td align=left><select id="etype" name="etype">
<option value="Physical">Physical</option>
<option value="Logical">Logical</option>
<option value="Digital">Digital</option>
</select></td>
</tr>
<tr>
<td align=right>Evidence: </td>
<td align=left><input type="text" id="evid" name="evid" ></td>
</tr>
<tr>
<td align=right>Suspect: </td>
<td align=left><input type="text" id="sus" name="sus" ></td>
</tr>
<tr>
<td align=right>Points: </td>
<td align=left><input type="text" id="pts" name="pts" ></td>
</tr>
<tr>
<td align=right>Note: </td>
<td align=left><textarea name="note" cols="20" rows="5"></textarea></td>
</tr>
<tr>
</table>
<input type="submit" value="Submit" name="submit">
</form>
</div>
</body>
</html>

<?php
include 'connection.php';
if(isset($_POST['submit'])){
$evidence = $_POST['evid'];
$suspect_name = $_POST['sus'];
$evidence_type = $_POST['etype'];
$points = $_POST['pts'];
$note = $_POST['note'];

$select_query = "select Case_ID,Officer_ID from current_login";

$query = mysqli_query($conn,$select_query);

$res=mysqli_fetch_array($query);

$case_id=$res['Case_ID'];
$officer_id=$res['Officer_ID'];

$sql_query = "INSERT INTO evidence(Evidence, Case_ID, Suspect_Name, Officer_ID, Evidence_Type, Points, Note)
VALUES('$evidence', '$case_id', '$suspect_name', '$officer_id', '$evidence_type', '$points','$note')";

$ins = mysqli_query($conn,$sql_query);

if($ins){
?>

<script>
alert("Evidence added to the database successfully");
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
