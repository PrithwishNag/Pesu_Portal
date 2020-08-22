<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "memberdb";

if(isset($_COOKIE['Club_Name']))
	$Club_Name=$_COOKIE['Club_Name'];
else
{
	header("Location: AdminMain.php?msg=fail");
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$Des = mysqli_real_escape_string($conn, $_REQUEST['Description']);
$HOCname = mysqli_real_escape_string($conn, $_REQUEST['HOCname']);
$HOCcontact = mysqli_real_escape_string($conn, $_REQUEST['HOCcontact']);
$HOCemail = mysqli_real_escape_string($conn, $_REQUEST['HOCemail']);
$CCname = mysqli_real_escape_string($conn, $_REQUEST['CCname']);
$CCcontact = mysqli_real_escape_string($conn, $_REQUEST['CCcontact']);
$CCemail = mysqli_real_escape_string($conn, $_REQUEST['CCemail']);
$CC2name = mysqli_real_escape_string($conn, $_REQUEST['CC2name']);
$CC2contact = mysqli_real_escape_string($conn, $_REQUEST['CC2contact']);
$CC2email = mysqli_real_escape_string($conn, $_REQUEST['CC2email']);

/*if($Des=='' || $HOCname=='' ||$HOCcontact=='' ||$HOCemail=='' ||$CCname=='' ||$CCemail=='' ||$CCcontact=='')
{
    header("Location: CD_form.php?msg=missing");
	die ("Empty fields");
}*/

$sql = "SELECT * FROM club_list";
$result=$conn->query($sql);
$club_id="";
while($row = $result->fetch_assoc())
{
    if($row['Club_Name']==$Club_Name)
    {
        $club_id=$row['id'];
    }
}

$sql = "SELECT * FROM club_details WHERE clubid='".$club_id."';";
$result=$conn->query($sql);
if($row = $result->fetch_assoc())
{    
    if($CC2name=='' ||$CC2email=='' ||$CC2contact=='')
    {
        $sqlupdate="UPDATE club_details
                SET Description = '$Des', core1_name = '$CCname', core1_contact = '$CCcontact', core1_email = '$CCemail'
                WHERE condition; ";
        if($conn->query($sqlupdate)===True)
            header("Location: ClubDetails.php");
        else
            die("Error1");
    }
    else
    {
        $sqlupdate="UPDATE club_details
                SET Description = '$Des', core1_name = '$CCname', core1_contact = '$CCcontact', core1_email = '$CCemail', core2_name = '$CC2name', core2_contact = '$CC2contact', core2_email = '$CC2email'
                WHERE clubid='".$club_id."'; ";
        if($conn->query($sqlupdate)===True)
            header("Location: ClubDetails.php");
        else
            die("Error2");
    }
}
else 
{
    if($CC2name=='' ||$CC2email=='' ||$CC2contact=='')
    {
        $sqlinsert = "INSERT INTO club_details (core1_name,core1_contact,core1_email,Description,clubid)
        VALUES ('$CCname','$CCcontact','$CCemail','$Des','$club_id')";
        if($conn->query($sqlinsert)===True)
            header("Location: ClubDetails.php");
        else
            die("Error3");
    }
    else
    {
        $sqlinsert = "INSERT INTO club_details (core1_name,core1_contact,core1_email,core2_name,core2_contact,core2_email,Description,clubid)
        VALUES ('$CCname','$CCcontact','$CCemail','$CC2name','$CC2contact','$CC2email','$Des','$club_id')";
        if($conn->query($sqlinsert)===True)
            header("Location: ClubDetails.php");
        else
            die("Error4");
    }
}   
echo $row["Description"];

$sql = "INSERT INTO club_details (des)
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


$conn->close();
?>