

<?php
session_start();
include "./db/dbconfic.php";
$get=mysqli_query($con,"SELECT * FROM `school`");
$gets=mysqli_query($con,"SELECT * FROM `degree`");
$intake=mysqli_query($con,"SELECT * FROM `depintake` as di left join `degree` as de on di.degree=de.id left join `school` as sc on di.schoolname=sc.id left join `department` as dp on di.department=dp.dep_id");
$personals=mysqli_query($con,"SELECT * FROM `personal` as per left join `degree` as de on per.degrees=de.id left join `school` as sc on per.schools=sc.id left join `department` as dp on per.departments=dp.dep_id");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- css -->
  <?php
  include "./include/bcss.php";
  ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

<!-- navbar -->
<?php
  include "./include/nav.php";
?>
  
<!-- aside -->
<?php
   include "./include/aside.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
    <div class="card-header" >
      <button type="button" class="btn btn-info btn-lg open-AddBookDialog" id="edit" data-toggle="modal" data-target="#myModal">ADD</button>
    </div>
    <div class="card-body">
<div class="table-responsive">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
           
    <tr>
            <tr>
                <th>id</th>
                <th>Degree</th>
                <th>Schoolname</th>
                <th>Department</th>
                <th>Intake</th>
                <th>Student</th>
                <th>FatherName</th>
                <th>MotherName</th>
                <th>Date Of Birth</th>
                <th>MobileNumber</th>
                <th>AadharNo</th>
                <th>City</th>
                <th>State</th>
                <th>Address</th>
                <th>National</th>
                <th>Hostel</th>
                <th>Blood</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>


           
            <?php
while($row=mysqli_fetch_assoc($personals)){
    ?>
            <tr>
                  <td><?php echo $row['stu_id'];?></td>
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['schoolname'];?></td>
                 <td><?php echo $row['departmentname'];?></td>
                <td><?php echo $row['intakes'];?></td>
                <td><?php echo $row['student_name'];?></td>
                <td><?php echo $row['father_name'];?></td>
                <td><?php echo $row['mother_name'];?></td>
                <td><?php echo $row['dob'];?></td>
                <td><?php echo $row['mobile_num'];?></td>
                <td><?php echo $row['aadhar_no'];?></td>
                <td><?php echo $row['city'];?></td>
                <td><?php echo $row['state'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['national'];?></td>
                <td><?php echo $row['hostel'];?></td>
                <td><?php echo $row['blood'];?></td>
                <td>
                 <a class="edit open-AddBookDialog" id="<?php echo $row['stu_id']?>">edit</a>
                </td>
                <td>
                <a class="delete" id="<?php echo $row['stu_id']?>">delete</a>
                </td>
                
               
            </tr>
            
       <?php
}?>
      
        </tbody>
        <tfoot>
            <tr>
                  <th>id</th>
                <th>Degree</th>
                <th>Schoolname</th>
                <th>Department</th>
                <th>Intake</th>
                <th>Student</th>
                <th>FatherName</th>
                <th>MotherName</th>
                <th>Date Of Birth</th>
                <th>MobileNumber</th>
                <th>AadharNo</th>
                <th>City</th>
                <th>State</th>
                <th>Address</th>
                <th>National</th>
                <th>Hostel</th>
                <th>Blood</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </tfoot>
    </table>
  </div>
    </div> 
    <div class="card-footer">Footer</div>
  </div>

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<!-- footer,jquery -->
<?php
  include "./include/footer.php";
  include "./include/jquery.php";
?>

</body>
<script type="text/javascript">
  function ageCalculator() {
    var userinput = document.getElementById("dob").value;
    var dob = new Date(userinput);
    if(userinput==null || userinput=='') {
      alert("false");  
      return false; 
    } else {
    
    //calculate month difference from current date in time
    var month_diff = Date.now() - dob.getTime();
    
    //convert the calculated difference in date format
    var age_dt = new Date(month_diff); 
    
    //extract year from date    
    var year = age_dt.getUTCFullYear();
    
    
    //now calculate the age of the user
    var age = Math.abs(year - 1970);
    
    //display the calculated age
      
            alert("Age is: " + age + " years. ");
    }
}
  function getDep(id)
    {
        $.ajax({
            url: './cms/process.php?action=getDep',
            type:'post',
            data:{id:id},
            success: function(data) {
                $("#branch").html(data);
            }
        });
    }

     function getIntake(id)
    {
        $.ajax({
            url: './cms/process.php?action=getIntake',
            type:'post',
            data:{id:id},
            success: function(data) {
              
                $("#intake").val(data);
            }
        });
    }
  $(document).ready(function() {
    $('#example').DataTable();


 $(".open-AddBookDialog").click(function(){

     $("#saveDegForm").trigger('reset');
     $("#modalForm").modal("show");
     $(".submitBtn").html("Save");
});

 $('#clk').on('click',function() {
     var id=$('#stuid').val();
     var dgname=$('#deg').val();
     var schoolname=$('#scl').val();
     var branch=$('#branch').val();
     var intake=$('#intake').val();
     var stname=$('#student').val();
     var fname=$('#father').val();
     var mname=$('#mother').val();
     var bd=$('#dob').val();
     var mno=$('#mobile').val();
     var aano=$('#aadhar').val();
     var cname=$('#city').val();
     var sname=$('#state').val();
     var adno=$('#address').val();
     var natname=$('#national').val();
     var hostel=$('#hostel').val();
     var blood=$('#blood').val();
     
     if(dgname!="" && schoolname!="" && branch!="" && intake!="" && stname!="" && fname!="" && mname!="" && bd!="" && mno!="" && aano!="" && cname!="" && sname!="" && adno!="" && natname!="" && hostel!="" && blood!=""){
        $.ajax({
            url:"./cms/save.php?action=personals",
            type:"POST",
            data:{
                stuid:id,
                dgname:dgname,
                schoolname:schoolname,
                branch:branch,
                intake:intake,
                stname:stname,
                fname:fname,
                mname:mname,
                bd:bd,
                mno:mno,
                aano:aano,
                cname:cname,
                sname:sname,
                adno:adno,
                natname:natname,
                hostel:hostel,
                blood:blood,
            },
          success: function(dataResult){
            console.log(dataResult);
                    alert(dataResult);
                   location.reload();

       }
 
     })
  
  }
 })


$('.edit').on('click', function() {
        var id=$(this).attr('id');
        $.ajax({
            url:"./cms/edit.php?action=personals",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            var res=JSON.parse(response)
            $("#stuid").val(res.stu_id)
             $("#deg").val(res.degrees)
              $("#scl").val(res.schools)
              $("#scl").trigger('change')
             loadDep(res.departments);
function loadDep(a) {
setTimeout(function(){ 
$('#branch').val(a); }, 50);
}
          
              $("#intake").val(res.intakes)
              $("#student").val(res.student_name)
              $("#father").val(res.father_name)
              $("#mother").val(res.mother_name)
              $("#dob").val(res.dob)
              $("#mobile").val(res.mobile_num)
              $("#aadhar").val(res.aadhar_no)
              $("#city").val(res.city)
              $("#state").val(res.state)
              $("#address").val(res.address)
              $("#national").val(res.national)
              $("#hostel").val(res.hostel)
              $("#blood").val(res.blood)
            // $("input[name=type][value='"+res.degree+"']").prop('checked', true);
            //  $("input[name=status][value='"+res.status+"']").prop('checked', true);
                
          }
     })
    })

$('.delete').on('click', function() {

        var id=$(this).attr('id')
        $.ajax({
            url:"./cms/delete.php?action=personals",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            alert(response)
            location.reload();
          }
     })
    })


});
</script>

</html>

<!-- Modal -->

  <div class="modal fade" id="modalForm" class="edit" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Add Degree Details</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">×</span>

                    <span class="sr-only">Close</span>
                </button>
              
            </div>
               <form action="" method="post" id="saveDegForm">    
          <div class="row">
             <input type="hidden" class="form-control" name="stuid" id="stuid">
            <div class="col-sm-3">
               <label for="inputName">Degree Name</label>
               <select id="deg" class="form-control" data-theme="a" data-mini="true" name="dgname">
                          <option value="">Select</option>
                        <?php
while($row=mysqli_fetch_assoc($gets)){
    ?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['fullname'];?></option>
                         <?php
                  }?>
                        
                   </select>
                     
            </div>

             <div class="col-sm-3">
                        <label for="inputName">School Name</label>
                        <select onchange="getDep(this.value)" id="scl" class="form-control" data-theme="a" data-mini="true" name="schoolname">
                          <option value="">Select</option>
                        <?php
while($row=mysqli_fetch_assoc($get)){
    ?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['schoolname'];?></option>
                         <?php
                  }?>
                        
                   </select>
                         <label id="lbldegname" style="color: red"></label> 
                    </div>
              <div class="col-sm-3">
                        <label for="inputName">Department Name</label>
                        <select onchange="getIntake(this.value)" class="form-control" name="branch" id="branch"/>
                        

                        </select>

                         <label id="lbldegShName" style="color: red"></label> 
                    </div>
            <div class="col-sm-3">
               <label for="inputName">Intake</label>
             
                      <input type="text" name="intake" id="intake" class="form-control"/>
                      
                
               
                   
            </div>
          </div>

            <div class="row">
            <div class="col-sm-3">
               <label for="inputName">Student Name</label>
               <input type="text" name="stname" id="student" placeholder="StudentName" class="form-control">      
            </div>

            <div class="col-sm-3">
              <label for="inputName">Father Name</label>
              <input type="text" name="fname" id="father" placeholder="fatherName" class="form-control">
            </div>
            <div class="col-sm-3">
              <label for="inputName">Mother Name</label>
              <input type="text" name="mname" id="mother" placeholder="MotherName" class="form-control">
            </div>
            <div class="col-sm-3">
              <label for="inputName">Date Of Birth</label><span><button type="button" onclick = "ageCalculator()"> Calculate age </button></span>
              <input type="date" name="bd" id="dob" placeholder="DOB" class="form-control">
            </div>
             
          </div>
           

           <div class="row">
            <div class="col-sm-3">
               <label for="inputName">Mobile Number</label>
               <input type="text" name="mno" id="mobile" placeholder="Mobilenumber" class="form-control">      
            </div>

            <div class="col-sm-3">
              <label for="inputName">Aadhar No</label>
              <input type="text" name="aano" id="aadhar" placeholder="AadharNo" class="form-control">
            </div>

            <div class="col-sm-3">
              <label for="inputName">City</label>
              <input type="text" name="cname" id="city" placeholder="City" class="form-control">
            </div>

            <div class="col-sm-3">
              <label for="inputName">State</label>
              <input type="text" name="sname" id="state" placeholder="State" class="form-control">
            </div>
             
          </div>

          <div class="row">
            <div class="col-sm-3">
               <label for="inputName">Address</label>
               <input type="text" name="adno" id="address" placeholder="Address" class="form-control">      
            </div>

            <div class="col-sm-3">
              <label for="inputName">Nationality</label>
              <input type="text" name="natname" id="national" placeholder="Nationality" class="form-control">
            </div>

            <div class="col-sm-3">
              <label for="inputName">Hosteller</label>
            <select class="form-control" name="hostel" id="hostel">
               <option value="">Select</option>
               <option value="YES">YES</option>
               <option value="NO">NO</option>
             </select>
            </div>
            
           <div class="col-sm-3">
              <label for="inputName">Blood Group</label>
            <select class="form-control" name="blood" id="blood">
            <option value="">Select</option>
            <option value="O+">O+</option>
            <option value="B+">B+</option>
            <option value="A+">A+</option>
            <option value="AB+">AB+</option>
            <option value="A-">A-</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="AB-">AB-</option>
            <option value="A1-">A1-</option>
            <option value="A1+">A1+</option>
                        </select>
            </div>
             
          </div>
</form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" name="save" value="Save" class="btn btn-primary submitBtn" id="clk">Save</button>
            </div>
            
        </div>
    </div>
</div>


