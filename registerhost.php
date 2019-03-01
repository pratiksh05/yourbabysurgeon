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
		    echo "You have already registered ! Stay tuned for more details";
		}
		else
		{
            $insert = "insert into mahagnanayagam (hostName,hostAddress,mobileNumber,emailID,dateofInterest,category,status,date ) values (\"$fullName\" ,\"$address\", \"$contactNumber\", \"$emailID\", \"$eventdate\", \"$category\",1, \"$today\")";

            $insertInfo = mysqli_query($db_connection , $insert);

            echo "You have registered successfully ! Please stay tuned for more details";
        }

		// header("location: register.php");
	}


?>
