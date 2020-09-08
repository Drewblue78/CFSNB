<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "partials/head.php" ?>
</head>
<?php
if (!$loggedIn) {
    header("Location: index.php");
    return;
}
?>

<body>
    <?php require "partials/navbar.php" ?>
    <h1>Add A Joke</h1>
    <div id="status" class="center"></div>
    <form action="server.php" method="POST" class="center">
        <input name="action" value="addJoke" type="hidden" />
        <input name="joke" required />
        <input name="punchline" required />
        <button>Add</button>
    </form>
    <div class="center">
        <div class="contain">
            <?php require "content/listUploads.php" ?>
        </div>
    </div>
    <script>
        if (cookies.statusMsg) {
            document.getElementById('status').innerText = cookies.statusMsg
        }
    </script>
</body>

</html>