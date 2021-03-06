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
    <title>Announcement | E-Learning</title>
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
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="studentlist.php">Student list</a>
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
              <a class="dropdown-item" href="#">Announcement list</a>
            </div>
          </div>
          <br>
            <a  align="center" class="btn btn-outline-danger btn-block" href="../script/logout.php">Logout</a>
        </div>
      </div>
    </div>
    <div id="main">
      <div class="container">
        <br>
      <h2 class="text-center" style="color:white;">List of Announcement posted:</h2>
      <div class="form-row">
      <div class="col">  
        <a class="btn btn-success btn-md" href="addannouncementpage.php">
        <i class="fas fa-plus"></i> Add New Announcement</a><br><br>    
      </div>
      </div>
      <table id="listTable" class="table table-hover table-dark" overflow: auto;>
        <thead>
          <tr align="center">
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Year Level</th>
            <th scope="col">Date Posted</th>
            <th scope="col">Posted By</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
          $res = $con->query("SELECT * FROM `tbl_announcement`");
          while ($row = mysqli_fetch_assoc($res)){
        ?>
            <div style="overflow:auto;">
              <tbody >
                <tr align="center">
                  <td><?php echo $row['subject']; ?></td>
                  <td><?php echo $row['info']; ?></td>
                  <td><?php echo $row['level']; ?></td>
                  <td><?php echo $row['dateposted']; ?></td>
                  <td><?php echo $row['postedby']; ?></td>
                  <td>
                    <a class="btn btn-danger btn-sm btn-block" onclick="return confirm('Are you sure you want to delete?');" href="../script/deleteannouncement.php?id=<?php echo $row ['ID']; ?>">Remove</a>
                  </td>
                </tr>
              </tbody>
            </div>
        <?php
          }
        ?>
      </table>
      </div>
    </div>
  <script src="../js/annscript.js"></script>
  <!--SLIDE NAV-->
  <script src="../js/slide.js"></script>
  <!--FONT AAWESOME-->
  <script src="../js/all.js"></script>
  <!--BOOTSTRAP-->
  <script src="../js/jquery.slim.min.js"></script>
  <script src="../js/bootstrap.bundle.js"></script>


  </body>
</html>
