<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/loginCss.css">
    <script type="text/javascript" src="js/loginJs.js"></script>
</head>
<body>
    <div class="login-container">
        <form action="../controllers/loginAction.php" method="post" onsubmit="return isLoginValid(this);">
            <h2>Login</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <span id="err1" class="error"></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span id="err2" class="error"></span>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="registration.php">Register.</a></p>
    </div>
</body>
</html>
