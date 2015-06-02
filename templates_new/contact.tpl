<?php
/**
 * @var Framework_Views_PageView $this
 */
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/head.inc.tpl");
?>

<div class="sidebar hidden-xs hidden-sm col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
	<div class="logos col-md-12 col-lg-12">
		<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "brandbar.inc.tpl")?>
		<a href="https://www.facebook.com/moerkerkentweewielers" target="_blank" title="Facebook">
			<img src="images/facebook.jpg">
		</a>
	</div>
</div>
<div class="col-sm-12 col-md-9">
	<h2 class="titlebar">Contact</h2>
	<div class="col-xs-12 col-sm-4 col-md-4">
		<div class="col-xs-5 col-sm-12">
			<address>
				Churchillplein 10<br>
				2983 EB Ridderkerk<br>
				Tel: <a href="tel:0180415415">(0180) 41 54 15</a><br>
				Email: <a href="mailto:info@moerkerkentweewielers.com" title="Email ons" class="email">info@moerkerkentweewielers.com</a>
			</address>
		</div>
		<div class="col-xs-7 col-sm-12">
<?php
foreach ($openingHours as $dayId => $openingHour)
{
?>
			<div class="openingshour-day col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<?=$openingHour->getDay()?>
			</div>
			<div class="openingshour-time col-xs-6 col-sm-6 col-md-6 col-lg-6">
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
	</div>
	<div class="col-sm-8 col-md-8">
		<iframe width="425" height="400" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.nl/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=churchillplein+10,+ridderkerk&amp;aq=&amp;sll=52.469397,5.509644&amp;sspn=5.261747,9.876709&amp;ie=UTF8&amp;hq=&amp;hnear=Churchillplein+10,+Ridderkerk,+Zuid-Holland&amp;ll=51.888306,4.612627&amp;spn=0.021031,0.054932&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.nl/maps?f=q&amp;source=embed&amp;hl=nl&amp;geocode=&amp;q=churchillplein+10,+ridderkerk&amp;aq=&amp;sll=52.469397,5.509644&amp;sspn=5.261747,9.876709&amp;ie=UTF8&amp;hq=&amp;hnear=Churchillplein+10,+Ridderkerk,+Zuid-Holland&amp;ll=51.888306,4.612627&amp;spn=0.021031,0.054932&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">Grotere kaart weergeven</a></small>
	</div>
</div>
<?php
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");