<?php

//AJAX function referring here

include 'F:\xampp\htdocs\myphp\Internship\form\db1.php';

// the sent variable
$q = $_GET["q"];

//sign up AJAX function
// selecting all users
$query = "SELECT * FROM users";

// storing results
$result = mysqli_query($conn, $query);

// if number of rows greater than 0 i.e., result is not empty
if (mysqli_num_rows($result)>0) {
  // storing row values of database in $row
  while ($row = mysqli_fetch_assoc($result)) {
    // if email already exists
    if ($row["email"] == $_GET["q"]) {
      echo "*Email already exists";
    }
    // if user name already exists
    if ($row["username"]  == $_GET["q"]) {
      echo "*Username already exists";
    }
  }
}


// closing the connnection
mysqli_close($conn);
 ?>
