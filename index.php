<?php
require_once(__DIR__ . '/Dao/UserDao.php');
require_once(__DIR__ . '/Dao/BlogDao.php');
require_once(__DIR__ . '/Lib/Redirect.php');

session_start();

$userId = $_SESSION['user']['id'] ?? null;
$userName = $_SESSION['user']['name'] ?? 'ゲスト';


try {
    // TODO: 誰のブログとか関係なく、全件取得でOKです！
    $blogDao = new BlogDao;
    $blogList = $blogDao->findAll($userId);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>blog</title>
</head>

<body>
    <header class="page-header wrapper">
        <h2>こんにちは<?php echo $userName; ?>さん</h2>
        <nav>
            <ul class="main-nav">
                <?php if (is_null($userId)) : ?>
                    <li><a href="loginHome.php">ログイン</a></li>
                <?php else : ?>
                    <li><a href="mypage.php">マイページ</a></li>
                    <li><a href="logout.php">ログアウト</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- TODO 検索ボタン実装 -->
        <form action="seach.php" method="GET">
            <input type="seach" name="seach" placeholder="キーワードから検索">
            <input type="submit" name="submit" value="検索">
        </form>
        <?php if ($blogList != null) : ?>
            <?php foreach ($blogList as $blog) : ?>
                <?php $blog['title'] ?>
                <?php $blog['contents'] ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </header>
</body>

</html>