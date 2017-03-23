<?php
include('connection.php');
$query=mysqli_query($conn,"select * from info order by id desc limit 0,5") or die (mysqli_error($conn));
$result_data=array();
while($row = mysqli_fetch_array($query))
{
	$result_data[]=$row;
}
echo json_encode($result_data);
?>