<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'partials/head.php'; ?>
</head>

<body>
    <?php require "partials/navbar.php" ?>
    <h1>Home</h1>
    <div class="center">
        <div class="contain">
            <?php Jokes::listJokes(); ?>

        </div>
    </div>
</body>

</html>