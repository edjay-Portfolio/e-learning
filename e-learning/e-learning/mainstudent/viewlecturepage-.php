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
    <title>Lecture | E-Learning</title>
    <link rel="icon" type="image/gif/png" href="../pictures/content/title.png">

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
            <button class="btn btn-outline-info btn-md dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Subject
            </button>
            <div class="dropdown-menu btn-block" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="#">View lectures</a>
              <a class="dropdown-item" href="viewquizpage-.php">View quiz</a>
            </div>
          </div>
          <br>
            <a  align="center" class="btn btn-outline-danger btn-block" href="../script/logout.php">Logout</a>
        </div>
      </div>
    </div>
    <div id="main">
      <h2 class="text-center" style="color:white;">List of Lectures Uploaded:</h2>
      <table id="listTable" class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">Subject Code</th>
            <th scope="col">Chapter name</th>
            <th scope="col">Posted By</th>
            <th scope="col">Date Posted</th>
            <th scope="col">File Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
          $res = $con->query("SELECT * FROM `tbl_lecture` WHERE tbl_lecture.level = 12 ORDER BY `dateposted` ASC");
          while($path = mysqli_fetch_assoc($res)){
        ?>
            <div style="overflow:scroll;">
              <tbody>
                <tr>
                  <td><?php echo $path['scode']; ?></td>
                  <td><?php echo $path['chapter']; ?></td>
                  <td><?php echo $path['postedby']; ?></td>
                  <td><?php echo $path['dateposted']; ?></td>
                  <td><?php echo $path['file']; ?></td>
                  <td><a class="btn btn-info btn-sm btn-block" href="viewselectedlecture-.php?file=<?php echo $path['file']; ?>">View</a></td>
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
