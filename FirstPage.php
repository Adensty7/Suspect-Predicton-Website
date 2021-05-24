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
<div class="Main">
<p>
<a href="#">Login</a>
</p>
<a href="AdminLogin.php">
<img src="AdminButton.png" width=30%>
</a>  
<a href="OfficerLogin.php">
<img src="OfficerButton.png" width=30%>
</a>
<br>
<a href="Results.php">
<img src="ResultsButton.png" width=30%>
</a>
</div>
<?php
include 'connection.php';
$delete_query = "DELETE FROM current_login";
$query = mysqli_query($conn,$delete_query);
?>
</body>
</html>
