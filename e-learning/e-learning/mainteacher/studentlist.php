<?php
  require_once("../script/dbcontroller.php");
  include("../script/conn.php");
  session_start();
  $db_handle = new DBController();
  if(!isset($_SESSION['teacher'])){
    header('location:../index.php');
  }else {
    $uname = $_SESSION['teacher'];
    $res = $con->query("SELECT * FROM `tbl_user` WHERE `uname` = '$uname'");
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
    <!--USER DEFINED CSS-->
    <link rel="stylesheet" href="../css/background.css">
    <title>Student | E-Learning</title>
    <link rel="icon" type="image/gif/png" href="../pictures/content/title.png">

  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-navbar-dark bg-dark">
      <img src="../pictures/content/sideIcon.png" alt="Side nav" class="navbar-brand" onclick="openNav()" width="40" height="50">

    </nav>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="text-decoration: none; color: red;">&times;</a>
      <div class="container">
        <div class="col-sm">
          <h2 align="center" style="color:white;">Welcome, Teacher <?php echo $row['fname']; ?>!</h2>
          <img height="" width="40%" class="mx-auto d-block" src="../uploads/profile/<?php echo $row['picture']; ?>" style="border-radius:50%;">
          <br>
          <!--DASHBOARD-->
          <a class="btn btn-outline-light btn-block" href="home.php">Home</a>
          <br>
          <br>
          <!--ACCOUNTS-->
          <div class="btn-grp">
            <button class="btn btn-outline-info btn-md dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Account
            </button>
            <div class="dropdown-menu btn-block" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="#">Student list</a>
              <a class="dropdown-item" href="lecturelist.php">Lecture list</a>
              <a class="dropdown-item" href="quizlist.php">Quiz list</a>
              <a class="dropdown-item" href="subjectlist.php">Subject list</a>
            </div>
          </div>
          <br>
          <!--ANNOUNCEMENT-->
          <div class="btn-grp">
            <button class="btn btn-outline-info btn-md dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Announcement
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="announcementlist.php">Announcement list</a>
            </div>
          </div>
          <br>
            <a  align="center" class="btn btn-outline-danger btn-block" href="../script/logout.php">Logout</a>
        </div>
      </div>
    </div>
    <div id="main">
      <div class="container">
        <div class="row">
          <form action="../script/deletetable.php" method="post">
            <div class="form-row">
              <div class="form-group col-6">
                <input id="searchText" class="form-control" type="text" name="searchtext" placeholder="Search A.Y..." onkeyup="searchQuery()">
              </div>
              <div class="form-group col-4">
                <p align="right"><input id="deleteButton" style="display:none;" class="btn btn-outline-danger" type="submit" name="submit" value="Delete Data"></p>
              </div>
            </div>
          </form>
          <table id="listTable" class="table table-hover table-dark">
            <thead>
              <tr align="center">
                <th scope="col">Year Level</th>
                <th scope="col">Section</th>
                <th scope="col">Academic year</th>
                <th scope="col">Surname</th>
                <th scope="col">First name</th>
                <th scope="col">Middle name</th>
                <th scope="col">Gender</th>
              </tr>
            </thead>
            <?php
              $res = $con->query("SELECT * FROM `tbl_student`");
              while ($row = mysqli_fetch_assoc($res)){
            ?>
                <div style="overflow:scroll;">
                  <tbody>
                    <tr align="center">
                      <td><?php echo $row['level']; ?></td>
                      <td><?php echo $row['section']; ?></td>
                      <td><?php echo $row['syear']; ?></td>
                      <td><?php echo $row['sname']; ?></td>
                      <td><?php echo $row['fname']; ?></td>
                      <td><?php echo $row['mname']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                    </tr>
                  </tbody>
                </div>
            <?php
              }
            ?>
          </table>
        </div>
      </div>
    </div>
  <!--MADE SCRIPT-->
  <script src="../js/myscript.js"></script>

  <!--SLIDE NAV-->
  <script src="../js/slide.js"></script>
  <!--FONT AAWESOME-->
  <script src="../js/all.js"></script>
  <!--BOOTSTRAP-->
  <script src="../js/jquery.slim.min.js"></script>
  <script src="../js/bootstrap.bundle.js"></script>


  </body>
</html>
