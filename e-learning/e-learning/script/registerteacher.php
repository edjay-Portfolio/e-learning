<?php
  include('conn.php');
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $fname = $_POST['fname'];
  $sname = $_POST['sname'];
  $mname = $_POST['mname'];
  $email = $_POST['email'];
  $code = $_POST['code'];

  $target_dir = "../uploads/profile/";
  $target_file = $target_dir . basename($_FILES["files"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["files"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "<script>
        alert('Sorry, file already exists.');
        window.location.href='../registerpageteacher.php';
        </script>";
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["files"]["size"] > 500000) {
      echo "<script>
        alert('Sorry, your file is too large.');
        window.location.href='../registerpageteacher.php';
        </script>";
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "<script>
        alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
        window.location.href='../registerpageteacher.php';
        </script>";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
          $picture = $_FILES["files"]["name"];
          $con->query("INSERT INTO `tbl_user` (`uname`, `pass`, `fname`, `sname`, `mname`, `email`, `code`, `picture`) VALUES ('$uname', '$pass', '$fname', '$sname', '$mname', '$email', '$code', '$picture')");
          echo "<script>
                alert('Register Succesful!');
                window.location.href='../index.php';
                </script>";
      } else {
          echo "<script>
              alert('Sorry, there was an error uploading your file.');
              window.location.href='../index.php';
              </script>";
      }
  }
?>
