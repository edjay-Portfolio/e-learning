<?php

  session_start();
  if($_SESSION['stat']!=1000){
    header("location:index.php");
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="css/all.css">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/background.css">
    <title>Register | E-Learning</title>
    <link rel="icon" type="image/gif/png" href="../pictures/content/title.png">

  </head>
  <body onload="display_ct()">

    <br>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <button id="time" type="button" class="btn btn-outline-info btn-block" data-toggle="tooltip" data-placement="bottom" title="Current Time" style="width:100%;">
            Tooltip on bottom
          </button>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="row" >

        <div class="col-4"></div>
        <div class="col-4">
          <div class="card">
            <div class="card-header" align="center">
              Register
            </div>
            <div class="card-body" >
              <form action="script/registerstudent.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Username</label>
                    <input required type="text" name="uname" class="form-control" id="inputEmail4" placeholder="Username...">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input required type="password" name="pass" class="form-control" id="inputPassword4" placeholder="Password...">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-4">
                    <label for="inputAddress"><br></label>
                    <input required type="text" name="fname" class="form-control" id="inputAddress" placeholder="First name...">
                  </div>
                  <div class="form-group col-4">
                    <label for="inputAddress">Full name</label>
                    <input required type="text" name="sname" class="form-control" placeholder="Surname...">
                  </div>
                  <div class="form-group col-4">
                    <label for="inputAddress"><br></label>
                    <input required type="text" name="mname" class="form-control" placeholder="Middle name...">
                  </div>
                </div>
                <div class="form-group">
                  <label for="emailId">Email</label>
                  <input required id="emailId" class="form-control" type="email" name="email" placeholder="Email@gmail.com...">
                </div>
                <div class="form-row">
                  <div class="col-auto my-1">
                    <label for="inlineFormCustomSelect">Grade level and Section</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="level" required>
                      <option value="11" selected>11</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                  <div class="col-6 my-1">
                    <input required id="sectionId" type="text" name="section" class="form-control" placeholder="Section...">
                  </div>
                </div>
                <div class="form-group">
                  <label for="syearId">Academic/School year</label>
                  <input required id="syearId" type="text" name="syear" class="form-control" placeholder="Ex. 2018-2019">
                </div>
                <div class="form-group">
                  <label for="genderId">Gender</label>
                  <select class="custom-select mr-sm-2" id="genderId" name="gender">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
                <input required type="submit" class="btn btn-success btn-block" value="Register" name="submit"><br>
              </form>
                <button class="btn btn-danger btn-block"><a href="index.php" style="text-decoration: none; color: white;">Back</a></button>
            </div>
          </div>
        </div>
        <div class="col-4"></div>
      </div>
    </div>



  <!--FONT AAWESOME-->
  <script src="js/all.js"></script>
  <!--BOOTSTRAP-->
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <!--COLLECTIONS OF FUNCTIONS-->
  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#holder')
                    .attr('src', e.target.result)
                    .width(70)
                    .height(70);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
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
