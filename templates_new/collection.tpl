<?php
/**
 * @var Framework_Views_PageView $this
 */
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/head.inc.tpl");
?>
<div class="col-xs-12">
	<h2 class="titlebar">Collectie</h2>
</div>
<div class="col-lg-12 collection">
    <h4 class="col-xs-12 hidden-sm hidden-md hidden-lg">
        <a href="" title="Toon filters" class="js-filter-toggle">Filters openen</a>
    </h4>
<?php
	echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "assortment/filters.inc.tpl");
	echo $assortmentView;
?>
</div>
<?php
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");