<?php

  if ($_SESSION["login_check"] != 1) {
    echo "<script type = 'text/javascript'>alert( You must login first);</script>";
    echo "<script type = 'text/javascript'>window.location = 'home.php'</script>";
  }

 ?>
