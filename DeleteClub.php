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
		$sql = "DELETE FROM club_list 
		WHERE Club_Name='".$_COOKIE["Club_Name"]."'";
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