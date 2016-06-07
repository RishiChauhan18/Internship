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
    <meta charset="utf-8">
    <title> Client Details</title>
  </head>
  <body>

<div class="container-fluid">

  <div class="form_outer">

      <div class="row">
        <div class="col-sm-12">
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

    echo "<br><a href='form.php'> Home </a>";

     ?>

   </div>
 </div>

 <div class="col-sm-4">
   <!-- empty column -->
 </div>

</div>
</div>
</div>
   </div>
  </body>
</html>
