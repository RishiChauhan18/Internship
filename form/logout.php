<?php

  session_start();

 ?>
<!DOCTYPE html>
<html>
  <head>

    <?php include 'F:\xampp\htdocs\myphp\Internship\form\head.php'; ?>

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

  include 'F:\xampp\htdocs\myphp\Internship\form\login_check.php';
  include 'F:\xampp\htdocs\myphp\Internship\form\db1.php';

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
