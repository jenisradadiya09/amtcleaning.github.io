<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost:3308", "root", "", "amt");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['NAME']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$services = mysqli_real_escape_string($link, $_REQUEST['services']);
$city= mysqli_real_escape_string($link, $_REQUEST['city']); 
// Attempt insert query execution
$sql = "INSERT INTO booking (Name, Contact,services,city) VALUES ('$name', '$phone', '$services','$city')";
if(mysqli_query($link, $sql)){
header("Location: done.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>