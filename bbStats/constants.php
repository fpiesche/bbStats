<?php
// Version number.
define("BBSTATS_VERSION",	1);

// Actions. Taken from BigBrother plugin source.
define("BLOCK_BROKEN",		0);
define("BLOCK_PLACED",		1);
define("DESTROY_SIGN_TEXT",	2);
define("TELEPORT",		3);
define("DELTA_CHEST",		4);
define("COMMAND",		5);
define("CHAT",			6);
define("DISCONNECT",		7);
define("LOGIN",			8);
define("DOOR_OPEN",		9);
define("BUTTON_PRESS",		10);
define("LEVER_SWITCH",		11);
define("CREATE_SIGN_TEXT",	12);
define("LEAF_DECAY",		13);
define("FLINT_AND_STEEL",	14);
define("TNT_EXPLOSION", 	15);
define("CREEPER_EXPLOSION",	16);
define("MISC_EXPLOSION",	17);
define("OPEN_CHEST",		18);
define("BLOCK_BURN",		19);

define("PLAYERS_ENVIRONMENT",	"Environment");

// Error codes and messages.
define("E_PLAYERUNKNOWN_TITLE",	"Unknown player");
define("E_PLAYERUNKNOWN_MSG",	"This player does not exist in the database. Please <a href='index.php'>return to the main stats page</a> and try again.");
define("E_PLAYERNULL_TITLE",	"No player name given");
define("E_PLAYERNULL_MSG",	"The player stats page was opened without giving a player name. Please <a href='index.php'>return to the main stats page</a> and try again.");
define("E_DBTIMEOUT_TITLE",	"Database timeout");
define("E_DBTIMEOUT_MSG",	"The database did not respond to requests in time. Please <a href='javascript:history.back'>try again</a> or inform the server administrators so this can be looked into.");
define("E_NODBSETUP_TITLE",	"Database not set up");
define("E_NODBSETUP_MSG",	"There is no database connection set up. Please inform the server administrators that database information needs to be entered in bbStats' config.php.");
define("E_DBOPENFAILURE_TITLE",	"Database connection failed");
define("E_DBOPENFAILURE_MSG",	"bbStats could not connect to the database. Please inform the server administrators so they can investigate.");
define("E_MYSQLNOTLOADED_TITLE","MySQL Extension not loaded");
define("E_MYSQLNOTLOADED_MSG","Your database is set up to use MySQL; however the MySQL extension is not loaded in your PHP configuration. If your web server is running on CentOS or Fedora, you may have to install a separate package for this; please check with your web host or distribution vendor for help.");
define("E_NOMYSQLBUTSQLITE3_TITLE","MySQL Extension not loaded");
define("E_NOMYSQLBUTSQLITE3_MSG","Your database is set up to use MySQL but the MySQL extension for PHP is not loaded in your server configuration. Please enable the MySQL extension to use bbStats with MySQL databases; if this is not possible your server has the SQLite3 extension loaded so you could switch to SQLite3 (not recommended due to severe performance issues with large databases).");
define("E_SQLITENOTLOADED_TITLE","SQLite3 Extension not loaded");
define("E_SQLITENOTLOADED_MSG","Your database is set up to use SQLite; however the SQLite3 extension is not loaded in your PHP configuration. If your web server is running on CentOS or Fedora, you may have to install a separate package for this; please check with your web host or distribution vendor for help. Please <b>also note</b> that the SQLite3 extension requires at least PHP 5.3.0, so switching BigBrother to MySQL may be the only option if you want to run bbStats. This is <i>generally recommended</i> since SQLite3 has severe performance issues on large databases.");
define("E_NOSQLITE3BUTMYSQL_TITLE","SQLite3 Extension not loaded");
define("E_NOSQLITE3BUTMYSQL_MSG","Your database is set up to use SQLite; however the SQLite3 extension is not loaded in your PHP configuration. Additionally, the MySQL extension is available on your server, so switching BigBrother and bbStats to MySQL is the recommended solution due to severe performance issues with SQLite3 on large databases.");

?>
