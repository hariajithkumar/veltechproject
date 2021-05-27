<?php
session_start();
include "./db/dbconfic.php";
$get_user=mysqli_query($con,"SELECT * FROM department as dep left join school as sch on dep.school=sch.id left join degree as deg on dep.degree=deg.id ");

$get=mysqli_query($con,"SELECT * FROM `school`");
$gets=mysqli_query($con,"SELECT * FROM `degree`");
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
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
           
    <tr>
            <tr>
                <th>id</th>
                <th>Schoolname</th>
                <th>Degree</th>
                <th>Department</th>
                <th>Shortdepartment</th>
                <th>Status</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
while($row=mysqli_fetch_assoc($get_user)){

    ?>
            <tr>
                <td><?php echo $row['dep_id'];?></td>
                <td><?php echo $row['schoolname'];?></td>
                <td><?php echo $row['shortname'];?></td>
                 <td><?php echo $row['departmentname'];?></td>
                 <td><?php echo $row['dshortname'];?></td>
                <td><?php echo $row['status'];?></td>
                <td>
                 <a class="edit open-AddBookDialog" id="<?php echo $row['dep_id']?>">edit</a>
                </td>
                <td>
                <a class="delete" id="<?php echo $row['dep_id']?>">delete</a>
                </td>
               
            </tr>
            
       <?php
}?>
        </tbody>
        <tfoot>
            <tr>
                 <th>id</th>
                <th>Schoolname</th>
                <th>Degree</th>
                <th>Department</th>
                <th>Shortdepartment</th>
                <th>Status</th>
                <th>edit</th>
                <th>delete</th>
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
  $(document).ready(function() {
    $('#example').DataTable();


 $(".open-AddBookDialog").click(function(){

     $("#saveDegForm").trigger('reset');
     $("#modalForm").modal("show");
     $(".submitBtn").html("Save");
});

 $('#clk').on('click',function() {
     var id=$('#degid').val();
     var school=$('#school').val();
     var degree=$('#degname').val();
     var dname=$('#dname').val();
     var dsname=$('#dsname').val();
     var status=$('input[name=status]:checked').val()
     if(school!="" && degree!="" && dname!="" && dsname!="" && status!=""){
        $.ajax({
            url:"./cms/save.php?action=department",
            type:"POST",
            data:{
                id:id,
                school:school,
                degree:degree,
                dname:dname,
                dsname:dsname,
                status:status,
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
            url:"./cms/edit.php?action=department",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            var res=JSON.parse(response)
            $("#degid").val(res.dep_id)
             $("#school").val(res.school)
             $("#degname").val(res.degree)
              $("#dname").val(res.departmentname)
              $("#dsname").val(res.dshortname)
             $("input[name=status][value='"+res.status+"']").prop('checked', true);
          }
     })
    })

$('.delete').on('click', function() {

        var id=$(this).attr('id')
        $.ajax({
            url:"./cms/delete.php?action=department",
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Add Degree Details</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">×</span>

                    <span class="sr-only">Close</span>
                </button>
              
            </div>
              
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="" method="post" id="saveDegForm">              
                     
                   <!--  <div class="form-group" id="showId">
                        <label for="inputName">Degree Id</label> -->
                        <input type="hidden" class="form-control" name="degid" id="degid">
                   <!--  </div> -->
  


                    
                    

                    <div class="form-group">
                        <label for="inputName">Degree Name</label>
                        <select id="degname" class="form-control" data-theme="a" data-mini="true" name="degname">
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

                    <div class="form-group">
                        <label for="inputName">School Name</label>
                        <select id="school" class="form-control" data-theme="a" data-mini="true" name="schoolname">
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
                    <div class="form-group">
                        <label for="inputName">Department Name</label>
                        <input type="text" class="form-control" name="dname" id="dname" placeholder="Enter Short name">
                         <label id="lbldegShName" style="color: red"></label> 
                    </div>
                    <div class="form-group">
                        <label for="inputName">Departmentshort Name</label>
                        <input type="text" class="form-control" name="dsname" id="dsname" placeholder="Enter Short name">
                         <label id="lbldegShName" style="color: red"></label> 
                    </div>
                       
                
                    <div class="form-group">
                       <input type="radio" name="status" id="status" value="Active">Active
                       <input type="radio" name="status" id="status1" value="Deactive">Deactive
                    </div>
               
            </form>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" name="save" value="Save" class="btn btn-primary submitBtn" id="clk">Save</button>
            </div>
            
        </div>
    </div>
</div>
