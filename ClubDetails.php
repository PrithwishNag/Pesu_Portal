<!DOCTYPE html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>

    <link rel='stylesheet' type='text/css' href='ClubDetailscss.css'>

    <title>Home</title>
  </head>
  <body>
    <!--Navbar-->
      <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='navbar-brand' href='#'>PES UNIVERSITY</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>

      <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav mr-auto'>
          <li class='nav-item active'>
            <a class='nav-link' href='#'>Home <span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='#'>Link</a>
          </li>
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              Dropdown
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
              <a class='dropdown-item' href='#'>Action</a>
              <a class='dropdown-item' href='#'>Another action</a>
              <div class='dropdown-divider'></div>
              <a class='dropdown-item' href='#'>Something else here</a>
            </div>
          </li>
          <li class='nav-item'>
            <a class='nav-link disabled' href='#' tabindex='-1' aria-disabled='true'>Disabled</a>
          </li>
        </ul>
        <form class='form-inline my-2 my-lg-0'>
          <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
          <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
        </form>
      </div>
    </nav>
    <div class='container-fluid'>
      <div class='row heading'>
        <div class='col-md-5'>
          <span class='Club-Name-Header text-danger'><?php echo $_COOKIE['Club_Name'] ?></span>
        </div>
        <div class='col-md-3'></div>
        <div class='col-md-4' style='text-align: center;'>
          <?php
          if(isset($_GET['msg']) && $_GET["msg"]=="dont")
          {
            echo "";
          }
          else  
            echo "<div class='timeline'>
              <a href='TimeLine.html' class='badge badge-danger' >TIMELINE</a>
            </div>";
          ?>
        </div>
      </div>
      <?php
          if(isset($_GET['msg']) && $_GET["msg"]=="dont")
          {
            echo "";
          }
          else
            echo "          
            <div class='row'>
              <div class='col-md-7'></div>
              <div class='col-md-3 text-danger' style='padding-top:20px;font-size: 22px;font-family:'Courier' '>If You Want to add stuff-></div>
              <div class='col-md-2'>
                <a class='btn btn-outline-danger btn-lg' href='CD_form.php' style='margin-bottom:50px'>Add</a>
              </div>
            </div>";
          
      ?>
      <div class='row description'>
        <div class='card col-md-12' style='padding:0px'>
        <div class='card-header text-danger' style='font-size:25px;'>
          Description
        </div>
        <div class='card-body'>
          <span id='Description-Output'>

    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "memberdb";
      $i=1;
      $noinfo=0;
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 

        /*$name= $_COOKIE["name"];
        $personid = "SELECT * FROM member_table WHERE name='".$_COOKIE['name']."'";
        $resultid=$conn->query($personid);
        $rowid = $resultid->fetch_assoc();*/

        $sqlcl = "SELECT * FROM club_list WHERE Club_Name='".$_COOKIE['Club_Name']."';";
        $rescl=$conn->query($sqlcl);
        $rowcl = $rescl->fetch_assoc();

        $sqlcd = "SELECT * FROM club_details WHERE clubid='".$rowcl['id']."';";
        $rescd=$conn->query($sqlcd);
        if($rowcd = $rescd->fetch_assoc())
          echo $rowcd['Description'];
        else
          echo "Info Not Here"; 

    echo"</span>
        </div>
        </div>         
      </div>
      <div class='row'>
        <div class='card cards col-md-4'>
          <div class='card-header text-danger'>
            HEAD OF CLUB
          </div>
          <div class='card-body'>
            Head Of Club: <span>
            ";
            if(isset($rowcl['Club_Head']))
            {
              echo $rowcl['Club_Head'];
            }
            else
            {
              echo "No Info";
            }

        echo  "
            </span><br>
            Contact: <span>
            ";
            if(isset($rowcl['Club_Head_Contact']))
            {
              echo $rowcl['Club_Head_Contact'];
            }
            else
            {
              echo "No Info";
            }
        echo "           
            </span><br>
            Email: <span>
            ";
            
            if(isset($rowcl['Club_Head_Email']))
            {
              echo $rowcl['Club_Head_Email'];
            }
            else
            {
              echo "No Info";
            }
        echo "
            </span><br><br>
            <img src='kingjpg.jpg' style='width:95%; '>
          </div>
        </div>
        <div class='card cards col-md-4'>
          <div class='card-header text-danger'>
            CLUB CORE MEMBER
           </div>
          <div class='card-body'>
            Club Core Member: <span>
            ";
           
            if(isset($rowcd['core1_name']))
            {
              echo  $rowcd['core1_name'];
            }
            else
            {
              echo "No Info";
            }
        echo "
            </span><br>
            Contact: <span>
            ";
            if(isset($rowcd['core1_contact']))
            {
              echo $rowcd['core1_contact'];
            }
            else
            {
              echo "No Info";
            }
        echo "
            </span><br>
            Email: <span>
            ";
            
            if(isset($rowcd['core1_email']))
            {
              echo $rowcd['core1_email'];
            }
            else
            {
              echo "No Info";
            }
        echo "
            </span>
          </div>
        </div>
        <div class='card cards col-md-4'>
          <div class='card-header text-danger' style='width:100%'>
            CLUB CORE MEMBER
            </div>
          <div class='card-body'>
            Club Core Member: <span>";
            if(isset($rowcd['core2_name']))
            {
              echo  $rowcd['core2_name'];
            }
            else
            {
              echo "No Info";
            }
        echo "
            </span><br>
            Contact: <span>
            ";
            if(isset($rowcd['core2_contact']))
            {
              echo $rowcd['core2_contact'];

            }
            else
            {
              echo "No Info";
            }
        echo "
            </span><br>
            Email: <span>
            ";
            
            if(isset($rowcd['core2_email']))
            {
              echo $rowcd['core2_email'];
            }
            else
            {
              echo "No Info";
            }

        echo "</span>
          </div>
        </div>
      </div>
          
      <div class='row' style=' font-family: 'Courier''>
        <div class='card col-md-12' style='padding: 20px 0px 20px 20px; font-family:courier;font-size:20px'>
        Number of Members: ";
        if(isset($rowcl['Number_Of_Members']))
        {
          echo $rowcl['Number_Of_Members'];
        }
        else
        {
          echo "No Info";
        }
        echo "
        </div>
      </div>

      <!--Member Table-->
      <div class='row' style='margin:20px 0px 0px 0px;'>
        <div class='col-md-2'></div>
        <div class='col-md-3' align='bottom' style='width:100%'>
          <input type='text' name='search'>
        </div>
        <div class='col-md-1'>
          <button class='btn btn-outline-danger btn-lg' style='margin-bottom:20px;'>Search</button>
        </div>
        <div class='col-md-3'></div>
        <div class='col-md-3'>
          <button class='btn btn-outline-danger btn-lg'>Filter</button>
        </div>
      </div>
      </div>
      <div class='container'>
      <div class='row Member-Table'>
        <div class='col-md-12 table-responsive card' style='padding:0px;'>
        <div class='card-header bg-danger text-white'>Members</div>
        <table id='Table-Details' class='table'>
        <thread> 
          <tr class='Head-Row '>
            <th scope='col'>Sr no.</th>
            <th scope='col'>SRN</th>
            <th scope='col'>Name</th>
            <th scope='col'>CGPA</th>
            <th scope='col'>Program</th>
            <th scope='col'>Sem</th>
            <th scope='col'>Section</th>
            <th scope='col'>Email</th>
            <th scope='col'>Attendance</th>
          </tr>
        </thread>
        <tbody>
          ";
        $sqlcm = "SELECT * FROM club_members WHERE Clubid='".$rowcl['id']."';";
        $rescm = $conn->query($sqlcm);
      while($rowcm = $rescm->fetch_assoc())
      {
        $sqlm = "SELECT * FROM member_table WHERE id='".$rowcm['memberid']."';";
        $resm = $conn->query($sqlm);
        $rowm = $resm->fetch_assoc();
        $i=1;
      do
      {
        echo "<tr><td>".$i."</td><td>".$rowm['name']."</td><td>".$rowm['srn']."</td><td>".$rowm['cgpa']."</td><td>".$rowm['program']."</td><td>".$rowm['sem']."</td><td>".$rowm['section']."</td><td>".$rowm['email']."</td><td>".$rowm['contact']."</td></tr>";$i++;
      }while($rowm = $resm->fetch_assoc());
      }
      echo "
        </tbody>
        </table>
      </div>
      </div>
    </div>";
    ?>
      <div class='container-fluid foot'>
        <div class='foot-content'>
          <a href='#' class='badge badge-danger'>@PESU</a>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
  </body>
</html>