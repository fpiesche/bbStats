<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
include_once("constants.php");

$errorTitle=constant($_SERVER['QUERY_STRING'].'_TITLE');
$errorMessage=constant($_SERVER['QUERY_STRING'].'_MSG');

?>
<html>
<head>
  <link type="text/css" rel="stylesheet" href="main.css" /> 
  <link rel="icon" type="image/png" href="images/stats.png" />
  <title>BBStats: An error has occurred</title>
</head>
<body>
<div id="header"><div id="return"><a href="index.php"><img src="images/back.png" align="left" /></a></div>
<div id="headline">An error has occurred<img src="images/stats.png" style="margin-top: -4px;" align="right"/></div></div>

<div id="fullwidget">
	<div id="widget">
		<div id="widgetlabel">An error has occurred: <?php echo($errorTitle); ?></div>
		<div id="widgettext"><?php echo($errorMessage); ?></div>
	</div>
</div>	

</body>
</html>