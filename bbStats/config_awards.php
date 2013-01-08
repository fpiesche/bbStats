<?php

// Awards.
define("ACTIVE_AWARDS",		"DIGGER,BUILDER,LANDSCAPER,MINER,FINGERS,STRANGELOVE,FARMER,HIPPIE,LUMBERJACK,POTTER,CHATTERBOX,MRMODEM,BUTTONS,GRAFFITIARTIST,VANDAL");

define("AWARDNAME_DIGGER",	"Digger");
define("AWARDICON_DIGGER",	"images/awards/digger.png");
define("AWARDTEXT_DIGGER",	" has dirt on everyone.");
define("AWARDACTION_DIGGER",	BLOCK_BROKEN);
define("AWARDTYPE_DIGGER",	NULL);
define("AWARDSORT_DIGGER",	"top");

define("AWARDNAME_BUILDER",	"Builder");
define("AWARDICON_BUILDER",	"images/awards/builder.png");
define("AWARDTEXT_BUILDER",	" praises the Master Builder!");
define("AWARDACTION_BUILDER",	BLOCK_PLACED);
define("AWARDTYPE_BUILDER",	CRAFTED_BLOCKS);
define("AWARDSORT_BUILDER",	"top");

define("AWARDNAME_LANDSCAPER",	"Landscaper");
define("AWARDICON_LANDSCAPER",	"images/awards/landscaper.png");
define("AWARDTEXT_LANDSCAPER",	" has a very nice garden.");
define("AWARDACTION_LANDSCAPER",	BLOCK_PLACED);
define("AWARDTYPE_LANDSCAPER",	NATURAL_BLOCKS);
define("AWARDSORT_LANDSCAPER",	"top");

define("AWARDNAME_MINER",	"Miner");
define("AWARDICON_MINER",	"images/awards/miner.png");
define("AWARDTEXT_MINER",	" is a major miner.");
define("AWARDACTION_MINER",	BLOCK_BROKEN);
define("AWARDTYPE_MINER",	ORE_BLOCKS);
define("AWARDSORT_MINER",	"top");

define("AWARDNAME_FINGERS",	"Fingers");
define("AWARDICON_FINGERS",	"images/awards/fingers.png");
define("AWARDTEXT_FINGERS",	" has their hands on many chests.");
define("AWARDACTION_FINGERS",	DELTA_CHEST);
define("AWARDTYPE_FINGERS",	NULL);
define("AWARDSORT_FINGERS",	"top");

define("AWARDNAME_STRANGELOVE",	"Strangelove");
define("AWARDICON_STRANGELOVE",	"images/awards/strangelove.png");
define("AWARDTEXT_STRANGELOVE",	" learned to stop worrying and love the Bomb.");
define("AWARDACTION_STRANGELOVE",	BLOCK_PLACED);
define("AWARDTYPE_STRANGELOVE",		BLOCK_TNT);
define("AWARDSORT_STRANGELOVE",	"top");

define("AWARDNAME_FARMER",	"Farmer");
define("AWARDICON_FARMER",	"images/awards/farmer.png");
define("AWARDTEXT_FARMER",	" ensures everyone's well fed.");
define("AWARDACTION_FARMER",	BLOCK_BROKEN);
define("AWARDTYPE_FARMER",	PLANT_BLOCKS);
define("AWARDSORT_FARMER",	"top");

define("AWARDNAME_HIPPIE",	"Hippie");
define("AWARDICON_HIPPIE",	"images/awards/hippie.png");
define("AWARDTEXT_HIPPIE",	" loves plants, dude. They're our future.");
define("AWARDACTION_HIPPIE",	BLOCK_PLACED);
define("AWARDTYPE_HIPPIE",	PLANT_BLOCKS);
define("AWARDSORT_HIPPIE",	"top");

define("AWARDNAME_LUMBERJACK",	"Lumberjack");
define("AWARDICON_LUMBERJACK",	"images/awards/lumberjack.png");
define("AWARDTEXT_LUMBERJACK",	" is okay.");
define("AWARDACTION_LUMBERJACK",	BLOCK_BROKEN);
define("AWARDTYPE_LUMBERJACK",	BLOCK_WOOD);
define("AWARDSORT_LUMBERJACK",	"top");

define("AWARDNAME_POTTER",	"Feet of Clay");
define("AWARDICON_POTTER",	"images/awards/potter.png");
define("AWARDTEXT_POTTER",	" has been looking for that stuff.");
define("AWARDACTION_POTTER",	BLOCK_BROKEN);
define("AWARDTYPE_POTTER",	BLOCK_CLAY);
define("AWARDSORT_POTTER",	"top");

define("AWARDNAME_CHATTERBOX",	"Chatterbox");
define("AWARDICON_CHATTERBOX",	"images/awards/chatterbox.png");
define("AWARDTEXT_CHATTERBOX",	" is always happy to stop and chat.");
define("AWARDACTION_CHATTERBOX",	CHAT);
define("AWARDTYPE_CHATTERBOX",	NULL);
define("AWARDSORT_CHATTERBOX",	"top");

define("AWARDNAME_MRMODEM",	"Mr. Modem");
define("AWARDICON_MRMODEM",	"images/awards/mrmodem.png");
define("AWARDTEXT_MRMODEM",	" blames it on the lag.");
define("AWARDACTION_MRMODEM",	LOGIN,DISCONNECT);
define("AWARDTYPE_MRMODEM",	NULL);
define("AWARDSORT_MRMODEM",	"top");

define("AWARDNAME_NOLIFER",	"Nolifer");
define("AWARDICON_NOLIFER",	"images/awards/nolifer.png");
define("AWARDTEXT_NOLIFER",	" does this a lot.");

define("AWARDNAME_BUTTONS",	"Three Year Old");
define("AWARDICON_BUTTONS",	"images/awards/buttons.png");
define("AWARDTEXT_BUTTONS",	" is cute as a button. Or a lever.");
define("AWARDACTION_BUTTONS",	BUTTON_PRESS,LEVER_SWITCH);
define("AWARDTYPE_BUTTONS",	NULL);
define("AWARDSORT_BUTTONS",	"top");

define("AWARDNAME_GRAFFITIARTIST",	"Graffiti Artist");
define("AWARDICON_GRAFFITIARTIST",	"images/awards/graffiti.png");
define("AWARDTEXT_GRAFFITIARTIST",	" is very helpful.");
define("AWARDACTION_GRAFFITIARTIST",	CREATE_SIGN_TEXT);
define("AWARDTYPE_GRAFFITIARTIST",	NULL);
define("AWARDSORT_GRAFFITIARTIST",	"top");

define("AWARDNAME_VANDAL",	"Vandal");
define("AWARDICON_VANDAL",	"images/awards/vandal.png");
define("AWARDTEXT_VANDAL",	" likes to guide people astray.");
define("AWARDACTION_VANDAL",	DESTROY_SIGN_TEXT);
define("AWARDTYPE_VANDAL",	NULL);
define("AWARDSORT_VANDAL",	"top");

define("AWARDNAME_PYRO",	"Pyro");
define("AWARDICON_PYRO",	"images/awards/pyro.png");
define("AWARDTEXT_PYRO",	" made them worse... or better?");
define("AWARDACTION_PYRO",	FLINT_AND_STEEL);
define("AWARDTYPE_PYRO",	NULL);
define("AWARDSORT_PYRO",	"top");

?>