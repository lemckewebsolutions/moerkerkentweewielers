<?php
/**
 * @var Framework_Views_PageView $this
 */
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/head.inc.tpl");
?>
<div class="sidebar hidden-xs col-sm-2 col-md-2 col-md-offset-1">
	<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "brandbar.inc.tpl")?>
	<a href="https://www.facebook.com/moerkerkentweewielers" target="_blank" title="Facebook">
		<img src="images/facebook.jpg">
	</a>
</div>
<div class="col-sm-8 col-md-8">
	<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "imagegallery.inc.tpl")?>
</div>
<?
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");