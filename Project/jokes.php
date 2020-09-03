<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "partials/head.php"; ?>
</head>

<body>
    <?php require "partials/navbar.php" ?>
    <h1>Random Joke Jenerator</h1>
    <?php
    Jokes::randomJoke();
    if ($loggedIn) {
    }


    // $bgcolor = '#FFFFCC';
    // $textcolor = 'black';
    // $textsize = '2';


    //$nmbr = 18;

    //    $quote = $allqts[$nmbr];
    //     $author = $allqts[$nmbr];

    //     $space = "<font color=$bgcolor>.....................................<br></font>";
    //     $comments = "<br><center><font size='-2'><i><a href='jokes.php'>";

    //     echo "<center>";
    //     echo "<Font color=$textcolor size='$textsize'><i>";
    //     echo "$quote<br>";
    //     echo "</i></font>";
    //     echo "$space $author";
    //     echo "$comments";
    //     echo "</center>";


    if ($_SERVER['PHP_SELF'] == "/jokes.php") {
        show_source("jokes.php");
    }

    ?>
    <br><br><br>

    <input type="button" onclick="window.location='jokes.php'" class="Redirect" value="New Joke" />

</body>

</html>