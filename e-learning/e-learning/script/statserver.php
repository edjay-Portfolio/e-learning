<?php
  session_start();
  $stat = $_GET['stat'];
  if($stat == 1000){
    $_SESSION['stat'] = $stat;
    echo "<script type='text/javascript'>window.location.href = '../registerpagestudent.php';</script>";
  }elseif ($stat == 2000) {
    $_SESSION['stat'] = $stat;
    echo "<script type='text/javascript'>window.location.href = '../registerpageteacher.php';</script>";
  }
?>
