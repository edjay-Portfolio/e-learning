<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-learning</title>
    <link rel="icon" type="image/gif/png" href="pictures/content/title.png">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="css/all.css">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/background.css">

  </head>
  <body onload="display_ct()">
    <br>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <button id="time" type="button" class="btn btn-outline-info btn-block" data-toggle="tooltip" data-placement="bottom" title="Current Time" >
            Tooltip on bottom
          </button>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <img class="img-fluid" src="pictures/content/ict.jpg">
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-header" align="center">
              <b>Login</b>
            </div>
            <div class="card-body">
              <p align="center"><i class="fas fa-users fa-7x" style="width:100%;"></i></p>
              <form method="post" action="script/login.php" autocomplete="off">
                <input class="form-control" type="text" name="user" placeholder="Username..." required><br>
                <input class="form-control" type="password" name="pass" placeholder="Password..." required><br>
                <input class="btn btn-success btn-block" type="submit" name="submit" value="Login">
              </form><br>
                <button class="btn btn-info btn-block" type="submit" name="submit" value="Register">
                  <a href="script/statchecker.php" style="text-decoration: none; color: white;">Register</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>


  <!--FONT AAWESOME-->
  <script src="js/all.js"></script>
  <!--BOOTSTRAP-->
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script type="text/javascript">
    function display_ct() {
      var x = new Date()
      document.getElementById('time').style.fontSize='100%';

      document.getElementById('time').innerHTML = x;
      display_c();
    }
    function display_c(){
      var refresh=1000; // Refresh rate in milli seconds
      mytime=setTimeout('display_ct()',refresh)
    }
  </script>
  </body>
</html>
