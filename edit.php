<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	.container{
		width: 60%;
		height: 400px;
		margin: auto;
		box-shadow: 0px 0px 5px 5px #eee;
		border: 2px solid gray;
		border-radius: 5px;
		padding: 15px;
	}
</style> 
</head>
<body>
	<?php
	include 'conn.php';
	$id=$_GET['id'];
	$query = "SELECT * FROM `students` WHERE `id` = $id";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
	// $id =$row[0];
	$stud_name = $row[1];
	$stud_email = $row[2];
	$stud_address = $row[3];
	$stud_DOB = $row[4];
	$stud_phno = $row[5];
	?>
	<div class="container">
		<form>
			<input type="hidden" name="id" id="id" value="<?php echo $id?>">
			<input type="text" name="stud_name" placeholder="enter your name" class="form-control" id="stud_name" value="<?php echo $stud_name?>">
			<input type="stud_email" name="stud_email" placeholder="enter your mailid" class="form-control" id="stud_email" value="<?php echo $stud_email?>">
			<textarea name="stud_address" placeholder="enter student address" class="form_control" id="stud_address"><?php echo $stud_address?></textarea>
			<input type="date" name="stud_date" placeholder="enter your birthdate" class="form-control" id="stud_date" value="<?php echo $stud_DOB?>">
			<input type="text" name="stud_phoneno" placeholder="enter your phoneno" class="form-control" id="stud_phoneno" value="<?php echo $stud_phno?>">
			
			<input type="button" name="submit" value="update" class="btn btn-info" id="btn">
		</form>
	</div>
	<script type="text/javascript">
		$(function(){
			$('#btn').click(function(){
				var id=$('#id').val();
				var stud_name=$('#stud_name').val();
				var stud_email=$('#stud_email').val();
				var stud_address=$('#stud_address').val();
				var stud_DOB=$('#stud_DOB').val();
				var stud_phno=$('#stud_phno').val();

				$.ajax({
					url:"studentupdate.php",
					type:'post',
					data:{
						id:id,
						stud_name:stud_name,
						stud_email:stud_email,
						stud_address:stud_address,
						stud_DOB:stud_DOB,
						stud_phno:stud_phno,
					},
					success:function(res){
						console.log(res)
						display()
					},
					error:function(res){
						console.log(res)
					}
				})
			})
		})
	</script>
	<table class="table" id="table">
		<tr>
			<th>Sl.no</th>
			<th>student name</th>
			<th>student email</th>
			<th>student address</th>
			<th>student DOB</th>
			<th>student phno</th>
		</tr>
	</table>
	<!-- <div id="div1"></div> -->
	<script type="text/javascript">
		function dele(id){
			$.ajax({
				url:'delete.php',
				type:'get',
				data:{
					id:id
				},
				success:function(res){
					alert(res);
					display();
				},
				error:function(res){

				}
			})
		}
		function display(){
			$.ajax({
				url:'view.php',
				type:'get',
				data:{

				},
				success:function(res){
					console.log(res)
					var obj = JSON.parse(res);
					console.log(obj)
					var table_content=''
					$('#table').find('tr:not(:first)').remove();
					$.each(obj,function(index,value){
						table_content+="<tr>";
						table_content+="<td>"+value.id+"</td>";
						table_content+="<td>"+value.stud_name+"</td>";
						table_content+="<td>"+value.stud_email+"</td>";
						table_content+="<td>"+value.stud_address+"</td>";
						table_content+="<td>"+value.stud_DOB+"</td>";
						table_content+="<td>"+value.stud_phno+"</td>";
						table_content+="<td><a class='btn btn-primary' href='edit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>delete</button><button class='btn btn-info' onclick='studentView("+value.id+")'>view</button></td>";
						table_content+="</tr>";
					});
			$("#table").append(table_content);
			// $.each(obj,function(index,value){
			// 	table_content+="<div style='border:2px solid gray;padding:20px;box-shadow: 0px 0px 5px 5px #fff;margin:10px'><h2>NAme: "+value.stud_name+"</h2><p>Address: "+value.stud_address+"</p><p>DOB: "+value.stud_DOB+"</p><p>Phone Number: "+value.stud_phno+"</p></div>"
			// })
			// $("#div1").append(table_content);
				},
				error:function(res){

				}
			})
		}
		display()
	</script>

</body>
</html>

