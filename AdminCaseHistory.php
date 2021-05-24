<!DOCTYPE html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="webpages.css">
<link rel="stylesheet" href="table.css">
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
<li><a href="AdminPredictResult.php">Predict Result</a></li>
<li><a href="AdminAddResult.php">Add Result</a></li>
<li><a href="AdminSuspects.php">View Suspects</a></li>
<li><a href="AdminEvidence.php">View Evidence</a></li>
<li><a href="#">View Case History</a></li>
<li><a href="FirstPage.php">Log Out</a></li>
</ul>
</div>
<br><br><br>
<div class="Main">
<p>
<a href="#">View Case History</a>
</p>
<form name="Case History" method="post">
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
$case_id=$_POST['cid'];
$select_query = " select * from case_history where Case_ID = '$case_id'";

$query = mysqli_query($conn,$select_query);

$check_query = "select Case_ID from cases where Case_ID='$case_id'";
$query2 = mysqli_query($conn,$check_query);
$check = mysqli_fetch_object($query2);
if($check!=NULL)
{
?>

<table id="t1">
<thead>
<tr>
<th>Case_ID</th>
<th>Officer_ID</th>
<th>Date</th>
<th>History</th>
</tr>
</thead>
<tbody>

<?php
while($res = mysqli_fetch_array($query)){
?>

<tr>
<td><?php echo $res['Case_ID']; ?></td>
<td><?php echo $res['Officer_ID']; ?></td>
<td><?php echo $res['Date']; ?></td>
<td><?php echo $res['History']; ?></td>
</tr>

<?php
}
}
else{
?>
<script>
alert("Case does not exist");
</script>
<?php
}
}
?>
</tbody>
</table>
</div>
</body>
</html>

