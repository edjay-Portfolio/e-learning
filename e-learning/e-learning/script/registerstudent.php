<?php

  include('conn.php');
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $fname = $_POST['fname'];
  $sname = $_POST['sname'];
  $mname = $_POST['mname'];
  $email = $_POST['email'];
  $level = $_POST['level'];
  $section = $_POST['section'];
  $syear = $_POST['syear'];
  $gender = $_POST['gender'];

  $con->query("INSERT INTO `tbl_student` (`uname`, `pass`, `level`, `section`, `fname`, `sname`, `mname`, `gender`, `email`, `syear`) VALUES ('$uname', '$pass', '$level', '$section', '$fname', '$sname', '$mname', '$gender', '$email', '$syear')");

  echo "<script>
        alert('Registration successful!');
        window.location.href='../index.php';
        </script>";

?>
