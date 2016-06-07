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
    <meta charset="utf-8">

    <title>Sign Up</title>

  </head>

  <body>

    <div class="container-fluid">

      <div class="form_outer">

        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-4">
              <!-- empty space -->
            </div>
            <div class="col-sm-4">
              <div class="form_inner">

              <form class="form-horizontal" action= "signup.php" method="post" enctype="multipart/form-data">
                <fieldset>
                  <legend align="center">Sign Up</legend>

                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Userame" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    Upload your image:
                    <input type="file" name="profile_pic">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary">Sign Up</button>
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
