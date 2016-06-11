<!DOCTYPE html>
<html>

  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/form.css" media="screen" title="no title" charset="utf-8">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="../javascript/check.js" charset="utf-8"></script>
    <meta charset="utf-8">

    <title></title>

  </head>

  <body>

    <?php


      include 'F:\xampp\htdocs\myphp\Internship\form\php\db1.php';

      //funtion to test input
      function test_input($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //creating a databse for the user
      $username = test_input($_POST["name"]);
      $password = md5(test_input($_POST["pass"]));
      $name = test_input($_POST["name"]);
      $email = test_input(strtolower($_POST["email"]));

      $query = "INSERT INTO users(username, password, name, email) VALUES ('$username', '$password', '$name', '$email')";
      if (mysqli_query($conn, $query)) {
        // echo "<br>Sign Up complete!<br><a href='login.php'>Login</a>";
        echo "<script>alert('Sign up complete');
        window.location = 'login.php';</script>";
      }
      else {
        echo "<br>There was some error: " .mysqli_error($conn);
      }
        $conn->close();
      }

     ?>

    <div class="container-fluid">

      <div class="form_outer">

        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-4">
              <!-- empty space -->
            </div>
            <div class="col-sm-4">
              <div class="form_inner">

                <!-- sign up form -->
              <form class="form-horizontal" action= "" method="post" name="signup">
                <fieldset>
                  <legend align="center"><h2>Sign Up</h2></legend>

                  <!-- name of the user -->
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" required><br>
                  </div>
                  <!-- email of the user -->
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" onblur="checkEmail()" required><span class="error" id="emailE"></span>
                  </div>
                  <!-- username -->
                  <div class="form-group">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" required onblur="checkUsername()"><span class="error" id="usernameE"></span>
                  </div>
                  <!-- password -->
                  <div class="form-group">
                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" onblur="checkPass()" required><span class="error" id="passE"></span>
                  </div>
                  <!-- confirm password -->
                  <div class="form-group">
                    <input type="password" name="confirm_pass" class="form-control" id="confirm_pass" placeholder="Confirm Password" onblur="confirmPass()" required>
                  </div>

                  <!-- <div class="form-group">
                    Upload your image:
                    <input type="file" name="profile_pic">
                  </div> -->
                  <div class="form-group">
                      <button type="submit" id="signupButton" class="btn btn-primary">Sign Up</button>
                  </div>

                </fieldset>
              </form>

              <!-- <button onclick="myFunction()">button</button> -->

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
