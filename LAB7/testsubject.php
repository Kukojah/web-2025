<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="styles/font.css" type="text/css" rel="stylesheet"/>
        <link href="styles/blank_post.css" type="text/css" rel="stylesheet"/>
        <?php
            $post_block = file_get_contents('blank_post.php');
            $users = json_decode(file_get_contents('users.json'), true);
            $posts = json_decode(file_get_contents('posts.json'), true);
        ?>
    </head>
    <body>
        <?php
            $shownposts=[];
            for ($i=0; $i <= 3; $i++){
            do {
                $POSTID = rand(0, 11);
                
            } while( in_array($POSTID, $shownposts) == true);
            array_push($shownposts, $POSTID);
            include 'blank_post.php';
            }
        ?>
    </body>
</html>