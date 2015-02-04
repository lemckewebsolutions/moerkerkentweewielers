<?php
/**
 * @var Framework_Views_PageView $this
 */
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/head.inc.tpl");
?>
<div class="sidebar hidden-xs hidden-sm col-md-2 col-md-offset-1">
	<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "brandbar.inc.tpl")?>
	<a href="https://www.facebook.com/moerkerkentweewielers" target="_blank" title="Facebook">
		<img src="images/facebook.jpg">
	</a>
</div>
<div class="col-sm-12 col-md-8">
	<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "imagegallery.inc.tpl")?>
	<div class="salesOffers col-md-12">
		<h2>Aanbiedingen</h2>
<?
foreach ($salesOfferViews as $salesOfferView)
{
	echo $this->includeView($salesOfferView);
}
?>
		
	</div>
</div>
<?
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");