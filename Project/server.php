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
  case 'addJoke':
    addJoke();
    break;
  case 'vote':
    vote();
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

function addJoke()
{
  session_start();
  $joke = $_POST['joke'] ?? false;
  $punchline = $_POST['punchline'] ?? false;
  $userId = $_SESSION['userId'] ?? false;
  if (!$joke || !$punchline || !$userId) {
    setStatusMessage("Need a joke and a punchline");
    redirect("addJoke.php");
    return;
  }

  global $con;

  $query = <<<QUERY
    INSERT INTO session_jokes 
    (content, punchline, user_id, posted_on) 
    VALUE (:joke , :pline, :uid, now())
  QUERY;
  $stm = $con->prepare($query);

  $stm->bindParam(":joke", $joke);
  $stm->bindParam(":pline", $punchline);
  $stm->bindParam(":uid", $userId);
  if ($stm->execute()) {
    redirect("index.php");
  } else {
    redirect("addJoke.php");
    setStatusMessage("Something went wrong with the database");
  }
}

function vote()
{
  session_start();
  $user_id = $_SESSION['user_id'] ?? false;
  $joke_id = $_POST['joke_id'] ?? false;
  $vote = $_POST['vote'] ?? false;
  if (!$user_id || !$joke_id || !$vote) {
    redirect("index.php");
    return;
  }

  global $con;

  $query = <<<QUERY
    INSERT INTO joke_vote 
    (user_id, joke_id, vote) 
    VALUE (:uid, :jokeid, :vote)
  QUERY;
  $stm = $con->prepare($query);

  $stm->bindParam(":joke_id", $joke_id);
  $stm->bindParam(":user_id", $user_id);
  $stm->bindParam(":vote", $vote);
  if ($stm->execute()) {
    redirect("index.php");
    setStatusMessage("+ Vote");
  } else {
    redirect("index.php");
    setStatusMessage("Something went wrong with the database");
  }
}
