<?php
include 'conn.php';
$id = $_POST['id'];
$stud_name = $_POST['stud_name'];
$stud_email = $_POST['stud_email'];
$stud_address = $_POST['stud_address'];
$stud_dob = $_POST['stud_dob'];
$stud_phno = $_POST['stud_phno'];

$query = "UPDATE `students` SET `stud_name` = '$stud_name',`stud_email` = 'stud_email',`stud_address` = '$stud_address',`stud_DOB` = '$stud_DOB',`stud_phno` = '$stud_phno' WHERE `id` =$id";
// echo $query;
$result = mysqli_query($con,$query);

if($result){
	echo"successfully updated";
}
else{
	echo "failed to update";
}
?>