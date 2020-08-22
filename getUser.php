<!DOCTYPE html>
<html>
<head>
  <title>Get User Details</title>
</head>
<body>
  <?php
    $q=$_GET['q'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "memberdb";
    $i=1;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sqlcl="SELECT * FROM club_list WHERE Club_Name='".$q."'";
    $resultcl=$conn->query($sqlcl);
    while($rowcl= $resultcl->fetch_assoc())
    {
      echo "Head Of Club: <span class='output' id='HOCOut'>".$rowcl["Club_Head"]."</span><br>";
      echo "Contact: <span class='output' id='contactOut'>".$rowcl["Club_Head_Contact"]."</span><br>";
      echo "Email: <span class='output' id='emailOut'>".$rowcl["Club_Head_Email"]."</span><br><br>";
      echo "Number Of Members: <span class='output' id='NOMOut'>".$rowcl["Number_Of_Members"]."</span><br><br>";
    }
  ?>
</body>
</html>                  

                   