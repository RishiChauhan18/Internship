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

  <div class="frm">

      <div class="row">
        <div class="col-sm-4">
          <!-- empty column -->
        </div>

        <div class="col-sm-4">
          <div class="my-form">

<?php

  include 'F:\xampp\htdocs\myphp\form\php\db1.php';

  //funtion to test input
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $username = test_input($_POST["name"]);
  $password = test_input($_POST["pass"]);

  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["password"] == $password) {
        echo "Login successfull!";
        $_SESSION["username"] = $username;
        $_SESSION["profile_pic"] = $row["pro_pic"];
        $_SESSION["login_check"] = 1;
        echo "<script type='text/javascript'>window.location = 'form.php'</script>";
      }
      else {
        echo "Incorrect password";
      }
    }
  }
  else {
    echo "Invalid user name <a href='home.php'>Try again</a>";
  }

    $conn->close();
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
