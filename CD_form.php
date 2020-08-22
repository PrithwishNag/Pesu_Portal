<!DOCTYPE html>
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
        <div class="mx-auto" style="font-size: 70px">
          PES CLUB PORTAL
        </div>
      </div>

      <div class="row mt-2" style="margin-left:20px">
        <div class="mx-auto sub-head" >
          ~Fill Details Of The Club~ 
        </div>
      </div>
      <div class="login-div" align="center" >
        <!--onsubmit="return verify(this)"-->
        <form align="center" class="signup-form"  action="CD_formSubmit.php" method="POST">
          
          <div class="form-head">Description*</div>
          <textarea class="des" name="Description" style="margin-bottom: 20px;font-size: 15px;border:none;border-left-width:2px;border-left-color:red;border-left-style:dashed;" align="left" rows="6" cols="25"></textarea>
          
          <div class="HeadDetailsBtns">
            <button type="button" class="btn btn-danger dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Head Of Club Details*
            </button>
            <div class="dropdown-menu">
              <div class="form-head inner">Name:</div>
              <input type="text"  maxlength="100" class="form-inp inner" name="HOCname"><br>
              <div class="dropdown-divider"></div>

              <div class="form-head inner">Contact:</div>
              <input type="tel"  maxlength="10" class="form-inp inner" name="HOCcontact"><br>
              <div class="dropdown-divider"></div>

              <div class="form-head inner">Email:</div>
              <input type="email"  maxlength="100" class="form-inp inner" name="HOCemail"><br>
              <div class="dropdown-divider"></div>
            </div>
          </div>  
          <div class="HeadDetailsBtns"> 
            <button type="button" style="margin:20px 0px 20px 0px;" class="btn btn-danger dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Club Core Details*
            </button>
            <div class="dropdown-menu">
              <div class="form-head inner">Name:</div>
              <input type="text"  maxlength="100" class="form-inp inner" name="CCname"><br>
              <div class="dropdown-divider"></div>

              <div class="form-head inner">Contact:</div>
              <input type="tel"  maxlength="10" class="form-inp inner" name="CCcontact"><br>
              <div class="dropdown-divider"></div>

              <div class="form-head inner">Email:</div>
              <input type="email"  maxlength="100" class="form-inp inner" name="CCemail"><br>
              <div class="dropdown-divider"></div>
            </div>
          </div>
          <div class="HeadDetailsBtns">
            <button type="button" class="btn btn-danger dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              IInd Club Core Details
            </button>
            <div class="dropdown-menu">
              <div class="form-head inner">Name:</div>
              <input type="text"  maxlength="100" class="form-inp inner" name="CC2name"><br>
              <div class="dropdown-divider"></div>

              <div class="form-head inner">Contact:</div>
              <input type="tel"  maxlength="10" class="form-inp inner" name="CC2contact"><br>
              <div class="dropdown-divider"></div>

              <div class="form-head inner">Email:</div>
              <input type="email"  maxlength="100" class="form-inp inner" name="CC2email"><br>
              <div class="dropdown-divider"></div>
            </div>
          </div>
          
          <div style="margin-top: 30px;"><a href="#" class="btn btn-danger">Add A Member</a></div>

          <i><span id="incorrect" class="text-danger">
            <?php
              if(!empty($_REQUEST['msg']))
              {
                echo 'Missing * Fields';
              }
              else
              {
                echo "* Fields Are Compulsory";
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
    <!--<script type="text/javascript" src="signupjs.js"></script>-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>