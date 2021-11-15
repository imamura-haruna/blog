<?php
require_once(__DIR__ . '/Lib/Redirect.php');

session_start();

$userId = $_SESSION['user']['id'] ?? null;

if (!is_null($userId)) {
    Redirect::handler('/blog/index.php');
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="GET">
        <input type="email" name="email" placeholder="address">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Login">
    </form>
    <a href="signup.php">アカウントを作る</a>
    <a href="index.php">トップページ</a>
</body>

</html>