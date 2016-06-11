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
    <link href="../css/navbar-fixed-side.css" rel="stylesheet" />
    <script src="..\javascript\check.js" charset="utf-8"></script>
    <meta charset="utf-8">
    <title> Home </title>
  </head>
  <body>

    <?php

    include 'F:\xampp\htdocs\myphp\Internship\form\php\db2.php';
    include 'F:\xampp\htdocs\myphp\Internship\form\php\login_check.php';

    $query = "SELECT COUNT(*) as total FROM client_info";

    $result = mysqli_query($conn, $query);
    $totalClient = mysqli_fetch_assoc($result);
    $_SESSION["totalClient"] = $totalClient;

    ?>

<div class="container-fluid">

<div class="frm">

      <div class="row">
        <div class="col-sm-3">
        <!-- side menu bar -->
        <div class="side_menu">
          <?php include 'F:\xampp\htdocs\myphp\Internship\form\php\menuBar.php'; ?>
      </div>
    </div>

      <div class="col-sm-8">
        <div class="welcome">
          <div class="jumbotron">
            <h1 align="center">Welcome!</h1>
          </div>
          <div align="center">
            <img src="<?php echo $_SESSION['profile_pic']; ?>" alt="profile_pic" class="image-responsive" id="welImg"/>
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
