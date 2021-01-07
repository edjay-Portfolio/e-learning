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
</html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="../css/all.css">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/background.css">
    <title></title>

  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-navbar-dark bg-dark">
      <img src="../pictures/content/sideIcon.png" alt="Side nav" class="navbar-brand" onclick="openNav()" width="40" height="50">
    </nav>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="container">
        <div class="col-sm">
          <h2 align="center" style="color:white;">Welcome, <?php echo $row['fname']; ?>!</h2>
          <br>
          <!--DASHBOARD-->
          <a class="btn btn-outline-light btn-block" href="homestudent-.php">Home</a>
          <br><br>
          <div class="btn-grp">
            <button class="btn btn-outline-info btn-lg dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Subject
            </button>
            <div class="dropdown-menu btn-block" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="viewlecturepage-.php">View lectures</a>
              <a class="dropdown-item" href="viewquizpage-.php">View quiz</a>
              <a class="dropdown-item" href="#">View subjects</a>
            </div>
          </div>
          <br>
            <a  align="center" class="btn btn-outline-danger btn-block" href="../script/logout.php">Logout</a>
        </div>
      </div>
    </div>
    <div id="main">
      <h2 class="text-center" style="color:white;">List of Subjects:</h2>
      <table id="listTable" class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">Subject Code</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Subject Info</th>
          </tr>
        </thead>
        <?php
          $res = $con->query("SELECT * FROM `tbl_subject`");
          while ($row = mysqli_fetch_assoc($res)){
        ?>
            <div style="overflow:scroll;">
              <tbody>
                <tr>
                  <td><?php echo $row['scode']; ?></td>
                  <td><?php echo $row['sname']; ?></td>
                  <td><?php echo $row['sinfo']; ?></td>
                </tr>
              </tbody>
            </div>
        <?php
          }
        ?>
      </table>
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
