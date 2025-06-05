<?php 

    require('validation.php');
    if (ValidateField($_GET['login'])){
        $login=$_GET['login'];
        echo $login . ' ' . strlen($login);
    } else {
        echo 'Not Set';
    }
?>