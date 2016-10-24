<?php


header( "refresh:5;url = http://greenuniversity.drawingsky.lk/apply.html" );

$link = mysqli_connect('localhost', 'root', '', 'gulms');
 
// Check connection
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$gfn = mysqli_real_escape_string($link, $_POST['fn']);
$gln = mysqli_real_escape_string($link, $_POST['ln']);
$gcon = mysqli_real_escape_string($link, $_POST['nmbr']);
$gemail = mysqli_real_escape_string($link, $_POST['email']);
$gprog = mysqli_real_escape_string($link, $_POST['prgrm']);
$gqua = mysqli_real_escape_string($link, $_POST['qu']);

// attempt insert query execution
$sql = "INSERT INTO applyNow (gFirstName, gLastName, gContact, gEmail, gProgram, gQualifications) VALUES ('$gfn', '$gln', '$gcon', '$gemail', '$gprog', '$gqua')";

if(mysqli_query($link, $sql)){
    echo "Your application has been successfully submitted & Now is being reviewd. We will confirm your eligibility as soon as possible. Please, Check your mail inbox. You will be back to the previous page now!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>