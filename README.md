bbStats v2 - released DERP

A stats webapp for the Bukkit Minecraft server mod, powered by the BigBrother plugin

Developed by Florian Piesche, florian.piesche@gmail.com

REQUIREMENTS: A web server running PHP 5.0.0+ including SQLite3/MySQL module (depending on which db system you use). NOTE: SQLite3 requires at least PHP 5.3.0, MySQL is available right from PHP 4.

ALSO NOTE that CentOS (and possibly Fedora) does not include database modules in the standard PHP package - please contact your web host or distribution vendor for help installing these.


--- BASIC SETUP ---

Edit config_base.php to match your server and BigBrother database setup. Copy the contents of the bbStats directory to your web space and open index.php in a browser. That's it! If you've done something obvious wrong, opening the index.php will throw up an error message that should point you in the right direction.


--- CUSTOM AWARDS/STATS ---

Custom awards and random stats can be added by editing config_awards.php and config_randomstats.php files. The files should be relatively self explanatory. Once you've created your custom award or stat, add it to the "active" lists defined at the top of these files.

Block types are mapped 1:1 to Minecraft Data Values (http://www.minecraftwiki.net/wiki/Data_values), but for your convenience there are constants defined in block_constants.php. These include "nice" names for the normal blocks as well as several groups (which are just normal block IDs in a comma separated list).

Actions are defined by BigBrother and, again, mapped to "nice" names in constants.php.

PLEASE NOTE: the "prefix" value for random stats is currently unused. I would also recommend defining values you don't use in your award/stat as either empty ('') or NULL.


The _art folder contains base image files in .png format for Award icon backgrounds.

If you come up with a particularly cool random stat or award, let me know and I'll add it to the base distribution!