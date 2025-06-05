<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="styles/font.css" type="text/css" rel="stylesheet"/>
        <link href="styles/profile.css" type="text/css" rel="stylesheet"/>
        <link href="styles/blank_post.css" type="text/css" rel="stylesheet"/>
        <link href="styles/blank_image.css" type="text/css" rel="stylesheet"/>
        <?php
            require('validation.php');
            ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(E_ALL);
            $POSTID=0;
            $ImageNumber=0;
            $users = json_decode(file_get_contents('users.json'), true);
            $posts = json_decode(file_get_contents('posts.json'), true);
            $IsThere = false;
            if(ValidateField($_POST['EMAIL']) && ValidateField($_POST['PASSWORD'])){
                $email = $_POST['EMAIL'];
                $password = $_POST['PASSWORD'];
                foreach($users as $value){
                    if (($value["mail"] == $email) && $value["password"] == $password){
                        $USERID = $value["id"];
                        $IsThere = true;
                    }
                }
            } else
            {
                header('Location: login.php');
                exit( );
            }
            if ($IsThere == false){
                header('Location: login.php');
                exit( );
            }
        ?>
        <title>
            <?php
                echo $users[$USERID]['name'] . ' id ' . $users[$USERID]['id'] ;
            ?>
        </title>
    </head>
    <body>
        <div class="sidebar">
            <img class="sidebar_icon" src="images/homepage_inactive.png" title="Войти" alt="Oops"/><br>
            <img class="sidebar_icon" src="images/profile.PNG" title="Войти" alt="Oops"/><br>
            <img class="sidebar_icon" src="images/new_inactive.PNG" title="Войти" alt="Oops"/>
        </div>
        <div class="user_profile">
            <img class="user_profile_pic" src="<?php echo $users[$USERID]['profile_pic']?>" title="Войти" alt="Oops"/>
        </div>
        <p class="user_name">
            <?php
                echo $users[$USERID]['name']
            ?>
        </p><br>
        <div class="profile_description">
            <?php
                echo $users[$USERID]['profile_description']
            ?>
        </div><br>
        <div  class="user_post_list_button">
            <button class="post_list_button_look" type="button">
                <img class="post_count_icon" src="images/posts_image.png" title="Войти" alt="Oops"/>
                <span class="post_count_text">
                <?php
                    $sw=$users[$USERID]['posts_amount'] % 10;
                    echo $sw . ' ';
                    
                    if ((($users[$USERID]['posts_amount'] % 100) > 20) || (($users[$USERID]['posts_amount']  % 100) < 5)){
                        switch ($sw)
                        {
                        case 1:
                            echo 'пост';
                            break;
                        case 2 || 3 || 4:
                            echo 'поста';
                            break;
                        default:
                            echo 'постов';
                            break;
                        }
                    } else {
                        echo 'постов';
                    }
                ?>
                </span>
            </button>
        </div>
        <div class="image_gallery">
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

            
        ?>
        <?php
                foreach($posts as $value){
                    if ($value['poster_id'] == $USERID) {
                        $POSTID=$value['id'];
                        include 'blank_post.php';
                    }
                }
            ?>
        
        </div>
    </body>
</html>