<?php
error_reporting(0);

$to = 'info@yourbabysurgeon.com';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(isset($fname) || isset($lname) || isset($email) || isset($subject) || isset($message))
{
$message1 = "Hi ". $fname . $lname ." is seeking for an Appointment with the below concern "."<br>". $message;

echo $message1;

$headers = 'From: info@yourbabysurgeon.com';
//mail($to,$subject,$message1,$headers);
}
else
{
	echo "Nothing is received";
}

?>