<?php
require "./content/listJokes.php";
session_start();
$loggedIn = $_SESSION['userId'] ?? false;
$isAdmin = $_SESSION['admin'] ?? false;

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Joke Jenerator</title>

<link rel="stylesheet" href="css/styles.css" />