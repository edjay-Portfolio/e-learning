<?php

  include('conn.php');
  $id = $_GET['id'];

  $con->query("DELETE FROM `tbl_subject` WHERE `id` = '$id'");
  echo "<script>
        alert('Subject succesfully deleted');
        window.location.href='../mainteacher/subjectlist.php';
        </script>";
?>
