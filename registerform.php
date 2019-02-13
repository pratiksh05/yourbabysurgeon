<?php

error_reporting(0);

session_start();

include('db/db_con.php');

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

		$profession = $_POST['profession'];

		$professionName = $_POST['professionName'];

		$class = $_POST['class'];

		$institute = $_POST['institute'];

		$category = $_POST['category'];

		$categoryNew = ""; 

		 foreach($category as $categoryNew1) 
 		{ 
 			$categoryNew .= $categoryNew1 . ","; 
 		} 

		$aadharCard = $_FILES['aadharCard']['name'];
		$size = $_FILES['aadharCard']['size'];
		$type = $_FILES['aadharCard']['type'];
		$tmp_name = $_FILES['aadharCard']['tmp_name'];

		if(isset($aadharCard) && !empty($aadharCard)){
		$location = "UploadedFiles";
		if(move_uploaded_file($tmp_name, $location.$aadharCard)){
			alert(Successfully);
		}else{
			alert(Failed);
		}
		}


		$photo = $_POST['photo'];

		date_default_timezone_set("Asia/Kolkata");

		$today = date('Y-m-d h:i:s a', time());


		
			

				$insert = "insert into hanumanchalisaevent (fullName, parentsName, contactNumber,  emailID, contactAddress, pincode, age, sex, aadharCard, photo, profession ,professionName, class, institute,category, date ) values (\"$fullName\" ,\"$parentsName\" ,\"$contactNumber\" , \"$emailID\" , \"$contactAddress\" , \"$pincode\",    \"$age\", \"$sex\",   \"$aadharCard\",   \"$photo\",  \"$profession\",  \"$professionName\",   \"$class\",   \"$institute\", \"$categoryNew\", \"$today\")";

				$insertInfo = mysqli_query($db_connection , $insert);

				 echo  $insert;

			

		
		// header("location: register.php");
	}
	

?>
