<?php
define('DBHOST', 'localhost');
define('DBNAME', 'stocks');
define('DBUSER', 'root');
define('DBPASS', '');
//define('DBCONNSTRING', 'sqlite:./databases/art.db');
define('DBCONNSTRING', "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");
