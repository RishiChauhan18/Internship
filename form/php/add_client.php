<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\css\form.css" media="screen" title="no title" charset="utf-8">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="../css/navbar-fixed-side.css" rel="stylesheet" />
    <script src="..\javascript\check.js" charset="utf-8"></script>
    <meta charset="utf-8">
    <title> Home </title>
  </head>
  <body>
<div class="container-fluid">

<div class="frm">



      <div class="row">
        <div class="col-sm-4">
        <!-- side menu bar -->
        <div class="side_menu">
          <?php include 'F:\xampp\htdocs\myphp\Internship\form\php\menuBar.php'; ?>
      </div>
    </div>

      <div class="col-sm-5">
        <div class="form_inner">

  <?php

    include 'F:\xampp\htdocs\myphp\Internship\form\php\login_check.php';
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
            <legend align="center">
              <img src="..\images\create-512.png" alt="profile_pic" class="image-responsive" id="welImg"/>
              <h2>Add Client</h2>
            </legend>
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" id="phone_no" placeholder="Phone Number" name="phone_no" maxlength="10" required>
            </div>
            <div class="form-group">
              <input type="number" name="age" min="0" max="100" class="form-control" id="age" placeholder="Age">
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
