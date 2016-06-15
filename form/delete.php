<?php

  session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>

    <?php include 'F:\xampp\htdocs\myphp\Internship\form\head.php'; ?>

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
              <a href="logout.php"><?php echo " "; ?>Log Out</a>
            </div>

<?php

include 'F:\xampp\htdocs\myphp\Internship\form\login_check.php';
include 'F:\xampp\htdocs\myphp\Internship\form\db2.php';

    $id_edit = $redirect = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $id_edit = $_POST["id"];

      echo "<br>DELETING";
  }

  $sql_query = "DELETE FROM client_info WHERE id = $id_edit";

  if ($conn->query($sql_query)) {
    echo "<br>Entry deleted";
    echo "<a href='details.php'>Check</a>";
  }
  else {
    echo "<br>Error: " . $sql_query . $conn->error;
  }

  echo "<br><a href='home.php'> Home </a>";

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
