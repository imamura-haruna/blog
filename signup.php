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
    <form action="storeUser.php" method="POST">
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

        <input type="hidden" name="id" value="<?php if (!empty($memo['id'])) echo (htmlspecialchars($memo['id'], ENT_QUOTES, 'UTF-8')); ?>">
        <input type="submit" value="新規会員登録">
    </form>
    <a href="loginHome.php">ログイン画面へ</a>
</body>

</html>