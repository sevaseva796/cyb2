<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтверждение регистрации</title>
</head>
<body>
    <?php
        $username = $_REQUEST["username"];
        $password = $_REQUEST["pwd"];

        $hash = hash("sha256",$password);
        
        //защищенный вход в базу данных
        include("../../params/billing.php");
        $conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
                       
        $checkLogin = "SELECT * FROM users WHERE Login=?  ";

        $statement = mysqli_prepare($conn, $checkLogin);
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        $cursor = mysqli_stmt_get_result($statement); 
        $result = mysqli_fetch_all($cursor); 
        mysqli_close($conn);
        
    
        if (count($result) == 0){ 
            $conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
            $sql = "INSERT INTO users (Login,Pwdhash) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hash);
            $stmt->execute();
            mysqli_close($conn);
            echo "<h3>$username успешно зарегистрирован</h3>";
            echo "<h5>Перенаправляем на главную страницу</h5>";
            $_SESSION["user"] = $username;
            echo '<meta http-equiv="refresh" content="2; URL=index1.html"> ';
            }  
            else {
            echo "<h1>Извините!</h1>";
            echo "Это имя пользователя занято. Введите другое имя пользователя.";
            echo '<meta http-equiv="refresh" content="3; URL=register.php"> ';
            }
        
    ?>
    <br />
</body>
</html>