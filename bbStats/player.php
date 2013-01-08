<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
  include_once 'constants.php';
  include_once 'block_constants.php';
  include_once 'config_awards.php';
  include_once 'config_base.php';
  include_once 'support.php';
  include_once 'awards.php';

  configCheck();

  $db=openDB();

  $playerName=sanitizeParameters($_SERVER['QUERY_STRING']);
  $playerKnown=isPlayerKnown($db,$playerName);
  if ($playerKnown!="E_NOERROR") { error("$playerKnown"); }
  $randomStat=getRandomStat($db,$playerName);
// function getWorldInfo($db,$column,$filter,$group,$sort,$limit) {
  $lastLogout=getWorldInfo($db,'date','player="'.$playerName.'"','','date DESC',1);

  $time=time();
  $awards=checkAwards($db,$playerName);
  if($awards==NULL) { $awardHTML='<b>No awards yet! :(</b>'; }
  else {
    $awardHTML=getAwardHTML($db,$awards);
    $time=time()-$time;
    $awardHTML=$awardHTML.'<p align="right" style="font-size: 8pt; min-width:200px;">Took '.$time.' sec to get award list. Total active awards: '.count(explode(',',ACTIVE_AWARDS)).'</p>';

  }

  closeDB($db);

?>

<html>
<head>
  <link type="text/css" rel="stylesheet" href="main.css" /> 
  <link rel="icon" type="image/png" href="images/stats.png" />
  <title>Statistics for <?php echo($playerName); ?></title>
</head>
<body>
<div id="header"><div id="return"><a href="index.php"><img src="images/back.png" align="left" /></a></div>
<div id="headline"><?php echo($playerName); ?>'s stats <img src="images/player-small.png" style="margin-top: -8px;" align="right"/><br /><span id="headerFootnote">Last seen: <?php echo(date('l F d Y, H:i',$lastLogout[0][0])); ?></span></div></div>
<div id="funfact"><?php echo($randomStat); ?></div>
<div id="fullwidget"><?php buildTextWidget('center',$awardHTML,'Awards'); ?></div>
<?php bbStatsFooter(); ?>
</body>
</html>
