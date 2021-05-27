<?php
session_start();
include "./db/dbconfic.php";

$get=mysqli_query($con,"SELECT * FROM `school`");
$gets=mysqli_query($con,"SELECT * FROM `degree`");
$intake=mysqli_query($con,"SELECT * FROM `depintake` as di left join `degree` as de on di.degree=de.id left join `school` as sc on di.schoolname=sc.id left join `department` as dp on di.department=dp.dep_id ");

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
      <form action="" method="post">
      <div class="row">
        <input type="hidden" class="form-control" name="rpid" id="rpid">
              <div class="col-sm-3">
                        <label for="inputName">Degree Name</label>
                        <select id="deg" class="form-control" data-theme="a" data-mini="true" name="degname">
                          <option value="">Select</option>
                        <?php
while($row=mysqli_fetch_assoc($gets)){
    ?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['fullname'];?></option>
                         <?php
                  }?>
                        
                   </select>
                         <label id="lbldegname" style="color: red"></label> 
                    </div>

                    <div class="col-sm-3">
                        <label for="inputName">School Name</label>
                        <select onchange="getDep(this.value)" id="scl" class="form-control" data-theme="a" data-mini="true" name="sclname">
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
                        <select  class="form-control" name="branch" id="branch"/>
                          <option value="">Select</option>
                        
                        </select>
                         <label id="lbldegShName" style="color: red"></label> 
                    </div>
       
        <button type="button" class="btn btn-primary" id="search" style="height: 40px;margin-top: 30px">Search</button>

      </div>
     </form>
    </div>

    <div class="card-body">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
           
    <tr>
            <tr>
                <th>S.No</th>
                <th>DegreeName</th>
                <th>SchoolName</th>
                <th>DepartmentName</th>
                <th>Intake</th>
             
            </tr>
        </thead>
        <tbody>


   
        </tbody>
        <tfoot>
            <tr>
                 <th>S.No</th>
                <th>DegreeName</th>
                <th>SchoolName</th>
                <th>DepartmentName</th>
                <th>Intake</th>
                
            </tr>
        </tfoot>
    </table>
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
  function getDep(id)
    {
        $.ajax({
            url: './cms/process.php?action=getDep',
            type:'post',
            data:{id:id},
            success: function(data) {
                $("#branch").html(data)
            }
        });
    }
  $(document).ready(function() {
    $('#example').DataTable();
    $(document).on('click','#search',function() {
      
     var id=$('#rpid').val();
     var dgname=$('#deg').val();
     var sclname=$('#scl').val();
     var dpname=$('#branch').val();

     if(dgname!="" && sclname!="" && dpname!=""){
     
        $.ajax({
            url:"./cms/search.php?action=searchs",
            type:"POST",
            data:{
                id:id,
                dgname:dgname,
                sclname:sclname,
                dpname:dpname,
            },
            success: function(dataResult){
              $("#example").dataTable().fnDestroy();
              $("#example> tbody").html("");
              $("#example> tbody").append(dataResult);
              $('#example').DataTable({dom: 'Bfrtip'});

       }
 
     })
  
  }
 })
  })



</script>

</html>




