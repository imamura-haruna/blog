<?php

require_once(__DIR__ . '/Lib/Redirect.php');

// session_start()してないと、$_SESSIONがnullになってしまう
session_start();

// セッションから情報を削除する
unset($_SESSION['user']);

Redirect::handler('/blog/loginHome.php');
