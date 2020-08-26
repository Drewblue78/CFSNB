<?php

header("Content-type: application/json; charset=utf-8");

require 'db.php';

$res = new stdClass();
$res->success = false;

$action = $_POST['action'] ?? false;

switch ($action) {
  case 'register':
    register();
    break;
  case 'login':
    login();
    break;
  default:
    $res->message = "Unhandled action";
}

echo json_encode($res);

function register()
{
$username = $_POST['username'] ?? false;
$password = $_POST['password'] ?? false;

if (!$username || !$password) {
  echo "Need username and password";
  return;
}
global $con;

$query = <<<Query
$query = "INSERT INTO session_user (username, password) VALUE (:uname , :pword)"
QUERY;

$stm = $con->prepare($query);

$stm->bindParam(":uname", $username);
$stm->bindParam(":pword", $password);

$stm->execute();

function login()
{
  $username = $_POST['username'] ?? false;
  $password = $_POST['password'] ?? false;

  if (!$username || !$password) {
    echo "Need username and password";
    return;
  }
