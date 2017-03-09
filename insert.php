<?php
include('connection.php');
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$date=$_POST['date'];
$query=mysqli_query($conn,"insert into info values('','$name','$email','$message','$date')");
if($query)
{
	echo "data saved";
}
else
{
	echo mysqli_error($conn);
}	
?>