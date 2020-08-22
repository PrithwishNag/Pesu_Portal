<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "memberdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$Cname = mysqli_real_escape_string($conn, $_REQUEST['Club_Name']);
$CHname = mysqli_real_escape_string($conn, $_REQUEST['Club_Head']);
$contact = mysqli_real_escape_string($conn, $_REQUEST['Club-Contact']);
$email = mysqli_real_escape_string($conn, $_REQUEST['Club-Email']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['Club-Pass']);

 
	if($Cname=='' || $CHname=='' ||$contact=='' ||$email=='' )
		die ("Empty fields");

	$sql = "INSERT INTO club_list (Club_Name,Club_Head,Club_Head_Contact,Club_Head_Email,password)
	VALUES ('$Cname','$CHname','$contact','$email','$pass')";
	if ($conn->query($sql) === TRUE) 
	{
	    $conn->close();
	    header("Location: manageClub.php");
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();
?>