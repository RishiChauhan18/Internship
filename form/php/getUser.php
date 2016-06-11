<?php

include 'F:\xampp\htdocs\myphp\Internship\form\php\db1.php';

$q = $_GET["q"];

$query = "SELECT * FROM users";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)>0) {
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row["username"] == $_GET["q"]) {
      echo $row["name"];
    }
  }
}

mysqli_close($conn);
 ?>
