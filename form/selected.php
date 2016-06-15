<?php

  session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>

    <?php include 'F:\xampp\htdocs\myphp\Internship\form\head.php'; ?>

    <title> Client Details</title>
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
              <a href="logout.php"><?php echo " "; ?>Log Out</a>
            </div>

    <?php

    include 'F:\xampp\htdocs\myphp\Internship\form\login_check.php';
    include 'F:\xampp\htdocs\myphp\Internship\form\db2.php';

    $get_id = $_POST["get_id"];

    $select = "SELECT * FROM client_info WHERE id = $get_id";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result)>0) {
      echo "<table class='table table-hover'><th>ID</th><th>Name</th><th>Phone Number</th><th>Age</th><th>Edit Options</th>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" .$row["id"]. "</td><td>" .$row["name"]. "</td><td>" .$row["phone_no"] ."</td><td>" . $row["age"]. "</td><td><a href='edit.php/?id=" . $row["id"]."' >Edit </a><a href='delete.php/?id=" .$row["id"]. "'> Delete</a></td></tr>";
      }
      echo "</table>";
    }
    else {
      echo "<br> No such entry in database.".  $conn->error;
    }

    echo "<br><a href='home.php'> Home </a>";

     ?>

   </div>
 </div>

</div>
</div>
</div>
   </div>
  </body>
</html>
