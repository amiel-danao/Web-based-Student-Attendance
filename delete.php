<?php
	$id=$_GET['id'];
	include('db_connect.php');
	mysqli_query($conn,"delete from `grade` where id='$id'");
	header('location:index.php?page=grade_list');
?>