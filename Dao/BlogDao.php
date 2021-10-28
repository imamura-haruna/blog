<?php


final class BlogDao
{

    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:dbname=blog;host=localhost;charset=utf8';
        $user = 'root';
        $password = '.ct6yQ-R*H2l8Baz';
        $this->pdo = new PDO($dsn, $user, $password);
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
