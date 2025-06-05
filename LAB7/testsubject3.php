<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php 
        require('validation.php');
        
        $tests = json_decode(file_get_contents('tests.json'), true);

        echo $tests[0]['id'] . ' ' . $tests[0]['hot'];
        ?>
        <form action="testsubject3receiver">
        <p><input name="login" /> <input type="password" name="pass" /></p>
        <p><input type="submit"></p>
        </form>
    </body>
</html>