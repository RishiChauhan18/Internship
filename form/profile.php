<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>

    <?php include 'F:\xampp\htdocs\myphp\Internship\form\head.php'; ?>

    <title>Profile</title>
  </head>
  <body>
<div class="container-fluid">

<div class="frm">



    <div class="row">
      <div class="col-sm-4">
  <?php include 'F:\xampp\htdocs\myphp\Internship\form\menuBar.php'; ?>
      </div>

      <div class="col-sm-4">
        <div class="form_inner">

  <?php

    include 'F:\xampp\htdocs\myphp\Internship\form\login_check.php';
    include 'F:\xampp\htdocs\myphp\Internship\form\db1.php';

    // validating form
    $redirect = "";
    $nameErr = $phone_noErr = $ageErr ="";

        //funtion to test input
        function test_input($data)
        {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        $username = $_SESSION["username"];

        $query = "SELECT * FROM users WHERE username = '$username' ";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)>0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["name"];
            $phone_no = $row["phone_no"];
            $age = $row["age"];
            $email = $row["email"];
            $password = $row["password"];
          }
        }

        // $error = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $name = test_input($_POST["name"]);
      $phone_no = test_input($_POST["phone_no"]);
      $age = test_input($_POST["age"]);

  }
    $redirect = "database.php/?db=1";

?>

<!-- Register -->

        <form class="form-horizontal" action= "<?php echo "$redirect"; ?>" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend align="center">Profile</legend>

            <!-- name -->
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $name ?>">
            </div>

            <!-- username -->
            <div class="form-group">
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" value=<?php echo $_SESSION["username"]; ?> disabled>
            </div>

            <!-- email -->
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" required value="<?php echo $email ?>" disabled>
            </div>

            <!-- phone number -->
            <div class="form-group">
              <input type="tel" class="form-control" id="phone_no" placeholder="Phone Number" name="phone_no" maxlength="10" required value="<?php echo $phone_no ?>">
            </div>

            <!-- age -->
            <div class="form-group">
              <input type="number" name="age" min="0" max="100" class="form-control" id="age" placeholder="Age" value="<?php echo $age ?>">
            </div>

            <div class="form-group">
              Upload your image:
              <input type="file" name="profile_pic">
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
  </body>
</html>
