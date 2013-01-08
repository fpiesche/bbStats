<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php

  include_once 'constants.php';
  include_once 'block_constants.php';
  include_once 'awards.php';
  include_once 'support.php';
  include_once 'config_base.php';
  include_once 'config_awards.php';
  include_once 'config_randomstats.php';

  configCheck();

  $db=openDB();

  // getWorldInfo($db,$column,$filter,$group,$sort,$limit)
  // Get list of known players.
  $players = array();
  if(BBSTATS_DEBUG==1) { echo("Getting player list..."); }
  $players = getWorldInfo($db,'player','player NOT IN ("'.PLAYERS_ENVIRONMENT.'")','upper(player)','',50);
  if(BBSTATS_DEBUG==1) { echo("<pre>".var_dump($players)."</pre>"); }
  $i=0;
  while($i<count($players)) {
    $players[$i] = '<a href="player.php?'.$players[$i][0].'" alt="'.$players[$i][0].'">'.$players[$i][0].'</a>';
    $i++;
  }

  // Get HTML for award badges for all awards.

  if(BBSTATS_DEBUG==1) { echo("Getting awards..."); }
  $time=time();
  $awardHTML=getAwardHTML($db,ACTIVE_AWARDS);
  $time=time()-$time;
  $awardHTML=$awardHTML.'<p align="right" style="font-size: 8pt; min-width:200px;">Took '.$time.' sec to get award list. Total active awards: '.count(explode(',',ACTIVE_AWARDS)).'</p>';
  $brokenBlocks=getWorldInfo($db,'player,COUNT(player)','action='.BLOCK_BROKEN,'player','COUNT(player) DESC',10);
  $randomStat=getRandomStat($db,'');
  closeDB($db);

?>

<html>
<head>
  <link type="text/css" rel="stylesheet" href="main.css" /> 
  <link rel="icon" type="image/png" href="images/stats.png" />
  <title><?php echo(SERVER_NAME); ?> world statistics</title>
</head>
<body>
<div id="header"><?php bbStatsHeader(); ?></div>
<div id="funfact"><?php echo($randomStat); ?></div>
<?php buildListWidget('this',$players,'Recent Players','playerlist'); buildTextWidget('left',$awardHTML,'Awards');?>
<?php bbStatsFooter(); ?>
</body>
</html>
