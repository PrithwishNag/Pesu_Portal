<!DOCTYPE html>
<html>
<head>
  <title>student dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel = "stylesheet" type = "text/css" href = "student-dashboard.css">
  <meta charset="utf-8">
  <meta http-http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
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

  <div class="container pc-nav">
    <div class="row" >
      <div class="header col-md-8" >
        <ul class="nav_links list-unstyled">
          <li class="li"><a class="a" href="#">Dashboard</a></li>
          <?php

            echo "<li class='li'><div class='dropdown show'>
              <a class='btn dropdown-toggle a' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                My Clubs
              </a>
              <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
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

                $name= $_COOKIE["srn"];
                $personid = "SELECT * FROM member_table WHERE srn='".$_COOKIE['srn']."'";
                $resultid=$conn->query($personid);
                $rowid = $resultid->fetch_assoc();

                $personid = "SELECT * FROM club_members WHERE memberid='".$rowid['id']."'";
                $resultid=$conn->query($personid);
                $flag=0;
                while($rowid = $resultid->fetch_assoc())
                {
                  $flag=1;
                  $clist = "SELECT * FROM club_list WHERE id='".$rowid['Clubid']."'";
                  $cresult=$conn->query($clist);
                  while($rcl = $cresult->fetch_assoc())
                  {
                    echo "<a class='dropdown-item' id='".$rcl["Club_Name"]."' onclick='delCN(this);createCN(this);redirect(this);' href='ClubDetails.php?msg=dont'>".$rcl["Club_Name"]."</a>";
                  }
                }
                if($flag==0)
                {
                  echo "<i>You are not in any Club</i>";
                }
            echo "</div>
            </div></li>";
          ?>
          <li class="li"><a class="a" href="#">Settings</a></li>
        </ul>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-2 logout" >
       <a href="logout.php" class="btn btn-danger logout-btn">logout</a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-5 profile-info">
        <h1><span id="Display-name"></span></h1>
        <h2>SRN:<span id="srn"></span></h2>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5 profile-image" style="text-align: right">
        <img id="dp" src="kingjpg.jpg" style="height:200px ;width:200px">
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
    <div class="col-md-12 attendance-status-table table-responsive">
      <div id="Claim-Table">
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

          $personid = "SELECT * FROM attendance WHERE memberid='".$rowid['id']."'";
          $resultid=$conn->query($personid);
          $rowid = $resultid->fetch_assoc();
          if(!isset($rowid['id']))
          {
            echo "<div class='container'>
                    <div class='row'>
                      <table class='content-table'>
                        <caption> <h2>Current Attendance Status</h2> </caption>
                      </table>
                    </div>
                    <div class='row'>
                      <button style='margin-left:50px' class='btn btn-danger' id='create'>Create</button>
                    </div>
                  </div>";
          }
          else
          {
            echo "<table class='content-table'>
                    <caption> <h2>Current Attendance Status</h2> </caption>
                      <thead>
                      <tr>
                        <th>Serial No.</th>
                        <th>Subject Code</th>
                        <th>Attendance Claimed</th>

                      </tr>
                      </thead>

                    <tbody id='claim'>";

              $i=1;
              echo "<tr><td>".$i."</td><td>".$rowid["Subject_Code"]."</td><td>".$rowid["Claim"]."</td></tr>";$i++;
              while($rowid = $resultid->fetch_assoc())
              {
                echo "<tr><td>".$i."</td><td>".$rowid["Subject_Code"]."</td><td>".$rowid["Claim"]."</td></tr>";$i++;
              }
              echo "<div class='container'><div class='row'><div class='col-md-2' ><button style='margin-left:30px' class='btn btn-danger' id='edit'>Edit</button></div></div></div>";
          }
      ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 acheivements-table table-responsive">
    <table class="content-table" >
      <caption> <h2>Achievements</h2> </caption>


      <thead>
      <tr>
        <th>Serial No.</th>
        <th>Event Name</th>
        <th>Remarks</th>
        <th>Associated Club</th>

      </tr>
    </thead>

    <tbody>
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

          $sql = "SELECT email, password, name, srn, cgpa, program, sem, section, contact FROM member_table WHERE ";

          $name= $_COOKIE["name"];
          $personid = "SELECT * FROM member_table WHERE name='".$_COOKIE['name']."'";
          $resultid=$conn->query($personid);
          $rowid = $resultid->fetch_assoc();

          $sqlcm="SELECT * FROM club_members WHERE memberid='".$rowid['id']."'";
          $resultClubMember=$conn->query($sqlcm);
          while($rowcm= $resultClubMember->fetch_assoc())
          {
            $sqlcl="SELECT * FROM club_list WHERE id='".$rowcm['Clubid']."'";
            $resultcl=$conn->query($sqlcl);
            $rowcl = $resultcl->fetch_assoc();

            $sqlachieve="SELECT * FROM achievements WHERE ClubMemberid='".$rowcm['id']."'";
            $resultAchieve=$conn->query($sqlachieve);

            while($rowachieve = $resultAchieve->fetch_assoc())
            { 
              echo "<tr><td>".$i."</td><td>".$rowachieve["event"]."</td><td>".$rowachieve["remark"]."</td><td>".$rowcl["Club_Name"]."</td></tr>";
              $i++;
            } 
          }
        ?>
    </tbody>
  </table>
</div>
</div>
</div>
  
    <script type="text/javascript">
      var Dname=document.getElementById("Display-name");
      var srn=document.getElementById("srn");
      var decoded=decodeURIComponent(document.cookie);
      var temp=decoded.split(";");
      var i=0;
      var xname="name";
      var xsrn="srn";
      // alert("hey");
      while(i<temp.length)
      {
        if(temp[i].includes("name"))
        {
          var unformatted=temp[i].substring(xname.length+1,);
          var formatted=unformatted.toUpperCase();
          Dname.innerHTML=formatted;
        }
        if(temp[i].includes("srn"))
        {
          srn.innerHTML=" "+temp[i].substring(xsrn.length+1,);
        }
        i++;
      }
    </script>
    <script type="text/javascript" src="student-dashboardjs.js">
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
