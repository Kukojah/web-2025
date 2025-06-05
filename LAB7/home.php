<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>
            Лента
        </title>
        <link href="styles/font.css" type="text/css" rel="stylesheet"/>
        <link href="styles/home.css" type="text/css" rel="stylesheet"/>
        <link href="styles/blank_post.css" type="text/css" rel="stylesheet"/>
        <?php
            ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(E_ALL);
            $users=json_decode(file_get_contents('users.json'), true);
            $posts = json_decode(file_get_contents('posts.json'), true)
        ?>
    </head>
    <body>
        <div class="sidebar">
            <img class="sidebar_icon" src="images/homepage.PNG" title="Войти" alt="Oops"/><br>
            <img class="sidebar_icon" src="images/profile_inactive.PNG" title="Войти" alt="Oops"/><br>
            <img class="sidebar_icon" src="images/new_inactive.PNG" title="Войти" alt="Oops"/>
        </div>
        <div class="main_scrollbar">
        <?php
        
            require('validation.php');
            $shownposts=[];
            If(ValidateField($_GET['USERNAME']))
            {
                $Username = $_GET['USERNAME'];
                foreach($users as $value){
                    if ($value["name"] == $Username){
                        $USERID = $value["id"];
                    }
                }
            }
            If (Isset($USERID)){
                foreach($posts as $value){
                    if ($value["poster_id"] == $USERID){
                        $POSTID = $value["id"];
                        include 'blank_post.php';   
                    }
                }
            } else {
                for ($i=0; $i <= 3; $i++){
                do {
                    $POSTID = rand(0, 11);    
                } while( in_array($POSTID, $shownposts) == true);
                array_push($shownposts, $POSTID);
                include 'blank_post.php';
            }
            }
        ?>
        </div>
    </body>
</html>