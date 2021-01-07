<?php

  include('conn.php');
  $id = $_GET['id'];

  $con->query("DELETE FROM `tbl_announcement` WHERE `id` = '$id'");
  echo "<script>
        alert('Announcement succesfully deleted');
        window.location.href='../mainteacher/announcementlist.php';
        </script>";
?>
