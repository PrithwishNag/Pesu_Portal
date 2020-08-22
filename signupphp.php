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
if(isset($_COOKIE['menu']))
{
	if($_COOKIE["menu"]=="Member")
	{
		$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
		$srn = mysqli_real_escape_string($conn, $_REQUEST['srn']);
		$cgpa = mysqli_real_escape_string($conn, $_REQUEST['cgpa']);
		$program = mysqli_real_escape_string($conn, $_REQUEST['program']);
		$sem = mysqli_real_escape_string($conn, $_REQUEST['sem']);
		$section = mysqli_real_escape_string($conn, $_REQUEST['section']);
		$contact = mysqli_real_escape_string($conn, $_REQUEST['Club-Contact']);
		$email = mysqli_real_escape_string($conn, $_REQUEST['Club-Email']);
		$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);

		if($name=='' || $cgpa=='' ||$srn=='' ||$program=='' ||$sem=='' ||$section=='' ||$contact=='' ||$email=='' ||$pass=='')
			die ("Empty fields");
		$sql = "SELECT email, password FROM member_table";
		$result=$conn->query($sql);
		while($row = $result->fetch_assoc())
        {
            if($row['email']==$email)
            {
                $conn->close();
                header("Location: signup.php?Message=Account With This Email Already Exists");
                die();
            }
        }

		$sql = "INSERT INTO member_table (name, srn, cgpa, program, sem, section, contact ,email, password)
		VALUES ('$name','$srn','$srn','$program','$sem','$section','$contact','$email','$pass')";

		if ($conn->query($sql) === TRUE) 
		{
		    $conn->close();
		    header("Location: login.html");
		} 
		else 
		{
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
else
{
	header("Location: home.html");
}

$conn->close();
?>