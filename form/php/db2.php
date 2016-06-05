<?php

  $server_name = "localhost";
  $user_name = "root";
  $password = NULL;
  $db = "form";

  $conn = mysqli_connect($server_name, $user_name, $password, $db);

  if (!$conn) {
    die("<br>Error: " . mysqli_connect_error());
  }
  // else {
  //   echo "<br>Database connected";
  // }

 ?>
