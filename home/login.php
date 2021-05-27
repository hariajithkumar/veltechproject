<?php
session_start();
 if(isset($_SESSION["user_id"])) {
    header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Veltech Admission</title>
  </head><html>
<head>
<title>Vel Tech Application Report</title>
    <link href="./dist/css/login.css" rel="stylesheet">
</head>
    <body>
        <div class="loginbox">
            <img src="./image/logoveltech.jfif" class="avatar">
            <h1>Admission Enquiry</h1>
            <form method="POST" action="./cms/log_check.php" autocomplete="off">
            <p>UserName</p>
            <input type="text" name="username" placeholder="enter user name" autocomplete="on">
            <p>Password</p>
            <input type="password" name="sname" placeholder="enter password" autocomplete="on">
            <input type="submit" value="Login" name="submit" /> 
           
            </form>
        </div>
    </body>
</html>