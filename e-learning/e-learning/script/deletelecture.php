<?php

  include('conn.php');
  $id = $_GET['id'];

  $con->query("DELETE FROM `tbl_lecture` WHERE `id` = '$id'");
  echo "<script>
        alert('Lecture succesfully deleted');
        window.location.href='../mainteacher/lecturelist.php';
        </script>";
?>
