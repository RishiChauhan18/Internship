<?php

  session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/form.css" media="screen" title="no title" charset="utf-8">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="../css/navbar-fixed-side.css" rel="stylesheet" />
    <script src="..\javascript\check.js" charset="utf-8"></script>
    <meta charset="utf-8">
    <title> Edit  </title>
  </head>
  <body>

<div class="container-fluid">

  <div class="form_outer">

    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-3">
          <!-- empty column -->
        </div>

        <div class="col-sm-8">
          <div class="form_inner">

            <div dir="rtl">
              <span>Welcome <?php echo $_SESSION["username"]; ?></span>
              <a href="../logout.php"><?php echo " "; ?>Log Out</a>
            </div>

<?php

include 'F:\xampp\htdocs\myphp\Internship\form\php\login_check.php';
include 'F:\xampp\htdocs\myphp\Internship\form\php\db2.php';

    // validating form
    $name_edit = $phone_no_edit = $id_edit = $profile_pic_edit = $age_edit = $redirect = "";
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

      $name_edit = test_input($_POST["name"]);
      $phone_no_edit = test_input($_POST["phone_no"]);
      $age_edit = test_input($_POST["age"]);
      $id_edit = test_input($_REQUEST["id"]);
      // $profile_pic_edit = $_REQUEST["profile_pic"];

      $target_dir = "../profile_pictures/";
      $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

      if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
        if ($check !== false) {
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
        $target_file = $target_dir. $name_edit . "." .$imageFileType;
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
          echo "<br>Profile picture uploaded";
        }
        else {
          echo "<br>Sorry, there was an error uploading your file";
        }
      }
      $profile_pic_edit = $target_file;

      echo "<br>UPDATING";
  }

  $sql_query_edit = "UPDATE client_info SET name = '$name_edit', phone_no = $phone_no_edit, age = $age_edit, profile_pic = '$profile_pic_edit' WHERE id = $id_edit";

  if ($conn->query($sql_query_edit)) {
    echo "<br>Database updated!";
    echo "<a href='../details.php/?page=1'>Check</a>";
  }
  // else {
  //   echo "<br>Error: " . $sql_query_edit . $conn->error;
  // }

  $id_edit = test_input($_REQUEST["id"]);
  $sql_query_display = "SELECT * FROM client_info WHERE id = $id_edit";
  $result = mysqli_query($conn,$sql_query_display);

  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $name_edit = $row["name"];
      $phone_no_edit = $row["phone_no"];
      $age_edit = $row["age"];
      $profile_pic_edit = $row["profile_pic"];
    }
  }
  else {
    echo "<br>Error: " . $sql_query_display . $conn->error;
  }

  echo "<br><a href='../home.php'> Home </a>";

    $redirect = "details.php";

    $conn->close();
?>

<form class="form-horizontal" action= "" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend align="center">Update Details</legend>
    <div class="form-group">
      <input type="number" name="id" class="form-control" id="id" placeholder="ID" value= "<?php echo $_REQUEST["id"]; ?>" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $name_edit; ?>" required>
    </div>
    <div class="form-group">
      <input type="tel" name="phone_no" class="form-control" id="phone_no" placeholder="Phone Number" maxlength="10" value="<?php echo $phone_no_edit; ?>" required>
    </div>
    <div class="form-group">
      <input class="form-control" id="age" placeholder="Age" type="number" name="age" max="100" value="<?php echo $age_edit; ?>" min="0" required>
    </div>
    <div class="form-group">
      Update your image:
      <input type="file" name="profile_pic" id="profile_pic" value="<?php echo $profile_pic_edit; ?>">
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
