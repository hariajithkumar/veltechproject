<?php
session_start();
include '../db/dbconfic.php';
	if($_REQUEST["action"]=='searchs'){
    $id=$_POST['id'];
	$degree=$_POST['dgname'];
	$school=$_POST['sclname'];
	$branch=$_POST['dpname'];
	$rpt="SELECT * FROM `depintake` as di left join `degree` as de on di.degree=de.id left join `school` as sc on di.schoolname=sc.id left join `department` as dp on di.department=dp.dep_id WHERE di.degree LIKE '%{$degree}%' and di.schoolname LIKE '%{$school}%' and di.department LIKE '%{$branch}%'";



	$report=mysqli_query($con,$rpt);
	if($report){
		while($row=mysqli_fetch_assoc($report)){
           echo "<tr>
                <td>".$row['in_id']."</td>
                <td>".$row['fullname']."</td>
                <td>".$row['schoolname']."</td>
                <td>".$row['departmentname']."</td>
                <td>".$row['intake']."</td>
                </tr>";
   
}
	}else{
		echo "false";
	}
}



?>