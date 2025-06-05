<!DOCTYPE html>
<html>
    <head>
        <?php
            if(isset($POSTID) == false){
                $POSTID=1;
            }
            $users = json_decode(file_get_contents('users.json'), true);
            $posts = json_decode(file_get_contents('posts.json'), true);
        ?>
    </head>
        <div class="post_header">
            <img class="user_icon" src="<?php echo $users[$posts[$POSTID]['poster_id']]['profile_pic']?>" title="Войти" alt="Oops"/>
            <img class="edit_icon" src="images/redact.PNG" title="Войти" alt="Oops" />
            <div class="user_nickname">
                <?php echo $users[$posts[$POSTID]['poster_id']]['name']?>
            </div>
        </div>
        <div class="post_image_section">
            <img class="post_image" src="<?php echo $posts[$POSTID]['post_images']['1']?>" title="Войти" alt="Oops"/>
            <span class="image_count">
                1/<?php echo count($posts[$POSTID]['post_images']) ?>
            </span>
            <img class="arrow_right" src="images/arrow_right.PNG" title="Войти" alt="Oops"/>
        </div>
        <div>
            <button class="like_button" type="button">
                <img class="like_image" src="images/heart.PNG" title="Войти" alt="Oops"/>
                <div class="like_count">
                    <?php echo $posts[$POSTID]['likes_amount']?>
                </div>
            </button>
        </div>
        <div class="post_text">
            <?php echo $posts[$POSTID]['post_text']?>
        </div>
        <div class="show_more_text_button">
            ещё
        </div>
        <div class="time_passed_since_posting">
            <?php
                if (ValidateDate(date('d.m.y',$posts[$POSTID]['post_time']))){
                    $interval=time()-$posts[$POSTID]['post_time'];
                    if ($interval >= 60){
                        if ($interval >= 3600){
                            if ($interval >= 86400){
                                if($interval >= 604800){
                                    echo date('d.m.y', $posts[$POSTID]['post_time']);
                                } else {
                                    echo (int)($interval / 60 / 60 / 24) . ' дней назад';
                                }
                            } else {
                            echo (int)($interval / 60 / 60) . ' часов назад';
                            }
                        } else {
                            echo (int)($interval / 60) . ' минут назад';
                        }
                    } else {
                        echo $interval . ' секунд назад';
                    }
                } else {
                    echo 'Error';
                };
            ?>
        </div>
    </body>
</html>