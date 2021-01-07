<?php
  session_start();
  include('conn.php');
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $tres = $con->query("SELECT * FROM `tbl_user` WHERE `uname` = '$user' AND `pass` = '$pass' ");
  $trow = mysqli_num_rows($tres);

  //Grade 11
  $sres = $con1->query("SELECT * FROM `tbl_student` WHERE `uname` = '$user' AND `pass` = '$pass' AND `level` = 11");
  $srow = mysqli_num_rows($sres);

  //Grade 12
  $sres1 = $con1->query("SELECT * FROM `tbl_student` WHERE `uname` = '$user' AND `pass` = '$pass' AND `level` = 12");
  $srow1 = mysqli_num_rows($sres1);

  if($trow == '1'){
    $_SESSION['teacher'] = $user;
    echo "<script>
    alert('Successfully login!');
    window.location.href='../mainteacher/home.php';
    </script>";
  }
  else if($srow == '1'){
    $_SESSION['student'] = $user;
    echo "<script>
    alert('Successfully login!');
    window.location.href='../mainstudent/homestudent.php';
    </script>";
  }
  else if($srow1 == '1'){
    $_SESSION['student'] = $user;
    echo "<script>
    alert('Successfully login!');
    window.location.href='../mainstudent/homestudent-.php';
    </script>";
  }
  else{
    echo "<script>
    alert('No user found.');
    window.location.href='../;
    </script>";
  }
?>
