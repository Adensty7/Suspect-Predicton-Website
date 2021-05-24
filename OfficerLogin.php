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
<div class="Main">
<p>
<a href="#">Officer Login</a>
</p>
<form name="OfficerLogin" action="" method="post">
<table width="300" border="0" cellspacing="2" cellpadding="2" align=center>
<tr>
<td align=right>Case ID: </td>
<td align=left><input type="text" id="cid" name="cid" placeholder="Case ID"></td>
</tr>
<tr>
<td align=right>Officer ID: </td>
<td align=left><input type="text" id="oid" name="oid" placeholder="Officer ID"></td>
</tr>
<tr>
<td align=right>Password: </td>
<td align=left><input type="password" id="pword" name="pword" placeholder="Password"></td>
</tr>
</table>
<input type="submit" value="Login" name="submit">
</form>
</div>
<?php
include 'connection.php';
if(isset($_POST['submit'])){
$case_id = $_POST['cid'];
$officer_id = $_POST['oid'];
$password = $_POST['pword'];
if($password==NULL)
$password='1234';
$select_query = "select * from case_officers where Case_ID='$case_id' AND Officer_ID='$officer_id'";
$query = mysqli_query($conn,$select_query);
$res = mysqli_fetch_array($query);
if($res!=NULL)
{
$casepword = $case_id.$officer_id;
if($casepword==$password){
$insert_query = "INSERT INTO current_login(Case_ID, Officer_ID)
VALUES('$case_id','$officer_id')";
$query2 = mysqli_query($conn,$insert_query);
?>
<script>
window.location.href = "OfficerCaseHistory.php";
</script>
<?php
}
else
{
?>
<script>
alert("Incorrect password");
</script>
<?php
}
}
else
{
?>
<script>
alert("Incorrect password");
</script>
<?php
}
}
?>
</body>
</html>
