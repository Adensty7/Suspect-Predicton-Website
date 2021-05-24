<!DOCTYPE html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="webpages2.css">
<link rel="stylesheet" href="table.css">
</head>
<body bgcolor=cyan>
<div class="Header">
<h1> XYZ Investigative Agency </h1>
</div>
<br>
<div class="Bar" align=center>
<ul>
<li><a href="OfficerAddSuspect.php">Add Suspect</a></li>
<li><a href="OfficerAddEvidence.php">Add Evidence</a></li>
<li><a href="OfficerAddCHistory.php">Add Case History</a></li>
<li><a href="OfficerSuspects.php">View Suspects</a></li>
<li><a href="#">View Evidence</a></li>
<li><a href="OfficerCaseHistory.php">View Case History</a></li>
<li><a href="FirstPage.php">Log Out</a></li>
</ul>
</div>
<br><br><br>
<div class="Main" width=100%>
<p>
<a href="#">View Evidence</a>
</p>
<table id="t1">
<thead>
<tr>
<th>Case_ID</th>
<th>Officer_ID</th>
<th>Evidence</th>
<th>Type</th>
<th>Suspect_Name</th>
<th>Points</th>
<th>Note</th>
</tr>
</thead>
<tbody>

<?php

include 'connection.php';

$select_query = "select Case_ID,Officer_ID from current_login";

$query = mysqli_query($conn,$select_query);

$res=mysqli_fetch_array($query);

$case_id=$res['Case_ID'];

$select_query2 = " select * from evidence where Case_ID = '$case_id'";

$query = mysqli_query($conn,$select_query2);

while($res = mysqli_fetch_array($query)){

?>

<tr>
<td><?php echo $res['Case_ID']; ?></td>
<td><?php echo $res['Officer_ID']; ?></td>
<td><?php echo $res['Evidence']; ?></td>
<td><?php echo $res['Evidence_Type']; ?></td>
<td><?php echo $res['Suspect_Name']; ?></td>
<td><?php echo $res['Points']; ?></td>
<td><?php echo $res['Note']; ?></td>
</tr>

<?php

}
 
?>

</tbody>
</table>
</div>
</body>
</html>

