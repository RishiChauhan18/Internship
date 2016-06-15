<!DOCTYPE html>
<html>

  <head>

    <?php include 'F:\xampp\htdocs\myphp\Internship\form\head.php'; ?>

    <title>Sign Up</title>

  </head>

  <body>

    <?php


      include 'F:\xampp\htdocs\myphp\Internship\form\db1.php';

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
