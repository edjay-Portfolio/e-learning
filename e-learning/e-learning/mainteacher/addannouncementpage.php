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
              <a class="dropdown-item" href="announcementlist.php">Announcement List</a>
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
          <div class="col-sm">
            <div class="text-center">
              <img src="../pictures/content/bannerict.jpg" class="rounded" alt="Banner" width="100%" height="100%">
            </div>
          </div>
          <div class="col-sm">
            <div class="card">
              <div class="card-header" align="center">
                <i class="fas fa-plus"></i>
                 Add announcement form
              </div>
              <div class="card-body">
                <form method="POST" autocomplete="off" action="../script/addannouncement.php">
                  <div class="form-group">
                    <label for="chapterId">Subject</label>
                    <input id="chapterId" class="form-control" type="text" name="subject" id="subject" placeholder="Title here.." required>
                  </div>
                  <div class="form-group">
                    <label for="chapterId">Message</label>
                    <textarea class="form-control" type="text" name="info" id="info" placeholder="Announcement here.." rows="5" required></textarea>
                  </div>
                  <div class="form-group">
                    <select class="custom-select" name="level" required>
                      <option selected>Select student year level</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="chapterId">Posted by</label>
                    <input id="chapterId" class="form-control" type="text" name="postedby" id="postedby" readonly value="<?php echo $row['fname'].' '.$row['sname']; ?>">
                  </div>
                  <div id="msg"></div>
                  <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit" name="submit" value="Add" id="post">
                  </div>
                </form>
                  <button class="btn btn-danger btn-block">
                    <a href="announcementlist.php" style="text-decoration: none; color: white;">Back</a>
                  </button>
              </div>
            </div>
          </div>
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
