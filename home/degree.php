<?php
session_start();
include "./db/dbconfic.php";
$get_users=mysqli_query($con,"SELECT * FROM `degree`");


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
                <th>fullname</th>
                <th>shortname</th>
                <th>degree</th>
                <th>status</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>


            <?php
while($row=mysqli_fetch_assoc($get_users)){
    ?>
            <tr>
                  <td><?php echo $row['id'];?></td>
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['shortname'];?></td>
                 <td><?php echo $row['degree'];?></td>
                <td><?php echo $row['status'];?></td>
                <td>
                 <a class="edit open-AddBookDialog" id="<?php echo $row['id']?>">edit</a>
                </td>
                <td>
                <a class="delete" id="<?php echo $row['id']?>">delete</a>
                </td>
                
               
            </tr>
            
       <?php
}?>
        </tbody>
        <tfoot>
            <tr>
                 <th>id</th>
                <th>fullname</th>
                <th>shortname</th>
                <th>degree</th>
                <th>status</th>
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
     var degname=$('#degname').val();
     var sdegname=$('#sdegname').val();
     var type=$('input[name=type]:checked').val()
     var status=$('input[name=status]:checked').val()
     if(degname!="" && sdegname!="" && type!="" && status!=""){
        $.ajax({
            url:"./cms/save.php?action=degree",
            type:"POST",
            data:{
                id:id,
                degname:degname,
                sdegname:sdegname,
                type:type,
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
            url:"./cms/edit.php?action=degree",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            var res=JSON.parse(response)
            $("#degid").val(res.id)
             $("#degname").val(res.fullname)
              $("#sdegname").val(res.shortname)
            $("input[name=type][value='"+res.degree+"']").prop('checked', true);
             $("input[name=status][value='"+res.status+"']").prop('checked', true);
                
          }
     })
    })

$('.delete').on('click', function() {

        var id=$(this).attr('id')
        $.ajax({
            url:"./cms/delete.php?action=degree",
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
                        <input type="text"  class="form-control" name="degname" id="degname" placeholder="Enter School name" >
                         <label id="lbldegname" style="color: red"></label> 
                    </div>

                    <div class="form-group">
                        <label for="inputName">Short Name</label>
                        <input type="text" class="form-control" name="sdegname" id="sdegname" placeholder="Enter Short name">
                         <label id="lbldegShName" style="color: red"></label> 
                    </div>
                        <div class="form-group">Type
                       <input type="radio" name="type" id="type" value="UG">UG
                       <input type="radio" name="type" id="type1" value="PG">PG
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



