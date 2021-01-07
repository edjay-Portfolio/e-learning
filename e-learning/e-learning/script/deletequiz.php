<?php

  include('conn.php');
  $id = $_GET['id'];

  $con->query("DELETE FROM `tbl_quiz` WHERE `id` = '$id'");
  echo "<script>
        alert('Quiz succesfully deleted');
        window.location.href='../mainteacher/quizlist.php';
        </script>";
?>
