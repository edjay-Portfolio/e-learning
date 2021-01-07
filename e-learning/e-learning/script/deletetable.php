<?php

  include('conn.php');
  $searchtext = $_POST['searchtext'];

  $con->query("DELETE FROM `tbl_student` WHERE `syear` = '$searchtext'");
  echo "<script>
        alert('Data succesfully deleted');
        window.location.href='../mainteacher/studentlist.php';
        </script>";
?>
