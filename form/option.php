<?php

//AJAX function referring here

// include 'F:\xampp\htdocs\myphp\Internship\form\db1.php';

// the sent variable
$q = $_GET["q"];

$server_name = "localhost";
$user_name = "root";
$password = NULL;
$db = "address";

//connecting database
$conn = mysqli_connect($server_name, $user_name, $password, $db);

if (!$conn) {
  die("<br>Error" . mysqli_connect_error());
}

// selecting all states for a selected country from database
$query = "SELECT * FROM country_state";
$result = mysqli_query($conn, $query);

// if query result is not empty
if (mysqli_num_rows($result)>0) {
  // storing each result in $row associative array
  echo "<option>State</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row["country"] == $q) {
      echo "<option>". $row['state'] ."</option>";
    }
  }
}

// closing the connnection
mysqli_close($conn);
 ?>
