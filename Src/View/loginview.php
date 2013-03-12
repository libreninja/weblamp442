<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/login.css" type="text/css" />
        <title>Sign in/up</title>
        
    </head>
    <body>
    <h1>Welcome</h1>
    <form class="loginForm" action="Bootstrap.php" method="post">
        <h2>log in or register</h2>
        <p>
        <label for="username">Username or email</label>
        <br />
        <input type="text" name="username" />
        </p>
        <p>
        <label for="password">Password</label>
        <br />
        <input type="password" name="password" />
        </p>
        <input type="submit" name="submit" value="login" />
        <input type="submit" name="submit" value="signup" />
    </form>
    </body>

</html>
