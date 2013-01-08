<?php

define("ACTIVE_PLAYERSTATS",	"BLOCKSBROKEN,BLOCKSPLACED,CRAFTSPLACED,CRAFTSBROKEN,PLANTSPLACED,PLANTSBROKEN,TORCHESPLACED,IRONMINED,GOLDMINED,DIAMONDMINED,BUTTONS,LEVERS");
define("ACTIVE_RANDOMSTATS",	ACTIVE_PLAYERSTATS.",CREEPERBLOCKS");

define("RS_TEXT_BLOCKSBROKEN",	"blocks have been broken");
define("RS_ACTION_BLOCKSBROKEN",BLOCK_BROKEN);
define("RS_TYPE_BLOCKSBROKEN",	"");
define("RS_PREFIX_BLOCKSBROKEN","");

define("RS_TEXT_BLOCKSPLACED",	"blocks have been placed");
define("RS_ACTION_BLOCKSPLACED",BLOCK_PLACED);
define("RS_TYPE_BLOCKSPLACED",	"");
define("RS_PREFIX_BLOCKSPLACED","");

define("RS_TEXT_CREEPERBLOCKS",	"blocks were destroyed by creepers");
define("RS_ACTION_CREEPERBLOCKS",CREEPER_EXPLOSION);
define("RS_TYPE_CREEPERBLOCKS",	"");
define("RS_PREFIX_CREEPERBLOCKS","");

define("RS_TEXT_CRAFTSPLACED",	"crafted blocks have been placed");
define("RS_ACTION_CRAFTSPLACED",BLOCK_PLACED);
define("RS_TYPE_CRAFTSPLACED",	CRAFTED_BLOCKS);
define("RS_PREFIX_CRAFTSPLACED","");

define("RS_TEXT_CRAFTSBROKEN",	"crafted blocks have been broken");
define("RS_ACTION_CRAFTSBROKEN",BLOCK_BROKEN);
define("RS_TYPE_CRAFTSBROKEN",	CRAFTED_BLOCKS);
define("RS_PREFIX_CRAFTSBROKEN","");

define("RS_TEXT_PLANTSPLACED",	"plants have been placed");
define("RS_ACTION_PLANTSPLACED",BLOCK_PLACED);
define("RS_TYPE_PLANTSPLACED",	PLANT_BLOCKS);
define("RS_PREFIX_PLANTSPLACED","");

define("RS_TEXT_PLANTSBROKEN",	"plants have been destroyed");
define("RS_ACTION_PLANTSBROKEN",BLOCK_BROKEN);
define("RS_TYPE_PLANTSBROKEN",	PLANT_BLOCKS);
define("RS_PREFIX_PLANTSBROKEN","");

define("RS_TEXT_TORCHESPLACED",	"torches have been placed");
define("RS_ACTION_TORCHESPLACED",BLOCK_PLACED);
define("RS_TYPE_TORCHESPLACED",	BLOCK_TORCH);
define("RS_PREFIX_TORCHESPLACED","");

define("RS_TEXT_IRONMINED",	"iron ore have been mined");
define("RS_ACTION_IRONMINED",	BLOCK_BROKEN);
define("RS_TYPE_IRONMINED",	BLOCK_IRONORE);
define("RS_PREFIX_IRONMINED",	"");

define("RS_TEXT_GOLDMINED",	"gold ore have been mined");
define("RS_ACTION_GOLDMINED",	BLOCK_BROKEN);
define("RS_TYPE_GOLDMINED",	BLOCK_GOLDORE);
define("RS_PREFIX_GOLDMINED",	"");

define("RS_TEXT_DIAMONDMINED",	"diamond blocks have been mined");
define("RS_ACTION_DIAMONDMINED",	BLOCK_BROKEN);
define("RS_TYPE_DIAMONDMINED",	BLOCK_DIAMONDORE);
define("RS_PREFIX_DIAMONDMINED",	"");

define("RS_TEXT_BUTTONS",	"buttons have been pressed");
define("RS_ACTION_BUTTONS",	BUTTON_PRESS);
define("RS_TYPE_BUTTONS",	"");
define("RS_PREFIX_BUTTONS",	"");

define("RS_TEXT_LEVERS",	"levers have been pulled");
define("RS_ACTION_LEVERS",	LEVER_SWITCH);
define("RS_TYPE_LEVERS",	"");
define("RS_PREFIX_LEVERS",	"");

?>