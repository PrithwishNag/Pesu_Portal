<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="signupcss.css">

    <title>Signup</title>
  </head>
  <body>
    <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">PES UNIVERSITY</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
    <div class="container">
      <div class="row mt-4 heading">
        <div class="mx-auto">
          PES CLUB PORTAL
        </div>
      </div>

      <div class="row mt-2">
        <div class="mx-auto sub-head">
          Signup
        </div>
      </div>
      <div class="row mt-2">
        <div class="mx-auto" id="sub-head-change" style="font-size: 40px; font-family: 'Courier'"></div>
      </div>
      <div class="login-div" align="center" >
        <form align="center" class="signup-form"  onsubmit="return verify(this)" action="signupphp.php" method="POST">
          
          <div class="form-head">Name:</div>
          <input type="text"  maxlength="15" class="form-inp" name="name"><br><br>
          
          <div class="form-head">SRN:</div>
          <input type="text"  maxlength="13" class="form-inp" name="srn"><br><br>
          
          <div class="form-head">CGPA</div>
          <input type="number" name="cgpa" min="0" max="10" step=".01" oninvalid="notify(this);"><br><br>
          
          <div class="form-head">Program:</div> 
          <input type="text" class="form-inp" name="program" maxlength="10"><br><br>

          <div class="form-head">Sem:</div> 
          <input type="number" class="form-inp" min="1" max="7" name="sem" oninvalid="notify(this);"><br><br>

          <div class="form-head">Section:</div> 
          <input type="text" class="form-inp" maxlength="1" name="section" oninvalid="notify(this);"><br><br>

          <div class="form-head">Contact:</div>
          <input type="tel" maxlength="10" class="form-inp" id="clubContact" name="Club-Contact" oninvalid="notify(this);"><br><br>
          
          <div class="form-head">Email:</div> 
          <input type="email" class="form-inp" id="clubEmail" name="Club-Email" oninvalid="notify(this);"><br><br>
          
          <div class="form-head">Password:</div> 
          <input type="password" class="form-inp" maxlength="15" name="pass"><br><br>

          <i><span id="incorrect" class="text-danger">
            <?php
              if(!empty($_REQUEST['Message']))
              {
                echo $_REQUEST['Message'];
              }
            ?>
          </span></i><br>
          
          <input type="submit" class="btn btn-outline-danger btn-md"><br>
        </form>
      </div>
    </div>
      <div class="container-fluid foot">
        <div class="foot-content">
          <a href="#" class="badge badge-danger">@PESU</a>
        </div>
      </div>

    <script type="text/javascript" src="signupjs.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>