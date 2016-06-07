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
    <script scr="javascript\check.js"></script>
    <meta charset="utf-8">
    <title> Database </title>
  </head>
  <body>
    <div class="container-fluid">

      <div class="form_outer">

          <div class="row">
            <div class="col-sm-4">
              <!-- empty column -->
            </div>

            <div class="col-sm-4">
              <div class="form_inner">

                <div dir="rtl">
                  <span>Welcome <?php echo $_SESSION["username"]; ?></span>
                  <a href="logout.php"><?php echo " "; ?>Log Out</a>
                </div>

    <?php

    include 'F:\xampp\htdocs\myphp\Internship\form\php\login_check.php';
    include 'F:\xampp\htdocs\myphp\Internship\form\php\db2.php';

    //funtion to test input
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    //prepared statement
    // $stmt = $conn->prepare("INSERT INTO client_info (name, phone_no, age) VALUES (?,?,?)");
    // $stmt->bind_param("sii", $name, $phone_no, $age);

    //for inserting data
    $name = test_input($_POST["name"]);
    $phone_no = test_input($_POST["phone_no"]);
    // $pp_id = mysqli_insert_id($conn);
    $age = test_input($_POST["age"]);
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
      $target_file = $target_dir. $name . "." .$imageFileType;
      if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        echo "<br>Profile picture uploaded";
      }
      else {
        echo "<br>Sorry, there was an error uploading your file";
      }
    }
    // $stmt->execute();

    //selecting data from the database
    // $get_name = $_POST["get_name"];
    // $get_phone_no = $_POST["get_phone_no"];
    // $get_age = $_POST["get_age"];

    // $stmt = "INSERT INTO client_info (name, phone_no, age) VALUES ($_POST["name"], $_POST["phone_no"]), $_POST["age"]";


        $sql_query = "INSERT INTO client_info (name, phone_no, age, profile_pic) VALUES ('$name', $phone_no, $age, '$target_file')";

        if ($conn->query($sql_query)) {

          echo "<br>Client added to the database";
        }
        else {
          echo "<br>Error: " . $sql_query . $conn->error;
        }

    echo "<br><a href='form.php'> Home </a>";

    // $stmt->close();

    $conn->close();
    ?>
  </div>
</div>

<div class="col-sm-4">
  <!-- epmty column -->
</div>

</div>
</div>
</div>
  </body>
</html>
