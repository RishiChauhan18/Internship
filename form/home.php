<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>

    <?php include 'F:\xampp\htdocs\myphp\Internship\form\head.php'; ?>

    <title> Home </title>
  </head>
  <body>

    <?php

    include 'F:\xampp\htdocs\myphp\Internship\form\db2.php';
    include 'F:\xampp\htdocs\myphp\Internship\form\login_check.php';

    $query = "SELECT COUNT(*) as total FROM client_info";

    $result = mysqli_query($conn, $query);
    $totalClient = mysqli_fetch_assoc($result);

    $_SESSION["totalClient"] = $totalClient["total"];

    ?>

<div class="container-fluid">

<div class="frm">

      <div class="row">
        <div class="col-sm-3">
        <!-- side menu bar -->
        <div class="side_menu">
          <?php include 'F:\xampp\htdocs\myphp\Internship\form\menuBar.php';
          $current_url = $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
          ?>
      </div>
    </div>

      <div class="col-sm-8">
        <div class="welcome">
          <div class="jumbotron">
            <h1 align="center">Welcome!</h1>
          </div>
          <div align="center">
            <img src="images\file.png" alt="file" class="image-responsive" id="welImg"/>
          </div>
          <div>
              <fieldset>
                <legend class="welcome" align="center">Details of Database</legend>

                <p>
                  <h4>Total Clients: <?php echo $totalClient['total']; ?></h4>
                </p>

              </fieldset>
          </div>
        </div>
        <div class="form_inner">

</div>
</div>

</div>
</div>
</div>
  </body>
</html>
