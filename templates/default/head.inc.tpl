<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Moerkerken Tweewielers, Groot in gebruikt. Nieuwe stadsfietsen, hybrides en kinderfietsen. Uitgebreidste assortiment gebruikte fietsen in de regio. Reperatie en onderhoud.">
		<meta name="keyword" content="Moerkerken Tweewielers, Stadsfietsen, Hybrides, Kinderfietsen, Gebruikte fietsen, Reperaties, Onderhoud, Trek, Gazelle, Gaint, Cortina, Accessoires, Fietsen, Occassions">
		<title>Moerkerken Tweewielers<?=$title?></title>
		<link rel="shortcut icon" type="image/x-icon" href="http://moerkerkentweewielers.nl/favicon.ico" />

<?php
foreach ($cssFiles as $cssFile)
{
?>
		<link rel="stylesheet" type="text/css" href="http://moerkerkentweewielers.nl/css/<?=$cssFile?>">
<?php
}
?>
		<link href='//fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
<?php
foreach ($headerJsFiles as $headerJsFile)
{
?>
		<script src="http://moerkerkentweewielers.nl/js/<?=$headerJsFile?>"></script>
<?php
}
?>
	</head>
	<body>
		<div class="container-fluid">
			<div class="wrapper col-xs-12 col-sm-12 col-md-12">
				<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/header.inc.tpl")?>
				<div class="content col-xs-12 col-sm-12 col-md-12">