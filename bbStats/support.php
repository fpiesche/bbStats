<?php

include_once 'constants.php';
include_once 'block_constants.php';
include_once 'awards.php';
include_once 'config_base.php';
include_once 'config_awards.php';
include_once 'config_randomstats.php';

// Database support functions

function openDB() {
  // open database connection. Info taken from config_base.php.
  if(DB_MODE=='sqlite') {
    $db=new SQLite3(SQLITE_DB,SQLITE3_OPEN_READONLY);
  }

  else if(DB_MODE=='mysql') {
    $db=mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD);
    mysql_select_db(MYSQL_DATABASE);
  }

  if ($db==false) { error("E_DBOPENFAILURE"); }
  return $db;
}

function closeDB($db) {
  // close database connection
  if(DB_MODE=='sqlite') {
    $db->Close();
  }

  else if(DB_MODE=='mysql') {
    mysql_close($db);
  }
}

function queryDB($db,$query) {
  // send SQL query to database. Returns array of results.
  $result=NULL;
  $resultArray= array();
  $time=time();
  $connAttempt=1;
  if(DB_MODE=='sqlite') {
    if(PHP_VERSION_ID<50303) {
      while($result==NULL | $result==FALSE) {
		if($connAttempt=1) { $result=$db->query($query); }
		if($connAttempt>3) { error("E_DBTIMEOUT"); }
		if(time()>$time+1 && $connAttempt>1) { $time=time(); $result=$db->query($query); $connAttempt++; }
	}
      }
    else {
      $timeout=$db->busyTimeout(3000);
      $result=$db->query($query);
    }

    $row=0;
    $col=0;
    while($res = $result->fetchArray(SQLITE3_NUM)) { 
      while ($col<count($res)) {
	$resultArray[$row][$col] = $res[$col];
	$col++;
      }
      $row++;
    }
    $result->finalize();
  }

  if(DB_MODE=='mysql') {
    $result=mysql_query($query,$db);
    $row=0;
    $col=0;
    while($res = mysql_fetch_array($result,MYSQL_NUM)) {
      $col=0;
      while ($col<count($res)) {
	$resultArray[$row][$col] = $res[$col];
	$col++;
      }
      $row++;
    }
    mysql_free_result($result);
  }
  return $resultArray;
}

function getWorldInfo($db,$column,$filter,$group,$sort,$limit) {
  // Main query construction function. Returns array of results.
  $resultArray=array();
  $result=array();
  $i=0;
  $columnString=$column.' ';
  if($filter!='') { $filter='WHERE '.$filter.' '; }
  if($group!='') { $group='GROUP BY '.$group.' '; }
  if($sort!='') { $sort='ORDER BY '.$sort.' '; }
  if($limit!='') { $limitString='LIMIT '.$limit; }
  if(BBSTATS_DEBUG==1) { echo('SELECT '.$columnString.'FROM bbdata '.$filter.$group.$sort.$limitString.'<br/>'); }
  $resultArray=queryDB($db,'SELECT '.$columnString.'FROM bbdata '.$filter.$group.$sort.$limitString);

  return $resultArray;
}

function getRandomStat($db,$playerName) {
  // get random stat for page header. Returns string.

  // Limit number of results searched for large databases.
  $filter='';
  $limit=1;
  if(STATLIMIT_ENTRIES!=0) { $filter=' AND id>((SELECT MAX(id) FROM bbstats)-'.STATLIMIT_ENTRIES.')'; }
  if(STATLIMIT_DAYS!=0) { $now=time(); $filter=' AND date>'.$now-(STATLIMIT_DAYS*24*60*60); }

  if($playerName=='') { $activeRandomStats=explode(',',ACTIVE_RANDOMSTATS); }
  else if ($playerName!='') { $activeRandomStats=explode(',',ACTIVE_PLAYERSTATS); }
  $numActiveStats=count($activeRandomStats);
  $numActiveStats--;
  $statToGet=$activeRandomStats[rand(0,$numActiveStats)];
  $statType=constant('RS_TYPE_'.$statToGet);
  $statAction=constant('RS_ACTION_'.$statToGet);
  if($statType!='') { $statAction=$statAction.') AND type IN ('.$statType; }
  if(BBSTATS_DEBUG==1) { echo('Getting random stat '.$statToGet).': '; }

  // Worldwide stat
  if($playerName=='') {
    $statNum=getWorldInfo($db,'COUNT(player)','action IN ('.$statAction.')'.$filter,'player','COUNT(player) DESC',$limit);
    if($statNum[0][0]=='') { $statNum[0][0]=0; }
    $statHTML='<span id="randomStatNumber">'.$statNum[0][0].'</span> '.constant('RS_TEXT_'.$statToGet);
  }
  else {
    $statNum=getWorldInfo($db,'COUNT(player)','action IN ('.$statAction.') AND player="'.$playerName.'"'.$filter,'player','COUNT(player) DESC',$limit);
    if($statNum[0][0]=='') { $statNum[0][0]=0; }
    $statHTML='<span id="randomStatNumber">'.$statNum[0][0].'</span> '.constant('RS_TEXT_'.$statToGet).' by '.$playerName;
  }

  return $statHTML;
}


// misc support functions
function sanitizeParameters($queryString) {
  // strip possible SQL injections from player.php parameter
  $param='';
  $param=filter_var($queryString,FILTER_SANITIZE_STRING);
  $param=filter_var($param,FILTER_SANITIZE_MAGIC_QUOTES);
  return $param;
}

function isPlayerKnown($db,$playerName) {
  if(BBSTATS_DEBUG==1) { echo('Verifying player name.'); }
  $isPlayerKnown=queryDB($db,'SELECT COUNT(player) FROM bbdata WHERE player="'.$playerName.'"');
  if($isPlayerKnown==NULL) { return "E_PLAYERUNKNOWN"; }
  if($playerName==NULL | $playerName==FALSE) { return "E_PLAYERNULL"; }
  return "E_NOERROR";
}

function error($error) {
  // open error page with descriptive message of what's happened
  if($error=="E_NOERROR") { return; }
  $error=sanitizeParameters($error);
  $errorURL='error.php?'.$error;
  die('<script type="text/Javascript">document.location = "'.$errorURL.'";</script>');
}

function configCheck() {
  // check various config info and return error messages on failure.
  if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);
    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
  }

  if(PHP_VERSION_ID<50000) { echo('<script type="text/Javascript">document.location = "updatePHP.html";</script>'); }
  if(DB_MODE=='mysql' && MYSQL_HOST=='MYSQL_HOST') { error(E_NODBSETUP); }
  if(DB_MODE=='sqlite' && SQLITE_DB=='SQLITE_DB') { error(E_NODBSETUP); }
  if(DB_MODE!='mysql' && DB_MODE!='sqlite') { error(E_NODBSETUP); }
  $ext_mysql=extension_loaded('mysql');
  $ext_sqlite3=extension_loaded('sqlite3');
  if(DB_MODE=='mysql' && !$ext_mysql ) {
    if($ext_sqlite3) { error(E_NOMYSQLBUTSQLITE3); }
    else { error(E_MYSQLNOTLOADED); }
  }
  if(DB_MODE=='sqlite' && !$ext_sqlite3 ) {
    if($ext_mysql) { error(E_NOSQLITE3BUTMYSQL); }
    else { error(E_SQLITENOTLOADED); }
  }
}

// HTML creation functions
function buildTextWidget( $sidebar, $content, $label ) {
  $widgetStartHTML='';
  if($sidebar=='left') { $widgetStartHTML = '<div id="sidebarleft">'; }
  if($sidebar=='right') { $widgetStartHTML = '<div id="sidebarright">'; }
  if($sidebar=='none') { $widgetStartHTML = '<div id="fullwidget">'; }
  if($sidebar=='this') { $widgetStartHTML = '<div id="sidebar">'; }
  if($label!='') { $label='<div id="widgetlabel">'.$label.'</div>'; }
  echo($widgetStartHTML.'<div id="widget">'.$label.'<div id="widgettext">'.$content.'</div></div></div>');
}

function buildTableWidget( $sidebar, $content, $label ) {
  $widgetStartHTML='';
  if($sidebar=='left') { $widgetStartHTML = '<div id="sidebarleft">'; }
  if($sidebar=='right') { $widgetStartHTML = '<div id="sidebarright">'; }
  if($sidebar=='none') { $widgetStartHTML = '<div id="fullwidget">'; }
  if($sidebar=='this') { $widgetStartHTML = '<div id="sidebar">'; }
  if($label!='') { $label='<div id="widgetlabel">'.$label.'</div>'; }
  echo($widgetStartHTML.'<div id="widget">'.$label.'<div id="widgettext"><table cellspacing="0" cellpadding="0">');

  $i=0;
  while($i<count($content)) {
    if($i%2==0) { echo('<tr id="tr-odd">'); }
    else { echo('<tr id="tr-even">'); }
    echo('<td>'.$content[$i][0].'</td><td id="td-number">'.$content[$i][1].'</tr>');
    $i++;
  }
  
  echo('</table></div></div></div></div>');
}

function buildListWidget( $sidebar, $content, $label, $style ) {
  $widgetStartHTML='';
  if($sidebar=='left') { $widgetStartHTML = '<div id="sidebarleft">'; }
  if($sidebar=='right') { $widgetStartHTML = '<div id="sidebarright">'; }
  if($sidebar=='none') { $widgetStartHTML = '<div id="fullwidget">'; }
  if($sidebar=='this') { $widgetStartHTML = '<div id="sidebar">'; }
  if($label!='') { $label='<div id="widgetlabel">'.$label.'</div>'; }
  echo($widgetStartHTML.'<div id="widget">'.$label.'<div id="widgettext"><ul id="'.$style.'">');
  $i=0;
  while($i<count($content)) {
      if($i%2==0) { echo('<li id="li-odd">'.$content[$i].'</li>'); }
      else { echo('<li id="li-even">'.$content[$i].'</li>'); }
      $i++;
    }
  echo('</ul></div></div></div></div>');
}

function bbStatsHeader() {
  if(SERVER_NAME!='') { $headerHTML=SERVER_NAME.' world stats <img src="images/stats.png" style="margin-top: -4px;" align="right"/>'; echo($headerHTML); }
  else { echo(''); }
}

function bbStatsFooter() {
  echo('<div id="footer">bbStats (c) 2011 Florian Piesche <a href="credits.php">and contributors</a>.<br /><a href="mailto:florian.piesche@gmail.com" title="[bbStats bug]">Report a bug</a></div>');
}

?>