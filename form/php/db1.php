<?php

  //connection details
  $server_name = "localhost";
  $user_name = "root";
  $password = NULL;
  $db = "user_name";

  //connecting database
  $conn = mysqli_connect($server_name, $user_name, $password, $db);

  if (!$conn) {
    die("<br>Error" . mysqli_connect_error());
  }
  // else {
  //   echo "<br>connected successfully";
  // }

 ?>
