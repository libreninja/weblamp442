<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="Src/View/css/login.css" type="text/css" />
        <title>Sign up</title>

    </head>
    <body>
    <?php     
    if(isset($_SESSION['last error']))
    {
        echo "Error: ". $_SESSION['last error'];
        unset($_SESSION['last error']);
    }
    include 'signup.php';
    ?>

    </body>

</html>
