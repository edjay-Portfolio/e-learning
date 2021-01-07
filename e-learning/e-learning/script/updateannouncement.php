<?php

  include("conn.php");
  $subject = $_POST['subject'];
  $info = $_POST['info'];
  $editedby = $_POST['editedby'];

  $timestamp = date('Y/m/d');

  $con->query("UPDATE `tbl_announcement` SET `subject`='$subject',`info`='$info', `datemodified`='$timestamp',`editedby`='$editedby' WHERE `id`='$id'");

  echo "<script>alert('Announcement successfully edited!');</script>";

  echo "<script type='text/javascript'>window.location.href = '../mainteacher/announcementlist.php'</script>";

?>