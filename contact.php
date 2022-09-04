<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost:3308", "root", "", "amt");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$contact = mysqli_real_escape_string($link, $_REQUEST['number']);
$subject = mysqli_real_escape_string($link, $_REQUEST['subject']);
$message= mysqli_real_escape_string($link, $_REQUEST['message']); 
// Attempt insert query execution
$sql = "INSERT INTO contact (Name,email,phone,subject,message) VALUES ('$name', '$email','$contact', '$subject','$message')";
if(mysqli_query($link, $sql)){
header("Location: done2.html ");
} 
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>