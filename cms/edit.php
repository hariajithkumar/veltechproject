<?php
	include '../db/dbconfic.php';

if($_REQUEST["action"]=='degree'){
	$id=$_POST['id'];
	$query="Select * from `degree` where id=$id";
	$spl=mysqli_query($con,$query);
	$fetch=mysqli_fetch_assoc($spl);
	$num= mysqli_num_rows($spl);
	if($num==1){
		echo json_encode($fetch);
	}else{
		echo "not successfully";
	}
}

if($_REQUEST["action"]=='school'){
	$id=$_POST['id'];
	$query="Select * from `school` where id=$id";
	$spl=mysqli_query($con,$query);
	$fetch=mysqli_fetch_assoc($spl);
	$num= mysqli_num_rows($spl);
	if($num==1){
		echo json_encode($fetch);
	}else{
		echo "not successfully";
	}
}

if($_REQUEST["action"]=='department'){
	$id=$_POST['id'];
	$query="Select * from `department` where dep_id=$id";
	$spl=mysqli_query($con,$query);
	$fetch=mysqli_fetch_assoc($spl);
	$num= mysqli_num_rows($spl);
	if($num==1){
		echo json_encode($fetch);
	}else{
		echo "not successfully";
	}
}

if($_REQUEST["action"]=='intake'){
	$id=$_POST['id'];
	$query="Select * from `depintake` where in_id=$id";
	$spl=mysqli_query($con,$query);
	$fetch=mysqli_fetch_assoc($spl);
	$num= mysqli_num_rows($spl);
	if($num==1){
		echo json_encode($fetch);
	}else{
		echo "not successfully";
	}
}

if($_REQUEST["action"]=='personals'){
	$id=$_POST['id'];
	$query="Select * from `personal` where stu_id=$id";
	$spl=mysqli_query($con,$query);
	$fetch=mysqli_fetch_assoc($spl);
	$num= mysqli_num_rows($spl);
	if($num==1){
		echo json_encode($fetch);
	}else{
		echo "not successfully";
	}
}
?>
