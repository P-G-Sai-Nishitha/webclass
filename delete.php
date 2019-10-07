<?php
include 'conn.php';
$id = $_GET['id'];

$query ="DELETE FROM `students` WHERE `id` = $id";
$result=mysqli_query($con,$query);
if($result){
	echo "successfully deleted";
}
else
{
	echo "failed to delete";
}

?>