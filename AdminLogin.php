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
<a href="#">Admin Login</a>
</p>
<form name="AdminLogin" action="" method="post">
<table width="300" border="0" cellspacing="2" cellpadding="2" align=center>
<tr>
<td align=right>Username: </td>
<td align=left><input type="text" id="uname" name="uname" placeholder="Username"></td>
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
$username = $_POST['uname'];
$password = $_POST['pword'];
if($password==NULL)
$password='1234';
$select_query = "select * from admin where Login_ID='$username'";

$query = mysqli_query($conn,$select_query);
$res = mysqli_fetch_array($query);
if($res!=NULL)
{
if($res['Login_ID']==$username && $res['Password']==$password){
$insert_query = "INSERT INTO current_login(Login_ID)
VALUES('$username')";
$query2 = mysqli_query($conn,$insert_query);
?>
<script>
window.location.href = "AdminAddCase.php";
</script>
<?php
}
else
{
?>
<script>
alert("Incorrect password or username");
</script>
<?php
}
}
else
{
?>
<script>
alert("Incorrect password or username");
</script>
<?php
}
}
?>
</body>
</html>

