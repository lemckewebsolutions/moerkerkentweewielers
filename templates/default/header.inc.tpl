<div class="header col-xs-12 col-sm-12 col-md-12">
	<div class="title col-md-6 col-md-offset-1">
		<h1>Moerkerken Tweewielers</h1>
	</div>
	<div class="openingshours hidden-xs hidden-sm col-md-4">
<?
if ($openingsHours === null || $openingsHours->getClosedToday() === true)
{
	echo "Wij zijn momenteel gesloten.";
}
else
{
?>
		Vandaag geopend tot:
		<span class="time"><?=date("H:i", $openingsHours->getClosingTime())?></span>
<?
}
?>
	</div>
</div>
<div class="navigation col-xs-12 col-sm-12 col-md-12">
	<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/navigation.inc.tpl")?>
</div>