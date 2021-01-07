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
    <title>Home | E-Learning</title>
    <link rel="icon" type="image/gif/png" href="../pictures/content/title.png">

  </head>
  <body>

  <nav class="navbar navbar-navbar-dark bg-dark">
      <img src="../pictures/content/sideIcon.png" alt="Side nav" class="navbar-brand" onclick="openNav()" width="40" height="50">
  </nav>


    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="container">
        <div class="col-sm">
          <h2 align="center" style="color:white;">Welcome, <?php echo $row['fname']; ?>!</h2>
          <br>
          <!--DASHBOARD-->
          <a class="btn btn-outline-light btn-block" href="#">Home</a>
          <br><br>
          <div class="btn-grp">
            <button class="btn btn-outline-info btn-md dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Subject
            </button>
            <div class="dropdown-menu btn-block" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="viewlecturepage-.php">View lectures</a>
              <a class="dropdown-item" href="viewquizpage-.php">View quiz</a>
            </div>
          </div>
          <br>
            <a  align="center" class="btn btn-outline-danger btn-block" href="../script/logout.php">Logout</a>
        </div>
      </div>
    </div>
        <div id="main">
      <div class="container">
          <h2 class="text-center" style="color:white;">Announcement: </h2><br>
        <div class="row">
          <?php
            $product_array = $db_handle->runQuery("SELECT * FROM `tbl_announcement` WHERE `level`=12");
            if(!empty($product_array)){
              foreach($product_array as $key=>$value){?>
                <div class="col-3">
                  <div class="card">
                    <p align="center" class="card-header" style="font-family: sans-serif;"><i class="fa fa-bullhorn" aria-hidden="true"></i> <?php echo $product_array[$key]['subject'] ?></p>
                    <div class="card-body">
                      <p class="card-text" align="center" style="font-family: Palatino; font-size: 20px;"><?php echo $product_array[$key]['info']; ?></p>
                      <p class="card-text" align="left"><small>Date posted: <?php echo $product_array[$key]['dateposted']; ?></small></p>
                    </div>
                      <p class="card-footer" align="center"><small>Posted by: <b><?php echo $product_array[$key]['postedby']; ?></b></small></p>
                  </div>
                </div>
              <?php
              }
            }
          ?>
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
