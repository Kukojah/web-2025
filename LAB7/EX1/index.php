<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Логин</title>
    </head>
    <body>
        <?php
            
            $E=file_get_contents('users.json');
            $username=json_decode($E, true);
            echo $username[0]["name"];
            unset($username[0]["birthday"]);
            $gogoback=json_encode($username);
            file_put_contents('addstuff.json', $gogoback);
        ?>
    </body>
</html>