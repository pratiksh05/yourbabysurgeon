<?php
error_reporting(0);
include('db_conns.php');
date_default_timezone_set("Asia/Kolkata");
$today = date('Y-m-d h:i:s a', time());
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(isset($fname) || isset($lname) || isset($email) || isset($subject) || isset($message))
{
//$message1 = "Hi ". $fname . $lname ." has sent you below feedback "."<br>". $message;
    $name = $fname . ' ' . $lname;
    $insert = "insert into feedback (name,emailID,subject,message,date) values (\"$name\",\"$email\",\"subject\",\"$message\",\"$today\")";
    $result = mysqli_query($db_connection,$insert);
    if($result)
    {
        echo "Feedback sent successfully";
    }
}
else
{
	echo "Something went wrong ! Please try again";
}

?>