<?php
// Set SERVER_NAME to '' to hide header text entirely. Good if you want a graphical banner.
define('SERVER_NAME',		'My Minecraft Server');

// Point this to the directory your MC server resides in. Unused unless you're running SQLite.
define('SERVER_PATH',		'/opt/mcserver/');

// Currently unused, originally intended for calculating SMP world size.
define('WORLD_NAME',		'world');

// Database config! Uncomment these to use SQLite (NOT RECOMMENDED due to performance issues)
//define('DB_MODE',		'sqlite');
//define('SQLITE_DB',		SERVER_PATH.'plugins/BigBrother/bigbrother.db');

// Edit these to match your MySQL configuration.
define('DB_MODE',		'mysql');
define('MYSQL_HOST',		'localhost');
define('MYSQL_USER',		'username');
define('MYSQL_PASSWORD',	'password');
define('MYSQL_DATABASE',	'bigbrother');

// Time/DB entry limits for awards and toplists. Set to non-0 values if your database is very large and causes the bbStats index page to time out. Entries take priority over days.
define("STATLIMIT_ENTRIES",	0);
define("STATLIMIT_DAYS",	0);


// Set to 1 to enable debug mode. Will spew SQL statements and other shenanigans.
define('BBSTATS_DEBUG',		0);

?>
