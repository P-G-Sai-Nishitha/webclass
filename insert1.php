<?php
include 'conn.php';

$stud_name = $_POST['stud_name'];
$stud_email = $_POST['stud_email'];
$stud_address = $_POST['stud_address'];
$stud_dob = $_POST['stud_dob'];
$stud_phno = $_POST['stud_phno'];

$query = "INSERT INTO `students` (`stud_name`,`stud_email`,`stud_address`,`stud_DOB`,`stud_phno`) VALUES('$stud_name','$stud_email','$stud_address','$stud_dob','$stud_phno')";
// echo $query;
$result = mysqli_query($con,$query);

if($result){
	echo"successfully inserted";
}
else{
	echo "failed to insert";
}
?>