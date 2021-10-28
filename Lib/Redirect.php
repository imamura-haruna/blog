<?php

/**
 * リダイレクトを扱うクラス
 */
final class Redirect
{
    /**
     * redirect用の関数
     * ex. Redirect::handler(); execute();
     *
     * @param $string $path レダイレクト用のパス
     * @return void
     */

    public static function handler(string $path): void
    {
        header('Location: ' . $path);
        die;
    }
}
