<?php

error_reporting(0);

session_start();

include('db_conns.php');

if(isset($_POST['submit']))

	{
		$fullName = $_POST['name'];

		$address = $_POST['contactAddress'];

		$contactNumber = $_POST['contactNumber'];

		$emailID = $_POST['emailId'];

		$eventdate = $_POST['eventdate'];

		$category = $_POST['category'];

		date_default_timezone_set("Asia/Kolkata");

		$today = date('Y-m-d h:i:s a', time());

		$fetchDetails = "SELECT count($contactNumber) as mobileNumber from mahagnanayagam where mobileNumber = \"$contactNumber\"";

		$fetchedDetails = mysqli_query($db_connection , $fetchDetails);

		$result = mysqli_fetch_array($fetchedDetails);

		if($result['mobileNumber'] > 0)
		{
			echo '<div>
		    		<p style="text-align:center;color:green;font-weight:bold;font-size:36px; margin-top:100px;font-family:font-family: Lucida Console, Monaco, monospace ;">You have already registered ! Stay tuned for more details</p>
		    	</div>';
		}
		else
		{
            $insert = "insert into mahagnanayagam (hostName,hostAddress,mobileNumber,emailID,dateofInterest,category,status,date ) values (\"$fullName\" ,\"$address\", \"$contactNumber\", \"$emailID\", \"$eventdate\", \"$category\",1, \"$today\")";

            $insertInfo = mysqli_query($db_connection , $insert);

            echo  $insert;
        }

		// header("location: register.php");
	}


?>
