<?php

error_reporting(0);

session_start();

include('db_conns.php');

if(isset($_POST['submit']))

	{
		$fullName = $_POST['name'];

		$husbandName = $_POST['husbandName'];

		$contactNumber = $_POST['contactNumber'];

		$emailID = $_POST['emailId'];

		$contactAddress = $_POST['contactAddress'];

		date_default_timezone_set("Asia/Kolkata");

		$today = date('Y-m-d h:i:s a', time());

		$fetchDetails = "SELECT count($contactNumber) as mobileNumber from pregnancy where contactNumber = \"$contactNumber\"";

		//echo $fetchDetails;

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
            $insert = "insert into pregnancy (name,husbandName,contactNumber,emailID,contactAddress,status,date ) values (\"$fullName\" ,\"$husbandName\", \"$contactNumber\", \"$emailID\", \"$contactAddress\",1, \"$today\")";
            //echo $insert;
            $insertInfo = mysqli_query($db_connection , $insert);

            echo '<div>
		    		<p style="text-align:center;color:green;font-weight:bold;font-size:36px; margin-top:100px;font-family:font-family: Lucida Console, Monaco, monospace ;">You have registered successfully ! Please stay tuned for more details</p>
		    	</div>';
        }

		// header("location: register.php");
	}


?>
