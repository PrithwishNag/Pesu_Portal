<?php
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

    $name= $_COOKIE["name"];
    $personid = "SELECT * FROM member_table WHERE name='".$_COOKIE['name']."'";
    $resultid=$conn->query($personid);
    $rowid = $resultid->fetch_assoc();

    $sqldel="DELETE FROM attendance WHERE memberid='".$rowid['id']."';";
    if($conn->query($sqldel))
    {
        $success=1;
    }


      if($_GET['sub1'] && $_GET['sub1-claim'])
      $sql1 = "INSERT INTO attendance(Subject_Code,Claim,memberid) VALUES ('".$_GET['sub1']."','".$_GET['sub1-claim']."','".$rowid['id']."')";
      if($_GET['sub2'] && $_GET['sub2-claim'])
      $sql2 = "INSERT INTO attendance(Subject_Code,Claim,memberid) VALUES ('".$_GET['sub2']."','".$_GET['sub2-claim']."','".$rowid['id']."')";
      if($_GET['sub3'] && $_GET['sub3-claim'])
      $sql3 = "INSERT INTO attendance(Subject_Code,Claim,memberid) VALUES ('".$_GET['sub3']."','".$_GET['sub3-claim']."','".$rowid['id']."')";
      if($_GET['sub4'] && $_GET['sub4-claim'])
      $sql4 = "INSERT INTO attendance(Subject_Code,Claim,memberid) VALUES ('".$_GET['sub4']."','".$_GET['sub4-claim']."','".$rowid['id']."')";
      if($_GET['sub5'] && $_GET['sub5-claim'])
      $sql5 = "INSERT INTO attendance(Subject_Code,Claim,memberid) VALUES ('".$_GET['sub5']."','".$_GET['sub5-claim']."','".$rowid['id']."')";
    if($sql1)
    if ($conn->query($sql1) === TRUE) 
    {
        $conn->close();
        header("Location: student-dashboard.php");
    } 
    if($sql2)
    if ($conn->query($sql2) === TRUE) 
    {
        $conn->close();
        header("Location: student-dashboard.php");
    }
    if($sql3)
    if ($conn->query($sql3) === TRUE) 
    {
        $conn->close();
        header("Location: student-dashboard.php");
    }
    if($sql4)
    if ($conn->query($sql4) === TRUE) 
    {
        $conn->close();
        header("Location: student-dashboard.php");
    }
    if($sql5)
    if ($conn->query($sql5) === TRUE) 
    {
        $conn->close();
        header("Location: student-dashboard.php");
    }
?>