<?php
session_start();
require 'db_connect.php';

if(isset($_POST['delete_student']))
{
    $id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM grade WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Record Deleted Successfully";
        header("Location:index.php?page=grade_list");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Record Not Deleted";
        header("Location:index.php?page=grade_list");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_grade']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $quarter = mysqli_real_escape_string($con, $_POST['quarter']);
    $subject_id = mysqli_real_escape_string($con, $_POST['subject_id']);
	$it1 = mysqli_real_escape_string($con, $_POST['it1']);
	$it2 = mysqli_real_escape_string($con, $_POST['it2']);
	$it3 = mysqli_real_escape_string($con, $_POST['it3']);
	$it4 = mysqli_real_escape_string($con, $_POST['it4']);
	$it5 = mysqli_real_escape_string($con, $_POST['it5']);
	$thps = mysqli_real_escape_string($con, $_POST['thps']);
	$trs = mysqli_real_escape_string($con, $_POST['trs']);
	
    $query = "INSERT INTO grade (student_id,category,quarter,subject_id,it1,it2,it3,it4,it5,thps,trs) VALUES ('$student_id','$category','$quarter','$subject_id','$it1','$it2','$it3','$it4','$it5','$thps','$trs')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Record Saved Successfully";
        header("Location:index.php?page=grade_list");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location:index.php?page=grade_list");
        exit(0);
    }
}

?>
