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
<div class="Main" width=100%>
<p>
<a href="#">Results</a>
</p>
<table id="t1">
<thead>
<tr>
<th>Case_ID</th>
<th>Case_Name</th>
<th>Suspect_Name</th>
<th>Note</th>
</tr>
</thead>
<tbody>

<?php

include 'connection.php';

$select_query = " select * from case_result";

$query = mysqli_query($conn,$select_query);

while($res = mysqli_fetch_array($query)){

?>

<tr>
<td><?php echo $res['Case_ID']; ?></td>
<td><?php echo $res['Case_Name']; ?></td>
<td><?php echo $res['Suspect_Name']; ?></td>
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
