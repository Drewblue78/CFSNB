<?php
require "./content/listJokes.php";
session_start();
$loggedIn = $_SESSION['userId'] ?? false;
$isAdmin = $_SESSION['admin'] ?? false;

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Joke Jenerator</title>

<style>
    body,
    html {
        background-color: #8aa;
        color: #fff;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    nav {
        background-color: #444;
        padding: 7px 10px;
    }

    nav a {
        text-decoration: none;
        color: #ffc;
        padding: 8px 12px;
    }

    nav a:hover {
        background-color: #567;
    }

    h1 {
        text-align: center;
    }

    div#loginbox {
        position: absolute;
        top: 0;
        right: 0;
    }

    div#loginbox input {
        display: block;
    }

    div#currentUser {
        padding: 8px 12px;
        cursor: pointer;
        -moz-user-select: none;
        user-select: none;
        -webkit-user-select: none;
        text-transform: capitalize;
    }

    div#loginForm {
        display: none;
        background-color: #444;
        padding: 5px;
    }

    div#loginForm.visible {
        display: block;
    }

    input {
        border: 2px solid grey;
        border-radius: 3px;
        margin: 5px;
        padding: 4px 12px;
    }

    div#loginStatus {
        font-weight: bold;
        color: #e32;
    }

    ul.card-list {
        padding: 10px;
        list-style-type: none;
    }

    ul.card-list li {
        background-color: #444;
        padding: 10px;
        margin: 4px 4px 12px 4px;
        position: relative;
        box-shadow: 0 0 15px #222;
    }

    ul.card-list li div {
        text-align: left;
        text-transform: capitalize;
    }

    ul.card-list li div span {
        float: right;
    }

    .contain {
        max-width: 500px;
        display: inline-block;
    }
</style>