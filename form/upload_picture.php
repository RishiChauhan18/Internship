<?php

// uploading profile picture
$target_dir = "profile_pictures/";
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
  $target_file = $target_dir. $_SESSION["username"] . "." .$imageFileType;
  if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
    echo "<br>Profile picture uploaded";
    $_SESSION["profile_pic"] = $target_file;
  }
  else {
    echo "<br>Sorry, there was an error uploading your file";
  }
}

 ?>
