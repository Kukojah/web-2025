<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="styles/font.css" type="text/css" rel="stylesheet"/>
        <link href="styles/blank_image.css" type="text/css" rel="stylesheet"/>
        <?php
            if(isset($_GET['USERID'])){
                $USERID=$_GET['USERID'];
            } else {
                $USERID = 0;
            }
            if(isset($_GET['POSTID'])){
                $POSTID=$_GET['POSTID'];
            }
            if(isset($_GET['ImageNumber'])){
                $ImageNumber=$_GET['ImageNumber'];
            }
            $users = json_decode(file_get_contents('users.json'), true);
            $posts = json_decode(file_get_contents('posts.json'), true);
        ?>
    </head>
    <body>
        <?php
            foreach($posts as $value){
                if ($value['poster_id'] == $USERID) {
                    $POSTID=$value['id'];
                    foreach($value['post_images'] as $key => $imagenum){
                        $ImageNumber=$key;
                        include 'blank_image.php';
                    }
                }
            }
            
            echo '</br>';

            foreach($posts as $value){
                if ($value['poster_id'] == $USERID) {
                    $POSTID=$value['id'];
                    include 'blank_post.php';
                }
            }
        ?>
    </body>
</html>
    