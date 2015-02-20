<?php
/**
 * @var Framework_Views_PageView $this
 */
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/head.inc.tpl");
?>
<div class="col-xs-12">
	<h2 class="titlebar">Collectie</h2>
</div>
<div class="col-lg-12">
<?
	echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "assortment/filter.inc.tpl");
	echo $assortmentView;
?>
</div>
<?
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");