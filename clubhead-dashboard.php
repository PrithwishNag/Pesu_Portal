<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="club-dashboard.css">

    <title>Club head Dashboard</title>
  </head>
  <body>
    <!--Navbar-->

      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <span class = "open-slide">
        <a href ="#" onclick="opensidemenu()">
          <svg width="30" height="30">
              <path d="M0,5 30,5" stroke="#43BFC7" stroke-width="3"/>
              <path d="M0,14 30,14" stroke="#43BFC7" stroke-width="3"/>
              <path d="M0,23 30,23" stroke="#43BFC7" stroke-width="3"/>
          </svg>
        </a>
      </span>
      <a class="navbar-brand" href="#">PES UNIVERSITY</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div id="side-menu" class="side-menu">
      <a href="#" class="close-btn" onclick="closesidemenu()">&times;</a>
      <a href ="#"id="member-dets" onclick="openmemberdets()">Members Details</a>
      <a href ="#"id="book">Book Rooms</a>
      <a href ="#" id="attendance">View Attendance Claims By Members</a>
      <a href ="#" id="summary">Summary of Timeline</a>
      <a href ="#" id="settings-menu">Settings</a>
      <a href ="logout.php" id="logout-menu">Logout</a>
    </div>

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

    $chemail= $_COOKIE["Clubhead_email"];
    $personid = "SELECT * FROM club_list WHERE Club_Head_Email='".$chemail."'";
    $resultid=$conn->query($personid);
    $rowid = $resultid->fetch_assoc();
    $clubid=$rowid["id"];

    echo "<div id ='main' class='main'>
      <div class='memdets'>
      <h1 class='club-name' id='club-name'>".$rowid["Club_Name"]."</h1>
      <p class='no.ofmembers' id='no.ofmembers'> Number of members is: <span id='number'> ".$rowid["Number_Of_Members"]." </span> </p>
    </div>";
    echo "<div id ='member-database'  class='member-database'>
            <table class='member-list'>
              <h2 class='table-caption'> Member Details </h2>
              <thead>
                <tr>
                  <th>Sl no.</th>
                  <th>SRN</th>
                  <th>Name</th>

                  <th>Program</th>
                  <th>Semester</th>
                  <th>Section</th>
                  <th>Email</th>
                  <th>Attendance Requests</th>
              </tr>
            </thead>
            <tbody>";
      $sqlcm = "SELECT * FROM club_members WHERE Clubid='".$clubid."'";
      $cmres=$conn->query($sqlcm);
      $i=1;
      while($cmrow = $cmres->fetch_assoc())
      {
        $mid=$cmrow["memberid"];
        $sqlm = "SELECT * FROM member_table WHERE id='".$mid."'";
        $mres=$conn->query($sqlm);
        while($mrow = $mres->fetch_assoc())
        {
          echo "<tr>
                <td> ".$i." </td>
                <td> ".$mrow["srn"]." </td>
                <td> ".$mrow["name"]." </td>
                <td> ".$mrow["program"]." </td>
                <td> ".$mrow["sem"]." </td>
                <td> ".$mrow["section"]." </td>
                <td> ".$mrow["email"]." </td>
                <td> <a href='#' id='attendance-requests' class='attendance-requests'>Click</a></td>
            </tr>";
            $i++;
        }
      }
    echo "</tbody>
      </table>
    </div>";
    ?>

  <script>
  function closesidemenu()
  {
    document.getElementById("side-menu").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";

  }
  function opensidemenu()
  {
    document.getElementById("side-menu").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  function openmemberdets()
  {
    document.querySelector(".memdets").style.display="block";
    document.querySelector(".member-database").style.display="inline-block";
    document.querySelector(".member-database").style.marginLeft="0px";
  }
  //alert(document.cookie);

  </script>
  </body>
  </html>
