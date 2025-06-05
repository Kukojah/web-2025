<!DOCTYPE html>
<html>
    <head>
        <?php
            if(isset($POSTID) == false){
                $POSTID=1;
            }
            if(isset($ImageNumber) == false){
                $ImageNumber=1;
            }
            $users = json_decode(file_get_contents('users.json'), true);
            $posts = json_decode(file_get_contents('posts.json'), true);
        ?>
    </head>
    <body>
        <img class="blank_image" src="<?php echo $posts[$POSTID]['post_images'][$ImageNumber]?>" title="Войти" alt="Oops"/>
    </body>
</html>
    