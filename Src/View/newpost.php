<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
    
        <title>Post</title>
        
    </head>
    <body>
    <h1>New Post</h1>
    <form class="newPostForm" action="Bootstrap.php" method="post">
        <p>
        <label for="newPostTitle">Post Title</label>
        <br />
        <input type="text" name="newPostTitle" />
        <br />
        <label for="newPostText">Post:</label>
        <br />
        <textarea name="newPostText" rows="20" cols="50"></textarea>
        <br />
        <input type="submit" name="newpost" value="submit" />
    </form>
    </body>
</html>
