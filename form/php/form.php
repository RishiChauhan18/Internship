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
    <meta charset="utf-8">
    <title> Form </title>
  </head>
  <body>
<div class="container-fluid">

<div class="frm">

    <div class="row">
      <div class="col-sm-4">
        <!-- empty column -->
      </div>

      <div class="col-sm-4">
        <div class="my-form">
          Welcome <?php echo $_SESSION["username"]; ?>
          <img src="<?php echo $_SESSION['profile_pic']; ?>" alt="profile_pic" width="30px" height="30px"/>
          <a href="logout.php">Log Out</a>

  <?php

    include 'F:\xampp\htdocs\myphp\form\php\login_check.php';
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

      // if (empty($_POST["name"])) {
      //   $nameErr = "Name is required";
      //   // ++$error;
      // }
      // else {
        $name = test_input($_POST["name"]);
        // --$error;
      // }

      // if (empty($_POST["phone_no"])) {
      //   $phone_noErr = "Phone number required";
      //   ++$error;
      // }
      // else {
      //   $phone_no = test_input($_POST["phone_no"]);
      //   --$error;
      // }

      $phone_no = test_input($_POST["phone_no"]);
      $age = test_input($_POST["age"]);
    //   echo "$error";
    //
    //       if ($error == 0 ) {
    //         $redirect = "database.php";
    //       }
  }
    $redirect = "database.php";

?>

<!-- from begins -->

<!-- Register -->

        <form class="form-horizontal" action= "<?php echo "$redirect"; ?>" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend align="center">Register</legend>
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
              Upload your image:
              <input type="file" name="profile_pic">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </fieldset>
        </form>

<!-- show all -->
        <form class="form-horizontal" action="details.php/?page=1" method="post">
          <fieldset>
            <legend align="center">Show All</legend>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Show All</button>
            </div>
          </fieldset>
        </form>

<!-- Show particular detail -->
      <form class="form-horizontal" action="selected.php" method="post">
        <fieldset>
          <legend align="center"> Show details of </details></legend>

          <div class="form-group">
                <input type="number" name="get_id" min="0" class="form-control" id="id" placeholder="ID" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Go</button>
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
  </body>
</html>
