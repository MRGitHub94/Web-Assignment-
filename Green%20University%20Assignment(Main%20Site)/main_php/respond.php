<?php


header( "refresh:5;url = http://greenuniversity.drawingsky.lk/contact.html" );

$link = mysqli_connect('localhost', 'root', '', 'gulms');
 
// Check connection
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$vname = mysqli_real_escape_string($link, $_POST['nm']);
$vcon = mysqli_real_escape_string($link, $_POST['nmbr']);
$vem = mysqli_real_escape_string($link, $_POST['email']);
$venq = mysqli_real_escape_string($link, $_POST['enquiry']);

// attempt insert query execution
$sql = "INSERT INTO contactUs (vName, vContact, vEmail, vMessage) VALUES ('$vname', '$vcon', '$vem', '$venq')";

if(mysqli_query($link, $sql)){
    echo "Your Message is Successfully submitted to the System. Thank your contacting Green University of Sri Lanka. We will respond you as soon as possible. You will be redirected to the previous page now!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>