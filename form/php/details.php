<?php

  session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/form.css" media="screen" title="no title" charset="utf-8">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title> Client Details</title>
  </head>
  <body>

<div class="container-fluid">

  <div class="frm">

  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-3">
        <!-- empty column -->
      </div>

      <div class="col-sm-6">
        <div class="my-form">

          <div dir="rtl">
            <span>Welcome <?php echo $_SESSION["username"]; ?></span>
            <a href="../logout.php"><?php echo " "; ?>Log Out</a>
          </div>

    <?php

    include 'F:\xampp\htdocs\myphp\form\php\login_check.php';
    include 'F:\xampp\htdocs\myphp\form\php\db2.php';

    $page = $_REQUEST["page"];
    $offset = (($page-1)*3);

    $select_all = "SELECT * FROM client_info LIMIT 3 OFFSET $offset";
    $result = mysqli_query($conn, $select_all);

    if (mysqli_num_rows($result)>0) {
      echo "<table class='table table-hover'><th>ID</th><th>Name</th><th>Phone Number</th><th>Age</th><th>Profile Picture</th><th>Edit Options</th>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" .$row["id"]. "</td><td>" .$row["name"]. "</td><td>" .$row["phone_no"] ."</td><td>" . $row["age"]. "</td><td><img src='../../profile_pictures/" . $row["profile_pic"] . "' width = '50px' height = '50px'/></td><td><a href='../edit.php/?id=" . $row["id"]. "' >Edit </a><a href='../delete.php/?id=" .$row["id"]. "'> Delete</a></td></tr>";
      }
      echo "</table>";
    }
    else {
      echo "<br>Error: " . $select_all . $conn->error;
    }

    echo "<br><a href='../form.php'> Home </a>";

     ?>

     <nav align="center">
       <ul class="pagination">
         <li><a href="../details.php/?page=<?php if (($page-1)<0){echo (1);} else {echo ($page-1);} ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
         <li class="active"><a href="../details.php/?page=<?php echo (1);?>">1 <span class="sr-only">(current)</span></a></li>
         <li><a href="../details.php/?page=<?php echo (2);?>">2 <span class="sr-only">(current)</span></a></li>
         <li><a href="../details.php/?page=<?php echo ($page+1);?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
       </ul>
     </nav>

     </div>
   </div>
     <div class="col-sm-3">
       <!-- empty column -->
     </div>
   </div>
 </div>
 </div>
  </body>
</html>
