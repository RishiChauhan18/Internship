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
    <title>Loging In</title>
  </head>
  <body>
<div class="container-fluid">

  <div class="form_outer">

      <div class="row">
        <div class="col-sm-4">
          <!-- empty column -->
        </div>

        <div class="col-sm-4">
          <div class="form_inner">

<?php

  include 'F:\xampp\htdocs\myphp\Internship\form\php\login_check.php';
  include 'F:\xampp\htdocs\myphp\Internship\form\php\db1.php';

  echo "Logging out....";
  session_destroy();
  echo "<script type='text/javascript'>window.location = 'login.php'</script>";
?>

  </div>
  </div>

<div class="col-sm-4">
  <!-- empty column -->
</div>

</div>
</div>

    </div>
      </body>
</html>
