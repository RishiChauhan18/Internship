<?php

  session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\..\css\form.css" media="screen" title="no title" charset="utf-8">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="../css/navbar-fixed-side.css" rel="stylesheet" />
    <script src="..\javascript\check.js" charset="utf-8"></script>
    <meta charset="utf-8">
    <title> Delete </title>
  </head>
  <body>
<div class="container-fluid">

  <div class="frm">

      <div class="row">
        <div class="col-sm-3">
          <!-- empty column -->
        </div>

        <div class="col-sm-8">
          <div class="form_inner">

            <div dir="rtl">
              <span>Welcome <?php echo $_SESSION["username"]; ?></span>
              <a href="../logout.php"><?php echo " "; ?>Log Out</a>
            </div>

<?php

include 'F:\xampp\htdocs\myphp\Internship\form\php\login_check.php';
include 'F:\xampp\htdocs\myphp\Internship\form\php\db2.php';

    $id_edit = $redirect = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $id_edit = $_POST["id"];

      echo "<br>DELETING";
  }

  $sql_query = "DELETE FROM client_info WHERE id = $id_edit";

  if ($conn->query($sql_query)) {
    echo "<br>Entry deleted";
    echo "<a href='../details.php'>Check</a>";
  }
  else {
    echo "<br>Error: " . $sql_query . $conn->error;
  }

  echo "<br><a href='../home.php'> Home </a>";

    $redirect = "details.php";

    $conn->close();
?>
<form class="form-horizontal" action= "delete.php" method="post">
  <fieldset>
    <legend align="center">Delete</details></legend>

    <div class="form-group">
          <input type="number" name="id" min="0" class="form-control" id="id" placeholder="ID" value= "<?php echo $_REQUEST["id"]; ?>" required>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary">Delete</button>
      </div>
    </fieldset>
  </form>

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
