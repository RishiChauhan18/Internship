<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/form.css" media="screen" title="no title" charset="utf-8">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Forgot Password</title>
  </head>
  <body>

<div class="container-fluid">

  <div class="frm">

    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-4">
          <!-- empty column -->
        </div>

        <div class="col-sm-4">
          <div class="my-form">

<?php

  include 'F:\xampp\htdocs\myphp\Internship\form\php\db1.php';

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

  <div class="col-sm-4">
    <!-- empty column -->
  </div>
</div>

    </div>
  </div>
  </div>
      </body>
    </html>
