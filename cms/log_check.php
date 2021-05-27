<?php
session_start();
include '../db/dbconfic.php';
if(isset($_REQUEST["submit"])){
$login_user=$_REQUEST["username"];
$login_pass=$_REQUEST["sname"];
$select=mysqli_query($con,"SELECT * FROM `login` WHERE `username`='$login_user' AND `password`='$login_pass'");
 $row=mysqli_fetch_array($select);
if(mysqli_num_rows($select)>0){ 
	
	$_SESSION['user_id']=$row['id'];
	 $_SESSION['username']=$row['username'];
	header("Location:../index.php");
}else{
	echo ("<script>
alert('Username or password error');
location.href='../login.php';
</script>");
}
}
?>