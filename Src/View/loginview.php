<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
    
        <title>Sign in/up</title>
        
    </head>
    <body>
    <h1>Welcome</h1>
    <form id="login" action="Bootstrap.php" method="post">
        <h2>log in</h2>
        <p>
        <label id="usernameLabel">User name</label>
        <input type="text" name="username" value=""/>
        </p>
        <p>
        <label id="passwordLabel">Password</label>
        <input type="password" name="password" value=""/>
        </p>
        <input type="submit" name="submit" value="login">
        <h2>sign up</h2>
        <input type="text" name="fname" value=""/>
        <input type="text" name="lname" value=""/>
        <input type="text" name="email" value=""/>
        <input type="password" name="password" value=""/>
        <input type="submit" name="submit" value="signup">
    </form>
    </body>

</html>
