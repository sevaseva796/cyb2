<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Зарегистрироваться</title>
</head>
<body>
    <a href="index1.html">Индекс</a> <br />
    <h1>Регистрация</h1>
    <h4>Введите имя пользователя и пароль для создания аккаунта</h4>
    <form method="post" action="do_register.php">
       
        <h3>Имя пользователя:</h3>
        <input type="text" name="username"/> <br />
        <h3>Пароль:</h3>
        <input type="password" name="pwd"/> <br />
        <button>Зарегистрироваться</button>
    </form>    
</body>
</html>