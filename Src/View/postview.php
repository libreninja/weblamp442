<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
    
        <title>Post</title>
        
    </head>
    <body>
    <h1>Post: <?php echo $_PostTitle; ?></h1>
    <textarea name="post" rows="20" cols="50"><?php echo $_PostText; ?></textarea>
    <?php
    if(!empty($_PostStats))
    {
        echo "<h2>Word Frequencies</h2>";
        echo "<ul>";
        foreach($_PostStats as $word => $count)
        {
            echo "<li>". $word. " - ". $count. "</li>";
        }
        echo "</ul>";
    }
    ?>
    </body>

</html>
