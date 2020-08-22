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

if($_COOKIE["menu"]=="Member")
{

	$email = mysqli_real_escape_string($conn, $_REQUEST['Club-Email']);
	$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);

	if($email=='' ||$pass=='')
	{
		die("Empty fields");
	}

	$sql = "SELECT email, password, name, srn, cgpa, program, sem, section, contact FROM member_table";
	$result=$conn->query($sql);
	while($row = $result->fetch_assoc())
	{
		if($row['email']===$email && $row['password']===$pass)
		{
			setcookie("name",$row['name'],time()+3*(86400));
			setcookie("srn",$row['srn'],time()+3*(86400));
			setcookie("cgpa",$row['cgpa'],time()+3*(86400));
			setcookie("program",$row['program'],time()+3*(86400));
			setcookie("sem",$row['sem'],time()+3*(86400));
			setcookie("section",$row['section'],time()+3*(86400));
			setcookie("contact",$row['contact'],time()+3*(86400));
			setcookie("email",$row['email'],time()+3*(86400));
			if(isset($_COOKIE["Admin_name"])&&isset($_COOKIE["Admin_email"]))
			{
				setcookie("Admin_name","",time()-3*(86400));
				setcookie("Admin_email","",time()-3*(86400));
			}
			if(isset($_COOKIE["Clubhead_name"])&&isset($_COOKIE["Clubhead_email"]))
			{
				setcookie("Clubhead_name","",time()-3*(86400));
				setcookie("Clubhead_email","",time()-3*(86400));
			}
			header("Location: student-dashboard.php");
			die("found");
		}
	}
	header("Location: login.php?msg=notFound");
	die("not found");
}
else if($_COOKIE["menu"]=="Admin")
{

	$email = mysqli_real_escape_string($conn, $_REQUEST['Club-Email']);
	$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);

	if($email=='' ||$pass=='')
	{
		die("Empty fields");
	}

	$sql = "SELECT email, password, name FROM admin_table";
	$result=$conn->query($sql);
	while($row = $result->fetch_assoc())
	{
		echo "here";
		if($row['email']==$email && $row['password']==$pass)
		{
			setcookie("Admin_name",$row['name'],time()+3*(86400));
			setcookie("Admin_email",$row['email'],time()+3*(86400));
			if(isset($_COOKIE["name"])&&isset($_COOKIE["srn"])&&isset($_COOKIE["cgpa"])&&isset($_COOKIE["program"])&&isset($_COOKIE["sem"])&&isset($_COOKIE["section"])&&isset($_COOKIE["contact"])&&isset($_COOKIE["email"]))
			{
				setcookie("name","",time()-3*(86400));
				setcookie("srn","",time()-3*(86400));
				setcookie("cgpa","",time()-3*(86400));
				setcookie("program","",time()-3*(86400));
				setcookie("sem","",time()-3*(86400));
				setcookie("section","",time()-3*(86400));
				setcookie("contact","",time()-3*(86400));
				setcookie("email","",time()-3*(86400));
			}
			if(isset($_COOKIE["Clubhead_name"])&&isset($_COOKIE["Clubhead_email"]))
			{
				setcookie("Clubhead_name","",time()-3*(86400));
				setcookie("Clubhead_email","",time()-3*(86400));
			}
			header("Location: AdminMain.php");
			die("found");
		}
	}
	header("Location: login.php?msg=notFound");
	die("not found");
}
else if($_COOKIE["menu"]=="Club Head")
{

	$email = mysqli_real_escape_string($conn, $_REQUEST['Club-Email']);
	$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);

	if($email=='' ||$pass=='')
	{
		die("Empty fields");
	}

	$sql = "SELECT * FROM club_list";
	$result=$conn->query($sql);
	while($row = $result->fetch_assoc())
	{
		echo "here";
		if($row['Club_Head_Email']==$email && $row['password']==$pass)
		{
			setcookie("Clubhead_name",$row['Club_Head'],time()+3*(86400));
			setcookie("Clubhead_email",$row['Club_Head_Email'],time()+3*(86400));
			if(isset($_COOKIE["name"])&&isset($_COOKIE["srn"])&&isset($_COOKIE["cgpa"])&&isset($_COOKIE["program"])&&isset($_COOKIE["sem"])&&isset($_COOKIE["section"])&&isset($_COOKIE["contact"])&&isset($_COOKIE["email"]))
			{
				setcookie("name","",time()-3*(86400));
				setcookie("srn","",time()-3*(86400));
				setcookie("cgpa","",time()-3*(86400));
				setcookie("program","",time()-3*(86400));
				setcookie("sem","",time()-3*(86400));
				setcookie("section","",time()-3*(86400));
				setcookie("contact","",time()-3*(86400));
				setcookie("email","",time()-3*(86400));
			}
			if(isset($_COOKIE["Admin_name"])&&isset($_COOKIE["Admin_email"]))
			{
				setcookie("Admin_name","",time()-3*(86400));
				setcookie("Admin_email","",time()-3*(86400));
			}

			header("Location: clubhead-dashboard.php");
			die("found");
		}
	}
	header("Location: login.php?msg=notFound");
	die("not found");
}

$conn->close();
?>