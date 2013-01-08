<?php

include_once 'constants.php';
include_once 'block_constants.php';
include_once 'config_awards.php';

function getAwardData($db,$award) {
  $filter='';
  $limit=1;
  $award=strtoupper($award);
  $awardArray['name']=constant('AWARDNAME_'.$award);
  $awardArray['icon']=constant('AWARDICON_'.$award);
  $awardArray['text']=constant('AWARDTEXT_'.$award);
  $awardArray['player']='';
  $awardType=constant('AWARDTYPE_'.$award);

  // limit number of results checked for large databases
  if(STATLIMIT_ENTRIES!=0) { $limit=STATLIMIT_ENTRIES; }
  if(STATLIMIT_DAYS!=0) { $now=time(); $filter=' AND date>'.$now-(STATLIMIT_DAYS*24*60*60); }

  // determine sorting
  if (constant('AWARDSORT_'.$award)=='bottom') { $sort='COUNT(player) ASC'; }
  else { $sort='COUNT(player) DESC'; }

  // Untyped award?
  if($awardType==NULL) {
    $tempArray=array();
    $tempArray[0]=getWorldInfo($db,'player','action='.constant('AWARDACTION_'.$award).$filter,'player',$sort,$limit);
    if (count($tempArray[0])>0) { $awardArray['player']=$tempArray[0][0][0]; }
  }

  // Award has block type association
  else {
    $tempArray=array();
    $tempArray=getWorldInfo($db,'player','action IN ('.constant('AWARDACTION_'.$award).') AND type IN ('.constant('AWARDTYPE_'.$award).')'.$filter,'player',$sort,$limit);
    if (count($tempArray)>0) { $awardArray['player']=$tempArray[0][0]; }
  }
  return $awardArray;
}

function getAwardHTML($db,$awards) {
  $count=0;
  $allAwards=explode(",",$awards);
  $activeAwards=count($allAwards);
  $awardHTML='';
  while($count<$activeAwards) {
    $awardHTML=$awardHTML.awardBadge($db,$allAwards[$count]);
    $count++;
  }
  $awardHTML='<span id="allAwards">'.$awardHTML.'</div>';
  if($activeAwards%2!=0) { $awardHTML=$awardHTML.'<div id="awardBadgeFiller">&nbsp;</div>'; }
  return $awardHTML;
}

function checkAwards($db,$playerName) {
  $awardsList='';
  $allAwards=explode(',',ACTIVE_AWARDS);
  $counter=0;
  while($counter<count($allAwards)) {
    $currentAward=getAwardData($db,$allAwards[$counter]);
    if(strtolower($currentAward['player'])==strtolower($playerName)) {
      if($awardsList=='') { $awardsList=$awardsList.$allAwards[$counter]; }
      else { $awardsList=$awardsList.','.$allAwards[$counter]; }
    }
    $counter++;
  }
  return $awardsList;
}

function awardBadge($db,$award) {
  $awardData=getAwardData($db,$award);
  if($awardData['player']==''){ return('<div id="awardBadgeLocked"><img src="images/awards/awardLocked.png" alt="Locked Award" /><div id="awardText"><span id="awardTitle">Locked Award - </span><span id="awardDescription">Nobody has unlocked this yet. Ooooh!</span></div></div>'); }
  else return('<div id="awardBadge"><img src="'.$awardData['icon'].'" alt="'.$awardData['name'].'" /><div id="awardText"><span id="awardTitle">'.$awardData['name'].' - </span><span id="awardDescription"><a href="player.php?'.$awardData['player'].'">'.$awardData['player'].'</a>'.$awardData['text'].'</span></div></div>');
}

?>
