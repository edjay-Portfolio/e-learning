<?php
  require_once("../script/dbcontroller.php");
  include("../script/conn.php");
  session_start();
  $db_handle = new DBController();
  if(!isset($_SESSION['student'])){
    header('location:../index.php');
  }else {
    $uname = $_SESSION['student'];
    $res = $con->query("SELECT * FROM `tbl_student` WHERE `uname` = '$uname'");
    $row = mysqli_fetch_assoc($res);
  }
  if(!isset($_GET['file'])){
    header('location:../index.php');
  }else {
    $file = $_GET['file'];
    $res = $con->query
    ("SELECT * FROM `tbl_lecture` INNER JOIN `tbl_subject` ON tbl_lecture.scode = tbl_subject.scode WHERE tbl_lecture.file = '$file'");
    $row = mysqli_fetch_assoc($res);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="../css/all.css">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/background.css">
    <title>Lecture | E-Learning</title>
    <link rel="icon" type="image/gif/png" href="../pictures/content/title.png">

  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-navbar-dark bg-dark">
      <img src="../pictures/content/sideIcon.png" alt="Side nav" class="navbar-brand" onclick="openNav()" width="40" height="50">
      <a class="navbar-brand" href="#"><?php echo $file; ?></a>
    </nav>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="container">
        <div class="col-sm">
          <h2 align="center" style="color:white;">Welcome, <?php echo $row['fname']; ?>!</h2>
          <br>
          <!--DASHBOARD-->
          <a class="btn btn-outline-light btn-block" href="homestudent.php">Home</a>
          <br>
          <div class="btn-grp">
            <button class="btn btn-outline-info btn-md dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Subject
            </button>
            <div class="dropdown-menu btn-block" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="#">View lectures</a>
              <a class="dropdown-item" href="viewquizpage.php">View quiz</a>
            </div>
          </div>
          <br>
            <a  align="center" class="btn btn-outline-danger btn-block" href="../script/logout.php">Logout</a>
        </div>
      </div>
    </div>
    <div id="main">
      <a class="btn btn-info btn-md" href="viewlecturepage.php">
      <i class="fas fa-arrow-left"></i> Back</a><br><br>
      <div class="card" style="height:500px;">
        <div class="card-header" align="center">
          <b><?php echo $row['sname'].': '. $row['chapter']; ?></b>
        </div>
        <div class="card-body">
          <embed type="application/pdf" src="../uploads/lectures/<?php echo $file; ?>" width="100%" height="100%">
        </div>
      </div>
    </div>

  <!--SLIDE NAV-->
  <script src="../js/slide.js"></script>
  <!--FONT AAWESOME-->
  <script src="../js/all.js"></script>
  <!--BOOTSTRAP-->
  <script src="../js/jquery.slim.min.js"></script>
  <script src="../js/bootstrap.bundle.js"></script>
  </body>
</html>
