<?php

require_once(__DIR__ . '/initPdo.php');

try {
    $inputName = filter_input(INPUT_POST, 'name');
    $inputEmail = filter_input(INPUT_POST, 'email');
    $password1 = filter_input(INPUT_POST, 'password1');
    $password2 = filter_input(INPUT_POST, 'password2');

    if ($password1 == $password2) {
        $inputPassword = $password1;
    } else {
        throw new Exception("Error Processing Request", );
        
    }

    $pdo = initPdo();
    $sql = 'INSERT INTO users (name, email, passwprd)
        VALUE (:name, :email, :passwprd)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $inputName, )
} catch (Exception $e) {
    $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
</head>

<body>
    <h1>新規会員登録</h1>
    <form action="signup.php" method="POST">
        <div>
            <input type="text" name="name" placeholder="User Name">
        </div>
        <div>
            <input type="email" name="email" placeholder="addless">
        </div>
        <div>
            <input type="password" name="password1">
        </div>
        <div>
            <input type="password" name="password2">
        </div>
        <input type="submit" name="submit" value="新規会員登録">
    </form>

</body>

</html>