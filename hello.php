<?php 
echo 'Hello World';

$servername = "localhost";
$username = "root";
$password = "coder1234";

$conn  = new mysqli($servername,$username,$password);

if($conn->connect_error){
	die("Connection failed: ");
}

echo 'Connection success';

?>
