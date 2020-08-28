<nav>
    <a href="index.php">Home</a>
    <a href="jokes.php">Jokes</a>
    <?php
    session_start();
    $userid = $_SESSION['userId'] ?? false;
    $isAdmin = $_SESSION['admin'] ?? false;
    if ($userid && $isAdmin) {
        echo '<a href="admin.php">Admin</a>';
    }
    ?>
    <div id="loginbox">
        <div id="currentUser">Not Logged In</div>
        <div id="loginForm">
            <div class="notLoggedIn">
                <input id="username" value="bluedrew" />
                <input id="password" type="password" value="joan" />
                <button onclick="login()">Login</button>
                <button onclick="register()">Register</button>
            </div>
            <div class="loggedIn">
                <button onclick="logout()">Logout</button>
            </div>
            <div id="loginStatus"></div>
        </div>
    </div>
</nav>
<script>
    $('#currentUser').click(event => {
        $('#loginForm').toggleClass("visible")
    })

    function register() {
        $('div#loginStatus').text("")
        let data = {
            action: "register",
            username: $("#username").val(),
            password: $("#password").val()
        }
        $.post(SERVER, data, res => {
            if (res.success) {
                loginSuccess(res)
            } else {
                $('div#loginStatus').text(res.message)
            }
        }).fail(err => {
            $('div#loginStatus').html(err.responseText)
        })
    }

    function login() {
        $('div#loginStatus').text("")
        let data = {
            action: "login",
            username: $("#username").val(),
            password: $("#password").val()
        }
        $.post(SERVER, data, res => {
            if (res.success) {
                loginSuccess(res)
            } else {
                $('div#loginStatus').text(res.message)
            }
        }).fail(err => {
            $('div#loginStatus').html(err)
        })
    }

    function loginSuccess(user) {
        $('#currentUser').text(user.username)
        $('.notLoggedIn').hide()
        $('.loggedIn').show()
    }
</script>