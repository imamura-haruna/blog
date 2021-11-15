<?php

require_once(__DIR__ . '/../Lib/PdoInitializer.php');

final class UserDao
{

    private $pdo;

    public function __construct()
    {
        // TODO: PdoInitializerで書き直す
        $this->pdo = PdoInitializer::handler();
    }

    public function findByEmail(string $email): ?array
    {
        // ヒアドキュメント
        $sql = <<<EOF
            SELECT 
                *
            FROM 
                users
            WHERE
                email = :email
EOF;
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $result = $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($user === false) ? null : $user;
    }

    public function insert(
        string $name,
        string $email,
        string $password
    ): bool {
        $sql = <<<EOF
            INSERT INTO 
                users 
                (name, email, password)
            VALUE 
                (:name, :email, :password)
EOF;
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $result = $stmt->execute();

        return $result;
    }
}
