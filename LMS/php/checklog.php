<?php

$host="localhost"; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name="gulms"; // Database name 
$tbl_name="newuser"; // Table name 

// Connect to server and select databse.
mysqli_connect('localhost', 'root', '', 'gulms') or die("cannot connect"); 
mysqli_select_db("$db_name");

// username and password sent from form 
$soc_un=$_POST['soc_un']; 
$soc_pw=$_POST['soc_pw']; 

// To protect MySQL injection (more detail about MySQL injection)
$soc_un = stripslashes($soc_un);
$soc_pw = stripslashes($soc_pw);
$soc_un = mysqli_real_escape_string($soc_un);
$soc_pw = mysqli_real_escape_string($soc_pw);
$sql="SELECT * FROM $tbl_name WHERE uUserName='$soc_un' and uPassword='$soc_pw'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $soc_un and $soc_pw, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "soc_index.html"
  $_SESSION['login'] = true;
  header("location:soc_index.html");
}
else {
echo "Wrong Username or Password. Please Check and Try again.";
}
?>
