<?php

  include("conn.php");
  $subject = $_POST['subject'];
  $info = $_POST['info'];
  $level = $_POST['level'];
  $user = $_POST['postedby'];

  $timestamp = date('Y/m/d');  

  $con->query("INSERT INTO `tbl_announcement` (`subject`, `info`, `level`, `dateposted`, `postedby`) VALUES ('$subject', '$info', '$level', '$timestamp', '$user')");

  echo "<script>alert('Announcement successfully posted!');</script>";

  echo "<script type='text/javascript'>window.location.href = '../mainteacher/announcementlist.php'</script>";

?>