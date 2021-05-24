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
<li><a href="AdminAddCOfficer.php">Add Case Officer</a></li>
<li><a href="#">Predict Result</a></li>
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
<a href="#">Prediction</a>
</p>
<form name="Prediction" action="" method="post">
<table width="350" border="0" cellspacing="2" cellpadding="2" align=center>
<tr>
<td align=right>Case ID: </td>
<td align=left><input type="text" id="cid" name="cid" ></td>
</tr>
</table>
<input type="submit" value="Submit" name="submit">
</form>
<?php
include 'connection.php';
if(isset($_POST['submit'])){
$case_id = $_POST['cid'];
$sql_query = "select Case_ID from cases where Case_ID='$case_id';";

$query = mysqli_query($conn,$sql_query);

$check = mysqli_fetch_object($query);
if($check!=NULL)
{

$select_query = "select Case_Name from cases where Case_ID='$case_id';";
$query2 = mysqli_query($conn,$select_query);
$cname = mysqli_fetch_array($query2);

$insert_query1 = "INSERT INTO suspect_physical(Points, Suspect_Name)
SELECT Points, Suspect_Name
FROM Evidence
WHERE Evidence_Type = 'Physical' 
AND Suspect_Name IN
(SELECT DISTINCT Suspect_Name 
FROM suspect
Where Case_ID = '$case_id');";
$query3a = mysqli_query($conn,$insert_query1);

$insert_query2 = "INSERT INTO suspect_digital(Points, Suspect_Name)
SELECT Points, Suspect_Name
FROM Evidence
WHERE Evidence_Type = 'Digital' 
AND Suspect_Name IN
(SELECT DISTINCT Suspect_Name 
FROM suspect
Where Case_ID = '$case_id');";
$query3b = mysqli_query($conn,$insert_query2);

$insert_query3 = "INSERT INTO suspect_logical(Points, Suspect_Name)
SELECT Points, Suspect_Name
FROM Evidence
WHERE Evidence_Type = 'Logical' 
AND Suspect_Name IN
(SELECT DISTINCT Suspect_Name 
FROM suspect
Where Case_ID = '$case_id');";
$query3c = mysqli_query($conn,$insert_query3);

$insert_query4 = "INSERT INTO suspect_average(Points, Suspect_Name)
SELECT Avg(P.Points) AS Points, P.Suspect_Name AS Suspect_Name
FROM suspect_physical P
GROUP BY Suspect_Name;";
$query3d = mysqli_query($conn,$insert_query4);

$insert_query5 = "INSERT INTO suspect_average(Points, Suspect_Name)
SELECT Avg(L.Points) AS Points, L.Suspect_Name AS Suspect_Name
FROM suspect_logical L
GROUP BY Suspect_Name;";
$query3e = mysqli_query($conn,$insert_query5);


$insert_query6 = "INSERT INTO suspect_average(Points, Suspect_Name)
SELECT Avg(D.Points) AS Points, D.Suspect_Name AS Suspect_Name
FROM suspect_digital D
GROUP BY Suspect_Name;";
$query3f = mysqli_query($conn,$insert_query6);

$insert_query7 = "INSERT INTO suspect_max(Points, Suspect_Name)
SELECT Avg(Points), Suspect_Name
FROM suspect_average
GROUP BY Suspect_Name;";
$query3g = mysqli_query($conn,$insert_query7);

?>
<table width="500" border="0" cellspacing="2" cellpadding="2" align=center>
<tr>
<td align=right>Case ID: </td>
<td align=left><input type="text" id="cname" name="cname" value="<?php echo $case_id?>"></td>
</tr>
<tr>
<td align=right>Case Name: </td>
<td align=left><input type="text" id="cname" name="cname" value="<?php echo $cname['Case_Name'];?>"></td>
</tr>
<?php
$select_query2=" SELECT Points, Suspect_Name
FROM suspect_max
WHERE Points = (SELECT MAX(Points)
                 FROM suspect_max);";
$query4 = mysqli_query($conn,$select_query2);

$res = mysqli_fetch_array($query4);
?>
<tr>
<td align=right>Suspect: </td>
<td align=left><input type="text" id="sus" name="sus" value="<?php echo $res['Suspect_Name'];?>"></td>
</tr>
<tr>
<td align=right>Points: </td>
<td align=left><input type="text" id="pts" name="pts" value="<?php echo $res['Points'];?>" ></td>
</tr>
</table>
<?php
$delete_query1 = "DELETE FROM suspect_average;";
$query5 = mysqli_query($conn,$delete_query1);
$delete_query2 = "DELETE FROM suspect_physical;";
$query6 = mysqli_query($conn,$delete_query2);
$delete_query3 = "DELETE FROM suspect_logical;";
$query7 = mysqli_query($conn,$delete_query3);
$delete_query4 = "DELETE FROM suspect_digital;";
$query8 = mysqli_query($conn,$delete_query4);
$delete_query5 = "DELETE FROM suspect_max;";
$query9 = mysqli_query($conn,$delete_query5);
}
else
{
?>
<script>
alert("Case does not exist");
</script>
<?php
}
}
?>
</div>
</body>
</html>

