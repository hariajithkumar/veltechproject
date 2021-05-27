<?php 
session_start();
if(!isset($_SESSION["user_id"])) {
  header("location:./login.php");
}
include "./db/dbconfic.php";    
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
<?php
   include "./pages/main.php";
?>


<!-- footer,jquery -->
<?php
  include "./include/footer.php";
  include "./include/jquery.php";
?>
</div>

</body>
</html>
