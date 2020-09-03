<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "partials/head.php"; ?>
</head>

<body>
    <?php require "partials/navbar.php" ?>
    <h1>Random Joke Jenerator</h1>
    <div class="center">
        <div class="contain">
            <?php Jokes::randomJoke(); ?>

        </div>
        <br><br><br>
        <input type="button" onclick="window.location='jokes.php'" class="Redirect" value="New Joke" />
    </div>





</body>

</html>