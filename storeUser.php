<!DOCTYPE html>
<html lang="ja">

<head>
    <?php

    require_once(__DIR__ . '/Dao/UserDao.php');
    require_once(__DIR__ . '/redirect.php');

    try {
        $inputName = filter_input(INPUT_POST, 'name');
        $inputEmail = filter_input(INPUT_POST, 'email');
        $password1 = filter_input(INPUT_POST, 'password1');
        $passwordConfirm = filter_input(INPUT_POST, 'password2');
        if ($password1 != $passwordConfirm) {
            throw new Exception('パスワードが違います');
        }
        $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);

        $userDao  = new UserDao();
        $user = $userDao->findByEmail($inputEmail);

        if (!is_null($user)) {
            throw new Exception("このアドレスは既に使われています");
        }

        $result = $userDao->insert($inputName, $inputEmail, $hashedPassword);

        if (!$result) {
            throw new Exception('保存に失敗しました');
        }

        $path = 'http://localhost/blog/index.php?email=' . $inputEmail;
        redirect($path);
    } catch (Exception $e) {
        echo $e->getMessage();
        $path = 'http://localhost/blog/signup.php';
        echo "<br>";
        echo "<a href=$path>新規作成画面へ戻る</a>";
    }
    ?>
</head>