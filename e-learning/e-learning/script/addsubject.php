<?php

  include("conn.php");
  $scode = $_POST['scode'];
  $sname = $_POST['sname'];
  $sinfo = $_POST['sinfo'];

  $con->query("INSERT INTO `tbl_subject` (`scode`, `sname`, `sinfo`) VALUES ('$scode', '$sname', '$sinfo')");
  echo "<script type='text/javascript'>alert('Subject successfully added!');</script>";
  echo "<script type='text/javascript'>window.location.href = '../mainteacher/subjectlist.php'</script>";

?>
