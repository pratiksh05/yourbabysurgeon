<?php

error_reporting(0);

session_start();

include('db_conns.php');

if(isset($_POST['submit']))

	{
		$fullName = $_POST['fullName'];

		$parentsName = $_POST['parentsName'];

		$contactNumber = $_POST['contactNumber'];

		$emailID = $_POST['emailId'];

		$contactAddress = $_POST['contactAddress'];

		$pincode = $_POST['pincode'];

		$age = $_POST['age'];

		$sex = $_POST['sex'];

		$student = $_POST['profession'];

		$profession = $_POST['professionName'];

		$class = $_POST['class'];

		$institute = $_POST['institute'];

		$category = $_POST['category'];

		$categoryNew = ""; 

		 foreach($category as $categoryNew1) 
 		{ 
 			$categoryNew .= $categoryNew1 . ","; 
 		} 

		date_default_timezone_set("Asia/Kolkata");

		$today = date('Y-m-d h:i:s a', time());

		$fetchDetails = "SELECT count($contactNumber) as mobileNumber from stressbusterChallange where mobileNumber = \"$contactNumber\"";

		$fetchedDetails = mysqli_query($db_connection , $fetchDetails);

		$result = mysqli_fetch_array($fetchedDetails);

		if($result['mobileNumber'] > 0)
		{
		    echo "You have already registered! Please stay tuned for details";
		}
		else
		{
            $insert = "insert into stressbusterChallange (fullName, parentsName, mobileNumber,  emailID, address, pincode, age, sex, student ,profession,class,instituteDetails,category,status,date ) values (\"$fullName\" ,\"$parentsName\" ,\"$contactNumber\" , \"$emailID\" , \"$contactAddress\" , \"$pincode\",\"$age\", \"$sex\",\"$student\",\"$profession\",\"$class\",\"$institute\", \"$categoryNew\",1, \"$today\")";

            $insertInfo = mysqli_query($db_connection , $insert);

            echo  "You have registered successfully ! Please stay tuned for more details"
		}
		
		// header("location: register.php");
	}
	

?>
