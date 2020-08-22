<form action='attendanceClaimForm.php' method='GET'>
<table class='content-table'>
<caption> <h2>Current Attendance Status</h2> </caption>
  <thead>
  <tr>
    <th>Serial No.</th>
    <th>Subject Code</th>
    <th>Attendance Claimed</th>

  </tr>
  </thead>

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

    $personid = "SELECT * FROM attendance WHERE memberid=".$rowid['id'];
    $resultid=$conn->query($personid);
    $i=0;
    if(!($rowid = $resultid->fetch_assoc()))
    {	
    	echo "
			<tbody id='claim'>
			<tr>
				<td>1</td>
				<td><input type='text' name='sub1' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub1-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			<tr>
				<td>2</td>
				<td><input type='text' name='sub2' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub2-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			<tr>
				<td>3</td>
				<td><input type='text' name='sub3' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub3-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			<tr>
				<td>4</td>
				<td><input type='text' name='sub4' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub4-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			<tr>
				<td>5</td>
				<td><input type='text' name='sub5' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub5-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			</tbody>
			</table>
			<div class='row'>
				<input type='submit' name='create' value='Submit' class='btn btn-outline-danger' style='margin-left: 70px;' >
			</div>";
    }
    else
    {
    	$sc=$rowid["Subject_Code"];
	    $c=$rowid['Claim'];
    	echo "
				<tbody id='claim'>
				<tr>
					<td>1</td>
					<td><input type='text' name='sub1' style='border:none;border-bottom:1px solid black;width:60%;' value='$sc' ></td>
					<td><input type='number' name='sub1-claim' style='border:none;border-bottom:1px solid black;width:20%;' value='$c'></td>
				</tr>";

		    if($rowid = $resultid->fetch_assoc())
		    {
		    	$sc=$rowid["Subject_Code"];
	    		$c=$rowid['Claim'];
				echo "
						<tr>
							<td>2</td>
							<td><input type='text' name='sub2' style='border:none;border-bottom:1px solid black;width:60%;' value='$sc'></td>
							<td><input type='number' name='sub2-claim' style='border:none;border-bottom:1px solid black;width:20%;' value='$c'></td>
						</tr>";
			}	
			else
			{
				echo "
						<tr>
							<td>2</td>
							<td><input type='text' name='sub2' style='border:none;border-bottom:1px solid black;width:60%;' value=''></td>
							<td><input type='number' name='sub2-claim' style='border:none;border-bottom:1px solid black;width:20%;' value=''></td>
						</tr>";
			}
			if($rowid = $resultid->fetch_assoc())
		    {
		    	$sc=$rowid["Subject_Code"];
	    		$c=$rowid['Claim'];
				echo"<tr>
						<td>3</td>
						<td><input type='text' name='sub3' style='border:none;border-bottom:1px solid black;width:60%;' value='$sc'></td>
						<td><input type='number' name='sub3-claim' style='border:none;border-bottom:1px solid black;width:20%;' value='$c'></td>
					</tr>";
			}
			else
			{
				echo "
						<tr>
							<td>3</td>
							<td><input type='text' name='sub3' style='border:none;border-bottom:1px solid black;width:60%;' value=''></td>
							<td><input type='number' name='sub3-claim' style='border:none;border-bottom:1px solid black;width:20%;' value=''></td>
						</tr>";
			}
			if($rowid = $resultid->fetch_assoc())
		    {
		    	$sc=$rowid["Subject_Code"];
	    		$c=$rowid['Claim'];
				echo"<tr>
						<td>4</td>
						<td><input type='text' name='sub4' style='border:none;border-bottom:1px solid black;width:60%;' value='$sc'></td>
						<td><input type='number' name='sub4-claim' style='border:none;border-bottom:1px solid black;width:20%;' value='$c'></td>
					</tr>";
			}
			else
			{
				echo "
						<tr>
							<td>4</td>
							<td><input type='text' name='sub4' style='border:none;border-bottom:1px solid black;width:60%;' value=''></td>
							<td><input type='number' name='sub4-claim' style='border:none;border-bottom:1px solid black;width:20%;' value=''></td>
						</tr>";
			}
			if($rowid = $resultid->fetch_assoc())
		    {
		    	$sc=$rowid["Subject_Code"];
	    		$c=$rowid['Claim'];
				echo"<tr>
						<td>5</td>
						<td><input type='text' name='sub5' style='border:none;border-bottom:1px solid black;width:60%;' value='$sc'></td>
						<td><input type='number' name='sub5-claim' style='border:none;border-bottom:1px solid black;width:20%;' value='$c'></td>
					</tr>
				</tbody>
				";
			}
			else
			{
				echo "
						<tr>
							<td>5</td>
							<td><input type='text' name='sub5' style='border:none;border-bottom:1px solid black;width:60%;' value=''></td>
							<td><input type='number' name='sub5-claim' style='border:none;border-bottom:1px solid black;width:20%;' value=''></td>
						</tr>";
			}
		/*}
		echo "
			<tbody id='claim'>
			<tr>
				<td>1</td>
				<td><input type='text' name='sub1' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub1-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			<tr>
				<td>2</td>
				<td><input type='text' name='sub2' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub2-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			<tr>
				<td>3</td>
				<td><input type='text' name='sub3' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub3-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			<tr>
				<td>4</td>
				<td><input type='text' name='sub4' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub4-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			<tr>
				<td>5</td>
				<td><input type='text' name='sub5' style='border:none;border-bottom:1px solid black;width:60%;'></td>
				<td><input type='number' name='sub5-claim' style='border:none;border-bottom:1px solid black;width:20%;'></td>
			</tr>
			</tbody>";*/
		echo "</table>
				<div class='row'>
					<input type='submit' value='Submit' name='edit' class='btn btn-outline-danger' style='margin-left: 70px;' >
				</div>";
	}
?>
</form>