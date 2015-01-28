<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="keyword" content="">
		<title>Moerkerken Tweewielers<?=$title?></title>

<?
foreach ($cssFiles as $cssFile)
{
?>
		<link rel="stylesheet" type="text/css" href="css/<?=$cssFile?>">
<?
}
?>
		<link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<?
foreach ($headerJsFiles as $headerJsFile)
{
?>
		<script src="js/<?=$headerJsFile?>"></script>
<?
}
?>
	</head>
	<body>
		<div class="container-fluid">
			<div class="wrapper col-xs-12 col-sm-12 col-md-12">
				<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/header.inc.tpl")?>
				<div class="content col-xs-12 col-sm-12 col-md-12">