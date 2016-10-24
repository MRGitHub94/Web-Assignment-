<?php
header( "refresh:5;url = http://greenuniversity.drawingsky.lk/LMS" );

$link = mysqli_connect('localhost', 'root', '', 'gulms');
 
// Check connection
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_POST['title']);
$ufn = mysqli_real_escape_string($link, $_POST['name']);
$uln = mysqli_real_escape_string($link, $_POST['last_name']);
$udob = mysqli_real_escape_string($link, $_POST['date']);
$umob = mysqli_real_escape_string($link, $_POST['month']);
$uyob = mysqli_real_escape_string($link, $_POST['year']);
$usch = mysqli_real_escape_string($link, $_POST['school']);
$unic = mysqli_real_escape_string($link, $_POST['nic_no']);
$uadd = mysqli_real_escape_string($link, $_POST['address']);
$ucity = mysqli_real_escape_string($link, $_POST['city']);
$udis = mysqli_real_escape_string($link, $_POST['district']);
$ucon = mysqli_real_escape_string($link, $_POST['contact_phone']);
$uun = mysqli_real_escape_string($link, $_POST['username']);
$upw = mysqli_real_escape_string($link, $_POST['password2']);
$uem = mysqli_real_escape_string($link, $_POST['email2']);

// attempt insert query execution
$sql = "INSERT INTO newUser (uTitle, uFirstName, uLastName, uBdate, uBmonth, uByear, uSchool, uNIC, uAddress, uCity, uDistrict, uContact, uUserName,uPassword, uEmail) VALUES ('$title', '$ufn', '$uln', '$udob', '$umob', '$uyob', '$usch', '$unic', '$uadd', '$ucity', '$udis', '$ucon', '$uun', '$upw', '$uem')";

if(mysqli_query($link, $sql)){
    echo "Thank you for Registering with Green University of Sri Lanka. You will be back to the Home page!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>