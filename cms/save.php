<?php
session_start();
include '../db/dbconfic.php';
	if($_REQUEST["action"]=='degree'){
	$id=$_POST['id'];
	$degname=$_POST['degname'];
	$sdegname=$_POST['sdegname'];
	$type=$_POST['type'];
	$status=$_POST['status'];

	if(!empty($id)){
     $sql="UPDATE `degree` SET `fullname`='$degname',`shortname`='$sdegname',`degree`='$type',`status`='$status' WHERE `id`=$id";
	}else{
	$sql = "INSERT INTO `degree`(`fullname`,`shortname`,`degree`,`status`) VALUES('$degname','$sdegname','$type','$status')";
}
	if(mysqli_query($con, $sql)){
		echo "successfully";

	} 
	else {
		echo "not insert";
	}
	

}


if($_REQUEST["action"]=='school'){
	$id=$_POST['id'];
	$schoolname=$_POST['schoolname'];
	$shortname=$_POST['shortname'];
	$status=$_POST['status'];
	if(!empty($id)){
     $sql="UPDATE `school` SET `schoolname`='$schoolname',`shortname`='$shortname',`status`='$status' WHERE `id`=$id";
	}else{
	$sql = "INSERT INTO `school`(`schoolname`, `shortname`, `status`) VALUES('$schoolname','$shortname','$status')";
}
	if(mysqli_query($con, $sql)){
		echo "successfully";

	} 
	else {
		echo "not insert";
	}
	

}

if($_REQUEST["action"]=='department'){
	$id=$_POST['id'];
	$school=$_POST['school'];
	$degree=$_POST['degree'];
	$dname=$_POST['dname'];
	$dsname=$_POST['dsname'];
	$status=$_POST['status'];
	if(!empty($id)){
     $sql="UPDATE `department` SET `school`='$school',`degree`='$degree',`departmentname`='$dname' ,`dshortname`='$dsname',`status`='$status' WHERE `dep_id`=$id";
	}else{
	$sql = "INSERT INTO `department`(`school`,`degree`,`departmentname`,`dshortname`, `status`) VALUES('$school','$degree','$dname','$dsname','$status')";
}
	if(mysqli_query($con, $sql)){
		echo "successfully";

	} 
	else {
		echo "not insert";
	}
	

}

	if($_REQUEST["action"]=='intake'){
	$id=$_POST['id'];
	$degree=$_POST['degree'];
	$school=$_POST['school'];
	$branch=$_POST['branch'];
	$intake=$_POST['intake'];
	$status=$_POST['status'];

	if(!empty($id)){
     $sql="UPDATE `depintake` SET `degree`='$degree',`schoolname`='$school',`department`='$branch',`intake`='$intake',`status`='$status' WHERE `in_id`=$id";  
	}else{
	$sql = "INSERT INTO `depintake`(`degree`,`schoolname`,`department`,`intake`,`status`) VALUES('$degree','$school','$branch','$intake','$status')";
}

	if(mysqli_query($con, $sql)){

		echo "successfully";

	} 
	else {
		echo "not insert";
	}
	

}



if($_REQUEST["action"]=='personals'){
	$id=$_POST['stuid'];
	$degree=$_POST['dgname'];
	$school=$_POST['schoolname'];
	$branch=$_POST['branch'];
	$intake=$_POST['intake'];
	$student=$_POST['stname'];
	$father=$_POST['fname'];
	$mother=$_POST['mname'];
	$dob=$_POST['bd'];
	$mobile=$_POST['mno'];
	$aadhar=$_POST['aano'];
	$city=$_POST['cname'];
	$state=$_POST['sname'];
	$address=$_POST['adno'];
	$national=$_POST['natname'];
	$hostel=$_POST['hostel'];
	$blood=$_POST['blood'];
	

	if(!empty($id)){
     $sql="UPDATE `personal` SET `degrees`='$degree',`schools`='$school',`departments`='$branch',`intakes`='$intake',`student_name`='$student',`father_name`='$father',`mother_name`='$mother',`dob`='$dob',`mobile_num`='$mobile',`aadhar_no`='$aadhar',`city`='$city',`state`='$state',`address`='$address',`national`='$national',`hostel`='$hostel',`blood`='$blood' WHERE `stu_id`=$id";  
   
	}else{
	$sql = "INSERT INTO `personal`(`degrees`, `schools`, `departments`, `intakes`, `student_name`, `father_name`, `mother_name`, `dob`, `mobile_num`, `aadhar_no`, `city`, `state`, `address`, `national`, `hostel`, `blood`) VALUES ('$degree','$school','$branch','$intake','$student','$father','$mother','$dob','$mobile','$aadhar','$city','$state','$address','$national','$hostel','$blood')";

	
}

	if(mysqli_query($con, $sql)){

		echo "successfully";

	} 
	else {
		echo "not insert";
	}
	

}

?>

