<?php

require_once(__DIR__ . '/../Lib/PdoInitializer.php');
final class BlogDao
{

    private $pdo;

    public function __construct()
    {
        // TODO: PdoInitializerで書き直す
        $this->pdo = PdoInitializer::handler();
    }

    public function findAll(): array
    {
        // ヒアドキュメント
        $sql = <<<EOF
            SELECT 
                *
            FROM 
                blogs
EOF;
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute();
        $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return ($blogs === false) ? [] : $blogs;
    }
}
