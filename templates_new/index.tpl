<?php
/**
 * @var Framework_Views_PageView $this
 */
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/head.inc.tpl");
?>
<div class="sidebar col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
	<div class="logos hidden-xs hidden-sm col-md-12 col-lg-12">
		<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "brandbar.inc.tpl")?>
		<a href="https://www.facebook.com/moerkerkentweewielers" target="_blank" title="Facebook">
			<img src="images/facebook.jpg">
		</a>
	</div>
	<div class="hidden-xs hidden-sm col-md-12 col-lg-12" id="contact">
		<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "homepage/contact.inc.tpl")?>
	</div>
</div>
<div class="col-sm-12 col-md-8">
	<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "imagegallery.inc.tpl")?>
	<h3>Welkom bij Moerkerken Tweewielers</h3>
	<p>
		Bij Moerkerken Tweewielers bent u aan het juiste adres voor nieuwe stadsfietsen, hybrides en kinderfietsen. Daarnaast treft u bij ons
		het meest uitgebreide assortiment gebruikte kwaliteitsfietsen in de regio aan. Uiteraard kunt u ook bij ons terecht voor reparaties en onderhoud.
	</p>
	<p>
		Vaktechnische kennis, service en klantgericht werken staan bij ons hoog in het vaandel.
	</p>
	<p>
		Graag tot ziens in onze winkel!
	</p>
	<div id="aanbiedingen" class="salesOffers col-md-12">
		<h2>Aanbiedingen</h2>
<?php
foreach ($salesOfferViews as $salesOfferView)
{
	echo $this->includeView($salesOfferView);
}
?>
	</div>
</div>
<div class="hidden-md hidden-lg col-xs-12 col-sm-12" id="contact">
	<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "homepage/contact.inc.tpl")?>
</div>
<?php
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");