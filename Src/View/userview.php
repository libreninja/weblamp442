<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
    
        <title>User home</title>
        
    </head>
    <body>
    <h1>Welcome, <?php echo $first. " ". $last; ?></h1>
    <form class="postsForm" action="Bootstrap.php" method="post">
    <h2>Your posts...</h2>
    <ul>
<?php 
foreach($posts as $post)
{
    echo "<li>". $post->getTitle()
        . "<button type='submit' name='userpost' value='"
        . $post->getId(). "'>view</button></li>";
}
?>
    </ul>
    <input type="submit" name="userpost" value="New Post">
    </form>
</body>

</html>
