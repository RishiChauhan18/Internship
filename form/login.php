<?php

session_start();
$_SESSION["login_check"] = 0;

 ?>

<!DOCTYPE html>
<html>

  <head>

    <?php include 'F:\xampp\htdocs\myphp\Internship\form\head.php'; ?>

    <title>Login</title>

  </head>

  <body>

    <?php

    // incuding database "user_name" containing deatils of all the users
    include 'F:\xampp\htdocs\myphp\Internship\form\db1.php';

    $password_incorrect = $username_incorrect = $username = "";

    // when form is filled then checking details
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //funtion to test input
      function test_input($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      //validating entered fields
      $username = test_input($_POST["name"]);
      $password = md5(test_input($_POST["pass"]));
      // $password = md5(test_input($_POST["pass"]));

      // query and stuff
      $query = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
          if ($row["password"] == $password) {
            // assigning $_SESSION variables for further use
            $_SESSION["username"] = $username;
            $_SESSION["profile_pic"] = $row["profile_picture"];
            $_SESSION["login_check"] = 1;
            $_SESSION["totalClient"] = 0;
            echo "<script>window.location = 'home.php'</script>";
          }
          else {
            // if password is incorrect
            $password_incorrect = "*Incorrect password";
          }
        }
      }
      else {
        // if username is invalid or does not exists in the database
        $username_incorrect = "*Invalid username";
      }
    }

        $conn->close();
    ?>

    <div class="container-fluid">

      <div class="frm">

        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-4">
              <!-- empty space -->
            </div>
            <div class="col-sm-4">
              <div class="form_inner">

              <form class="form-horizontal" action="" method="post">
                <fieldset>
                  <legend align="center">Login</legend>
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Userame" value="<?php echo $username; ?>" required><span class="error"><?php echo $username_incorrect; ?></span>
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" required><span class="error"><?php echo $password_incorrect; ?></span>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary">Log In</button>
                      <a href="forgot.php"><span>Forgot Password</span></a>
                      <p class="signup">
                        <span>Don't have an account? <a href="signup.php">Sign Up</a></span>
                      </p>
                  </div>

                </fieldset>
              </form>

            </div>
            </div>
            <div class="col-sm-4">
              <!-- empty space -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
