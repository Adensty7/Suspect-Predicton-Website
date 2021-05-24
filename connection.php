<?php

$username="root";
$password="";
$server='localhost';
$database = 'project';

$conn = mysqli_connect($server,$username,$password);



$db = mysqli_select_db($conn,$database); 

if($conn){
?>
<?php
}
else{
   echo "No Connection";
   die("No Connection" . mysqli_connect_error());
}

?>