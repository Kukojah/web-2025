<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>
            Логин
        </title>
        <link href="styles/font.css" type="text/css" rel="stylesheet"/>
        <link href="styles/login.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div class="full_form">
        <h1 class="header">
            Войти
        </h1>
        <img class="greeting_image" src="images/login.jpg" title="Войти" alt="Oops"/>
        
        <form class="login_form" action="profile" method="post">
            <label class="field_label" for="email">
                Электропочта
            </label><br/>
            <input class="field" id="email" name="EMAIL"/><br/>
            <span class="field_extra_info">
                Введите электропочту в формате *****@***.**
            </span><br/>
            <label class="field_label" for="password">
                Пароль
            </label><br/>
            <input class="field" id="submit" type="password" name="PASSWORD"/><br/>
            <button class="a_button" type="submit">
                Продолжить
            </button>
        </form>
        </div>
    </body>
</html>