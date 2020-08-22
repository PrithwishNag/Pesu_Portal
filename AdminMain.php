<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="AdminMaincss.css">

    <title>Admin Main</title>
  </head>
  <body>
    <!--Navbar-->
      <?php
        if(!empty($_REQUEST['msg']))
        {
          echo '<script type="text/javascript">alert("Oops!!!\nSomething Went Wrong...!");</script>';
        }
      ?>
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
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
    
    <div class="sidenav bg-danger">
      <div class="head">
        <span>Logged In As Admin</span><br><br>
        <img src="kingjpg.jpg" alt="DP" id="DP" ><br>
        <span id="Admin-Name">Name</span>
      </div>
      <div>
        <a href="manageClub.php" class="mc">Manage Clubs</a> 
      </div>
      <div>
        <a href="" class="set">Settings</a>
      </div>
      <div class="logout-div">
        <a href="logout.php" class="logout">Logout</a>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5 Board">CLIP BOARD</div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
          <div class="card attendance">
            <div class="card-header">
              PENDING ATTENDANCE APPROVALS
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li class="at">Sem 1</li><br>
                <li class="at">Sem 3</li><br>
                <li class="at">Sem 5</li><br>
                <li class="at">Sem 7</li><br>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <div class="card room">
            <div class="card-header">
              PENDING ROOM BOOKING APPROVALS
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li class="at">club 1</li><br>
                <li class="at">club 2</li><br>
                <li class="at">club 3</li><br>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid foot">
      <div class="foot-content">
        <a href="#" class="badge badge-danger">@PESU</a>
      </div>
    </div>

    <script type="text/javascript">
      var Dname=document.getElementById("Admin-Name");
      var decoded=decodeURIComponent(document.cookie);
      var temp=decoded.split(";");
      var i=0;
      var xname="Admin_name";
      var xsrn="srn";
      while(i<temp.length)
      {
        if(temp[i].includes("Admin_name"))
        {
          var unformatted=temp[i].substring(xname.length+1,);
          var formatted=unformatted.toUpperCase();
          Dname.innerHTML=formatted;
        }
        i++;
      }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>