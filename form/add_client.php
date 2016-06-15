  <?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>

    <?php include 'F:\xampp\htdocs\myphp\Internship\form\head.php'; ?>

    <title>Add Client</title>

  </head>
  <body>
<div class="container-fluid">

<div class="frm">



      <div class="row">
        <div class="col-sm-4">
        <!-- side menu bar -->
        <div class="side_menu">
          <?php include 'F:\xampp\htdocs\myphp\Internship\form\menuBar.php'; ?>
      </div>
    </div>

      <div class="col-sm-5">
        <div class="form_inner">

  <?php

    include 'F:\xampp\htdocs\myphp\Internship\form\login_check.php';
    // validating form
    $name = $phone_no = $age = $redirect = "";
    $nameErr = $phone_noErr = $ageErr ="";

        //funtion to test input
        function test_input($data)
        {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        // $error = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = test_input($_POST["name"]);
      $phone_no = test_input($_POST["phone_no"]);
      $age = test_input($_POST["age"]);
  }
    $redirect = "database.php/?db=2";

?>

<!-- from begins -->

<!-- Register -->

        <form class="form-horizontal" action= "<?php echo "$redirect"; ?>" method="post" enctype="multipart/form-data">
          <fieldset>
            <div align="center">
            <legend>
              <img src="images\create-512.png" alt="profile_pic" class="image-responsive" id="welImg"/>
              <h2>Add Client</h2>
            </legend>
          </div>
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" id="phone_no" placeholder="Phone Number" name="phone_no" maxlength="10" required>
            </div>
            <div class="form-group">
              <input type="number" name="age" min="0" max="100" class="form-control" id="age" placeholder="Age">
            </div>

            <!-- Single button -->
            <div class="form-group">
              <div class="row">
                <div class="col-sm-5">
              <!-- <label for="sel1">Country</label> -->

                <select class="form-control" id="sel1" onchange="this.options[this.selectedIndex].onclick(selectState(value))">
                  <option>Country</option>
                  <option id="b">B</option>
                  <option>C</option>
                  <option>D</option>
                </select>
              </div>
              <div class="col-sm-2">
                <!-- empty space -->
              </div>
              <div class="col-sm-5">
              <select class="form-control" id="sel2">
                <option>State</option>
              </select>

            </div>
              </div>
            </div>
            <div class="form-group">
              Upload image:
              <label><input type="file" name="profile_pic"></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </fieldset>
        </form>

</div>
</div>

</div>
</div>
</div>
  </body>
</html>
