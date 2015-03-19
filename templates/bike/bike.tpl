<?php
/**
 * @var Framework_Views_PageView $this
 * @var Assortment_Bikes_Bike $bike
 */
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/head.inc.tpl");
?>
<div class="col-md-offset-1 col-md-10">
	<div class="col-md-6">
		<img src="http://www.moerkerkentweewielers.nl/images/uploads/<?=$bike->getImageName()?>">
	</div>
	<div class="col-md-6">
		<h2>
			<?=$bike->getBrand() . " " . $bike->getModel()?>
		</h2>
	</div>
</div>
<div class="col-md-offset-1 col-md-10">
	<div class="col-md-6">
		specs
	</div>
	<div class="col-md-6">
		<?=$bike->getDescription()?>
	</div>
</div>
<?
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");