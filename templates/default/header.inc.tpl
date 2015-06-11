<div class="header col-xs-12 col-sm-12 col-md-12">
	<div class="title col-xs-12 col-sm-12 col-md-6 col-md-offset-1">
		<img src="http://moerkerkentweewielers.nl/images/title.png">
	</div>
	<div class="openingshours hidden-xs hidden-sm col-md-4">
<?php
if ($openingsHours === null || $openingsHours->getClosedToday() === true)
{
	echo "Wij zijn momenteel gesloten";
}
else
{
?>
		Vandaag geopend tot:
		<span class="time"><?=date("H:i", $openingsHours->getClosingTime())?></span>
<?php
}
?>
	</div>
</div>
<div class="navigation col-xs-12 col-sm-12 col-md-12">
	<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/navigation.inc.tpl")?>
</div>