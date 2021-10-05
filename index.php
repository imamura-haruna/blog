<?php
require_once(__DIR__ . '/initPdo.php');

try {
    $pdo = initPdo();
    $sql = 'SELECT *
        FROM blogs';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // PDO::FETCH_ASSOCについてhttps://blog.senseshare.jp/fetch-mode.html参照
    $blogList = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="style.css">
    <title>blog</title>
</head>

<body>
    <header class="page-header wrapper">
        <!-- TODO php文(name表示) -->
        <h2>こんにちは</h2>
        <nav>
            <ul class="main-nav">
                <li><a href="mypage.php">マイページ</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>
</body>

</html>