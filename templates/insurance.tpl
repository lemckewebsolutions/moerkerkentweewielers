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
	<h2 class="titlebar">Verzekering</h2>
	<p>
		Wij zijn aangesloten bij Unigarant Verzekeringen.
		Hieronder kunt u uw premie berekenen en de gewenste verzekering afsluiten.
		Als extra service kunnen wij ook, geheel vrijblijvend, de gewenste fietsverzekering voor u regelen.
	</p>
	<iframe id="iframe"
	        name="iframe"
	        src="http://www.unigarant.nl/webservice/premiebereken.asp?id=17151288&product=fiets"
	        style="overflow:visible; width:700px; height:550px; display:inherit"
	        scrolling="yes">
	</iframe>
</div>
<?
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");