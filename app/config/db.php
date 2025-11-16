<?php
//----------------------------------------------------------------
// idiomにてデータベース接続
//----------------------------------------------------------------
ORM::configure('mysql:host=mysql1026.db.sakura.ne.jp;port=3306;dbname=sufida_demo_system_01');
ORM::configure('username', 'sufida');
ORM::configure('password', '4g5g676htr');
ORM::configure('driver_options', [
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
PDO::ATTR_EMULATE_PREPARES => false,
PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
]);
?>