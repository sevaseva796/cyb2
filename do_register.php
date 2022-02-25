<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>do_register</title>
</head>
<body>
<a href ="index1.html">Индекс</a>
    <?php
        $user = $_REQUEST['user'];
        $pwd = $_REQUEST['pwd'];
        $hash = hash("sha256", $pwd);
        include("../../params/billing.php");
      
        $conn = mysqli_connect($db_server,$db_user,$db_pwd,"billing");
    
        $sql = "INSERT INTO users( Login, Pwdhash) VALUES('$user', '$hash')";
        mysqli_query($conn,$sql);
        
        $statement = mysqli_prepare($conn, $sql);
        //mysqli_stmt_bind_param($statement,"ss",$user,$hash);
        mysqli_stmt_execute($statement);
        $cursor = mysqli_stmt_get_result($statement);
        $result = mysqli_fetch_all($cursor);

        mysqli_close($conn);
        
        if(count($result) == 0)
            echo("Такой логин уже существует!");
        else {
            echo "<h1>Регистрация прошла успешно!<h1>";
            echo "Сейчас вы будете перенаправлены на главную страницу.";
            $_SESSION["user"] = $user;
            echo '<meta http-equiv="refresh" content="2; URL=index1.html"> ';
        }
     ?>
</body>
</html> 