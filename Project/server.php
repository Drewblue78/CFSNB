<?php

function redirect($url)
{
  header("Location: $url");
}

require 'db.php';

$action = $_POST['action'] ?? false;

switch ($action) {
  case 'register':
    register();
    break;
  case 'login':
    login();
    break;
  case 'logout':
    logout();
    break;
  default:
    redirect("404.php");
}

function setStatusMessage($msg = "")
{
  setcookie("statusMsg", $msg, time() + 3);
}

function register()
{
  $username = $_POST['username'] ?? false;
  $password = $_POST['password'] ?? false;

  if (!$username || !$password) {
    echo "Need username and password";
    return;
  }

  global $con;

  $query = <<<QUERY
    INSERT INTO session_user (username, password) VALUE (:uname , :pword)
    QUERY;

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $stm = $con->prepare($query);

  $stm->bindParam(":uname", $username);
  $stm->bindParam(":pword", $hashedPassword);

  if ($stm->execute()) {
    loginSuccess([
      'id' => $con->lastInsertId(),
      'username' => $username,
      'admin' => false
    ]);
  } else {
    redirect("index.php");
  }
}

function login()
{
  $username = $_POST['username'] ?? false;
  $password = $_POST['password'] ?? false;

  if (!$username || !$password) {
    echo "Need username and password";
    return;
  }

  global $con;

  $query = <<<QUERY
  SELECT id, username, password, last_login, admin 
  FROM session_user 
  WHERE username = :uname
  QUERY;

  $stm = $con->prepare($query);

  $stm->bindParam(":uname", $username);

  if ($stm->execute()) {
    if ($user = $stm->fetch(PDO::FETCH_ASSOC)) {
      // Found a user
      if (password_verify($password, $user['password'])) {
        // Login successful
        loginSuccess($user);
      } else {
        setStatusMessage("Bad Credentials");
      }
    } else {
      setStatusMessage("Bad Credentials");
    }
  } else {
    // Something went wrong with the DB
    setStatusMessage("Bad Credentials");
  }
}
function logout()
{
  session_start();
  session_destroy();
  redirect("index.php");
}

function loginSuccess($user)
{
  global $con;

  // Update the last_login
  $query = "UPDATE session_user SET last_login = UTC_TIMESTAMP() WHERE id = :uid";

  $stm = $con->prepare($query);
  $stm->bindParam(':uid', $user['id']);

  if ($stm->execute()) {
    echo 'good';
  } else {
    echo 'bad';
  }

  session_start();
  $_SESSION['userId'] = $user['id'];
  $_SESSION['username'] = $user['username'];
  $_SESSION['admin'] = $user['admin'];
  if ($_SESSION['admin']) {
    redirect("admin.php");
  } else {
    redirect("jokes.php");
  }
}
