<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    nav {
    padding: 10px 20 px;
    background: #294;
    }
  </style>
</head>
<body>
    <?php
    $loggedIn = true;
    $username = "Erkel Maximus";

    if ($loggedIn) {
      echo "<nav>You are logged in as $username</nav>";
    } else {
      echo '<nav>You are NOT logged in</nav>';

    }
  ?>
</body>
</html>