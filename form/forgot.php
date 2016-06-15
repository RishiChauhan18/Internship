<!DOCTYPE html>
<html>
  <head>

    <?php include 'F:\xampp\htdocs\myphp\Internship\form\head.php'; ?>

    <title>Forgot Password</title>
  </head>
  <body>

<div class="container-fluid">

  <div class="frm">

    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-3">
          <!-- empty column -->
        </div>

        <div class="col-sm-8">
          <div class="form_inner">

<?php

  include 'F:\xampp\htdocs\myphp\Internship\form\db1.php';

    // validating form
    $username = $password = $confirm_pass = $cp_error= "";

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

      $username = test_input($_POST["username"]);
      $password = test_input($_POST["pass"]);
      $confirm_pass = test_input($_POST["confirm_pass"]);

      if ($password == $confirm_pass) {

          $query = "UPDATE users SET password = '$password' WHERE username = '$username'";

          if ($conn->query($query)) {
            echo "<br>Password updated!";
          }
          else {
            echo "<br>Error: " . $query . $conn->error;
          }
      }
      else {
        $cp_error = "*Passwords do not match";
      }
  }

  echo "<br><a href='home.php'> Home </a>";

    $conn->close();
?>

<form class="form-horizontal" action= "" method="post">
  <fieldset>
    <legend align="center">Update Password</legend>

    <div class="form-group">
      <input type="text" class="form-control" id="name" placeholder="Username" name="username" required>
    </div>

    <div class="form-group">
      <input type="password" class="form-control" id="pass" placeholder="New Password" name="pass" required>
    </div>

    <div class="form-group">
      <input type="password" class="form-control" id="confirm_pass" placeholder="Confirm Password" name="confirm_pass" required><span class="error"><?php echo $cp_error; ?></span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </fieldset>
</form>

  </div>
  </div>

</div>

    </div>
  </div>
  </div>
      </body>
    </html>
