<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
    
        <title>User home</title>
        
    </head>
    <body>
    <h1>Welcome <?php echo $fname. " ". $lname; ?></h1>
<ul>
<?php 
foreach($posts as $post)
{
    echo "<li>". $post->getTitle(). "</li>";
}
?>
    </ul>
    </body>

</html>
