<?php
session_start();
include '../db/dbconfic.php';
	if($_REQUEST["action"]=='getDep'){
		$id=$_POST['id'];
		$get_dep=mysqli_query($con,"SELECT * FROM department where school=$id");
		echo '<option value="">Select</option>';

while($row=mysqli_fetch_assoc($get_dep)){
  echo  '<option value='.$row['dep_id'].'>'.$row['departmentname'].'</option>';
}
                         
	}

	if($_REQUEST["action"]=='getIntake'){

		$id=$_POST['id'];

		$get_intake=mysqli_query($con,"SELECT * FROM depintake where department=$id");
		$row=mysqli_fetch_assoc($get_intake);
		$dep_intake=$row['intake'];

		$get_intakes=mysqli_query($con,"SELECT * FROM personal where departments=$id");
		$rows=mysqli_num_rows($get_intakes);

		echo $dep_intake-$rows;

		
}
	?>