<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script type="text/javascript">
      var stat = prompt("Enter Registration code for Teacher: 2000 or Student: 1000");
      parseInt(stat);
      if (stat == 2000) {
        window.location.href = 'statserver.php?stat=2000';
      }else if (stat == 1000) {
        window.location.href = 'statserver.php?stat=1000';
      }else {
        alert("Invalid registration code!");
        window.location.href = '../index.php';
      }
    </script>
  </body>
</html>
