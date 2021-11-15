<?php

// finalは継承が出来なくなる

/**
 * PDOの初期化を行うクラス
 */
final class PdoInitializer
{
    const DB_HOST = 'localhost';
    const DB_NAME = 'blog';
    const CHARSET = 'utf8';
    const DB_USER = 'root';
    const DB_PASSWORD = '.ct6yQ-R*H2l8Baz';

    /**
     * PDOの初期化を行い、PDOインスタンスを作成する
     * 
     * @return PDO
     */
    public static function handler(): PDO
    {
        return new PDO(
            self::buildDsn(),
            self::DB_USER,
            self::DB_PASSWORD
        );
    }

    /**
     * PDO用のDSNを組み立てる
     * 
     * @return string 
     */
    private static function buildDsn(): string
    {
        return sprintf(
            'mysql:dbname=%s;host=%s;charset=%s',
            self::DB_NAME,
            self::DB_HOST,
            self::CHARSET
        );
    }
}


/*
final class Person
{
    const EYE_NUM = 2;

    private $name;
    private $age;
    
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function age(): int
    {
        return $this->age;
    }

    // 静的なメソッド
    public static function outputEyeNum(): string
    {
        return '私の目の数は' . self::EYE_NUM . '個です';
    }
}

$uchida = new Person('内田', 31);
$imamurasan = new Person('今村さん', 23);

echo $uchida->name();
echo $uchida::outputEyeNum();
echo "\n";
echo $imamurasan->name();
echo $imamurasan::outputEyeNum();
echo "\n";

echo Person::EYE_NUM;

*/