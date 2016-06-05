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
    <title>Sign Up</title>
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

  <?php

  include 'F:\xampp\htdocs\myphp\form\php\db1.php';

  //funtion to test input
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  //creating a databse for the user
  $username = test_input($_POST["name"]);
  $password = test_input($_POST["pass"]);

  //uploading profile picture
  $target_dir = "../profile_pictures/";
  $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
    if ($check !== false) {
      echo "<br>File is being is uploaded";
      $uploadOk = 1;
    }
    else {
      echo "<br>File is not an image";
      $uploadOk = 0;
    }
  }

  // if (file_exists($target_file)) {
  //     echo "<br>Sorry, file already exists";
  //     $uploadOk = 0;
  // }

  if ($_FILES["profile_pic"]["size"]>500000000) {
    echo "<br>File size is too large";
  }

  if ($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "<br>Sorry, only JPG, JPEG, PNG and GIF files are allowed";
    $uploadOk = 0;
  }

  else {
    $target_file = $target_dir. $username . "." .$imageFileType;
    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
      echo "<br>Profile picture uploaded";
    }
    else {
      echo "<br>Sorry, there was an error uploading your file";
    }
  }

  $query = "INSERT INTO users(username, password, pro_pic) VALUES ('$username', '$password', '$target_file')";
  if (mysqli_query($conn, $query)) {
    echo "<br>Sign Up complete!";
  }
  else {
    echo "<br>There was some error: " .mysqli_error($conn);
  }
    $conn->close();
  ?>

  <p>
    <a href="home.php">Login</a>
  </p>

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
