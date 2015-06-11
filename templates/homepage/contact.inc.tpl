<?php
/**
 * @var Framework_Collection_Array|Store_VisitingHours[] $openingHours
 */
?>
<div class="address col-xs-5 col-sm-5 col-md-12 col-lg-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-0">
	<h3>Contact</h3>
	<address>
		Churchillplein 10<br>
		2983 EB Ridderkerk<br>
		Tel: <a href="tel:0180415415">(0180) 41 54 15</a><br>
		Email: <a class="email" href="mailto:info@moerkerkentweewielers.com" title="Email ons">info@moerkerkentweewielers.com</a>
	</address>
</div>
<div class="openingshour col-xs-6 col-sm-6 col-md-12 col-lg-12">
<?php
foreach ($openingHours as $dayId => $openingHour)
{
?>
	<div class="openingshour-day col-xs-6 col-sm-6 col-md-12 col-lg-12"><?=$openingHour->getDay()?></div>
	<div class="openingshour-time col-xs-6 col-sm-6 col-md-12 col-lg-12">
<?php
	if ($openingHour->getClosedToday() === true)
	{
		echo "Gesloten";
	}
	else
	{
		echo date("H:i",  $openingHour->getOpeningsTime())." - ".date("H:i",  $openingHour->getClosingTime());
	}
?>
	</div>
<?php
}
?>
</div>