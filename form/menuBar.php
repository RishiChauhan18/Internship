<div class="row">
    <div class="col-sm-3 col-lg-2">
      <nav class="navbar navbar-default navbar-fixed-side">
        <!-- normal collapsible navbar markup -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <ul class="nav navbar-nav navbar-left">
            <div align="center">
              <img src="<?php echo $_SESSION['profile_pic']; ?>" alt="profile_pic" class="image-responsive" id="pp"/>
            </div>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Log Out</a></li>
                  <li><a href="profile.php">Profile</a></li>
                </ul>
          </ul>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li id="homeButton" onclick="activeButton()"><a href="home.php">Home</a></li>
            <li onclick="activeButton()"><a href="add_client.php">Add Client</a></li>
            <li onclick="activeButton()"><a href="details.php/?page=1">Show All</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-left">
            <form id="searchForm" class="navbar-form navbar-right" role="search" action="selected.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" id="search" placeholder="Search Client by ID" name="get_id">
              </div>
              <button type="submit" class="btn btn-primary" id="searchButton">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              </button>
            </form>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
    </div>
    <div class="col-sm-9 col-lg-10">
      <!-- empty -->
  </div>
</div>
