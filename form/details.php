<?php

  session_start();

  $current_url = $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
  //  $current_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
  //echo $current_url;

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
        <?php include 'F:\xampp\htdocs\myphp\Internship\form\menuBar.php'; ?>
      </div>

      <div class="col-sm-8">
        <div class="form_inner">

    <?php

    include 'F:\xampp\htdocs\myphp\Internship\form\login_check.php';
    include 'F:\xampp\htdocs\myphp\Internship\form\db2.php';

    $page = $_REQUEST["page"];
    if ($page == 0) {
      header('Location: details.php/?page=1');
    }

    $limit = 4;
    $offset = (($page-1)*$limit);

    $select_all = "SELECT * FROM client_info LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $select_all);

    if (mysqli_num_rows($result)>0) {
      echo "<table class='table table-hover'><th>ID</th><th>Name</th><th>Phone Number</th><th>Age</th><th>Profile Picture</th><th>Edit Options</th>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" .$row["id"]. "</td><td>" .$row["name"]. "</td><td>" .$row["phone_no"] ."</td><td>" . $row["age"]. "</td><td><img src='profile_pictures/" . $row["profile_pic"] . "' width = '50px' height = '50px'/></td><td><a href='edit.php/?id=" . $row["id"]. "' >Edit </a><a href='delete.php/?id=" .$row["id"]. "'> Delete</a></td></tr>";
      }
      echo "</table>";
    }
    else {
      echo "<br>Error: " . $select_all . $conn->error;
    }

    echo "<br><a href='home.php'> Home </a>";

     ?>

     <nav align="center">
       <ul class="pagination">

         <li><a href="details.php/?page=<?php echo ($page-1);?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>

         <!-- <li class="active"><a href="../details.php/?page=<?php //echo (1);?>">1 <span class="sr-only">(current)</span></a></li> -->
         <?php

         $pgNo = 0;
         echo $_SESSION["totalClient"];
         $x = ($_SESSION["totalClient"] / $limit);
         do {
           $pgNo++;
           echo "<li><a href='details.php/?page=$pgNo'>" .($pgNo). "</a></li>";

         } while ($pgNo < $x);

         ?>

         <!-- <li><a href="../details.php/?page=<?php //echo (2);?>">2 <span class="sr-only">(current)</span></a></li> -->
         <li><a href="details.php/?page=<?php echo ($page+1);?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>

       </ul>
     </nav>

     </div>
   </div>
   </div>
 </div>
 </div>
  </body>
</html>
