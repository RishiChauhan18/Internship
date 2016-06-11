<?php

include 'F:\xampp\htdocs\myphp\Internship\form\php\db1.php';

$q = $_GET["q"];

$query = "SELECT * FROM users";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)>0) {
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row["email"] == $_GET["q"]) {
      echo "*Email already exists";
    }
    if ($row["username"]  == $_GET["q"]) {
      echo "*Username already exists";
    }
  }
}

mysqli_close($conn);
 ?>
