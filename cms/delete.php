<?php
include "../db/dbconfic.php";

if($_GET["action"]=='degree'){

	$id=$_POST['id'];
	$query="Delete from `degree` where id=$id";
	$spl=mysqli_query($con,$query);
	if($spl){
		echo "delete";
	}else{
		echo "not delete";
	}
	
}


if($_GET["action"]=='school'){

	$id=$_POST['id'];
	$query="Delete from `school` where id=$id";
	$spl=mysqli_query($con,$query);
	if($spl){
		echo "delete";
	}else{
		echo "not delete";
	}
	
}


if($_GET["action"]=='department'){

	$id=$_POST['id'];
	$query="Delete from `department` where dep_id=$id";

	$spl=mysqli_query($con,$query);
	if($spl){
		echo "delete";
	}else{
		echo "not delete";
	}
	
}

if($_GET["action"]=='intake'){

	$id=$_POST['id'];
	$query="Delete from `depintake` where in_id=$id";

	$spl=mysqli_query($con,$query);
	if($spl){
		echo "delete";
	}else{
		echo "not delete";
	}
	
}

if($_GET["action"]=='personals'){

	$id=$_POST['id'];
	$query="Delete from `personal` where `stu_id`=$id";

	$spl=mysqli_query($con,$query);
	if($spl){
		echo "delete";
	}else{
		echo "not delete";
	}
	
}


?>