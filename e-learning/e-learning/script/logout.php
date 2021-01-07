<?php

  session_start();
  $_SESSION['user'] = null;
  $_SESSION['student'] = null;
  session_destroy();
  header("location:../index.php");

?>
