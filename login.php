<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');

session_start();

try {
    $loginEmail = filter_input(INPUT_GET, 'email');
    $loginPassword = filter_input(INPUT_GET, 'password');

    $userDao = new UserDao;
    $user = $userDao->findByEmail($loginEmail);
    if (is_null($user)) {
        throw new Exception("アドレスが間違っています");
    }

    $hashedPassword = $user['password'];
    if (!password_verify($loginPassword, $hashedPassword)) {
        throw new Exception("パスワードが間違っています");
    }

    // スーパーグローバル変数
    // ログイン情報をセッションに保存する
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['name'] = $user['name'];

    $userEmail = $user['email'];
    $path = 'http://localhost/blog/index.php?email=' . $userEmail;

    Redirect::handler($path);
} catch (Exception $e) {
    echo $e->getMessage();
    $path = 'http://localhost/blog/loginHome.php';
    Redirect::handler($path);
}


/*

class Age
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 0 || 130 < $value) {
            throw new Exception('年齢は0から130の間で指定してください');
        }
        $this->value = $value;
    }
    
    public function value(): int
    {
        return $this->value;
    }
}

$uchidaAge = new Age(31);
$uchidaAge->value();

$childAge = new Age(18);
$childAge->value();

*/