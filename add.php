<?php
session_start();
include 'db_connect.php'; 

	$student_id=$_POST['student_id'];
	$category=$_POST['category'];
	$quarter=$_POST['quarter'];
	$subject_id=$_POST['subject_id'];
	$it1=$_POST['it1'];
	$it2=$_POST['it2'];
	$it3=$_POST['it3'];
	$it4=$_POST['it4'];
	$it5=$_POST['it5'];
	$thps=$_POST['thps'];
	$trs=$_POST['trs'];
	
	mysqli_query($conn,"insert into `grade` (student_id,category,quarter,subject_id,it1,it2,it3,it4,it5,thps,trs) values ('$student_id','$category','$quarter','$subject_id','$it1','$it2','$it3','$it4','$it5','$thps','$trs')");
	$_SESSION['status'] = "<Record Saved!>";
	header('location:index.php?page=grade_list');
  
?>