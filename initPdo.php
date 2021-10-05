<?php

/**
 * PDOの初期化を行い、PDOインスタンスを作成する
 * 
 * @return PDO
 */

function initPdo(): PDO
{
    $dsn = 'mysql:dbname=blog;host=localhost;charset=utf8';
    $user = 'root';
    $password = '.ct6yQ-R*H2l8Baz';

    $pdo = new PDO($dsn, $user, $password);
    return $pdo;
}
