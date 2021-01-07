<?php

  include('conn.php');
  $quiz = $_POST['quiz'];
  $scode = $_POST['scode'];
  $chapter = $_POST['chapter'];
  $level = $_POST['level'];
  $postedby = $_POST['postedby'];

  $timestamp = date('Y/m/d');  

  $target_dir = "../uploads/quizzes/";
  $target_file = $target_dir . basename($_FILES["files"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
/*  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["files"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          $uploadOk = 0;
      }
  }*/
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "<script>
          alert('File already Exist in directory!');
          window.location.href='../mainteacher/addquizpage.php';
          </script>";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["files"]["size"] > 1500000) {
    echo "<script>
          alert('File too large!!');
          window.location.href='../mainteacher/addquizpage.php';
          </script>";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "pdf") {
    echo "<script>
          alert('Sorry, only pdf files are allowed.');
          window.location.href='../mainteacher/addquizpage.php';
          </script>";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "<script>
          alert('Unexpected error!');
          window.location.href='../mainteacher/addquizpage.php';
          </script>";
  // if everything is ok, try to upload file
  } 
  else {
      if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
          $file = $_FILES['files']['name'];
          $con->query("INSERT INTO `tbl_quiz` (`quiz`, `scode`, `chapter`, `level`, `postedby`, `dateposted`, `file`) VALUES ('$quiz', '$scode', '$chapter', '$level', '$postedby', '$timestamp', '$file')");
        echo "<script>
                alert('Quiz added successfully!');
                window.location.href='../mainteacher/quizlist.php';
                </script>";
      } else {
        echo "<script>
              alert('Quiz not added :(');
              window.location.href='../mainteacher/addquizpage.php';
              </script>";
      }
  }

?>
