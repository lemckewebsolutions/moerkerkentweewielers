<?php
/**
 * @var Framework_Views_PageView $this
 * @var Assortment_Bikes_Bike $bike
 */
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/head.inc.tpl");
?>
<div class="bike col-md-offset-1 col-md-10">
	<div class="col-md-12">
		<div class="col-xs-12 col-sm-12 col-md-8">
			<img src="http://www.moerkerkentweewielers.nl/images/uploads/<?=$bike->getImageName()?>">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4">
			<h2>
				<?=$bike->getBrand() . " " . $bike->getModel()?>
			</h2>
			<div class="col-xs-12 col-sm-6 col-md-12">
				<h3>€<?=$bike->getSalesPrice()?></h3>
				<p>
					<?=$bike->getDescription()?>
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-12">
				<dl class="dl-horizontal">
					<dt>Merk</dt><dd><?=$bike->getBrand()?></dd>
<?php
	if ($bike->getModel() !== "")
	{
?>
					<dt>Model</dt><dd><?= $bike->getModel() ?></dd>
<?php
	}

	if ($bike->getBuildYear() > 0)
	{
?>
					<dt>Modeljaar</dt><dd><?= $bike->getBuildYear()?></dd>
<?php
	}
?>
					<dt>Categorie</dt><dd><?=$bike->getCategory()->getCategory()?></dd>
					<dt>Frametype</dt><dd><?=$bike->getFrameType()->getFrameType()?></dd>
<?php
	if ($bike->getFrameSize()->getFrameSize() > 0)
	{
?>
					<dt>Framehoogte</dt><dd><?= $bike->getFrameSize()->getFrameSize()?>cm</dd>
<?php
	}
?>
					<dt>Wielmaat</dt><dd><?=$bike->getWheelSize()?>"</dd>
<?php
	if ($bike->getGears() !== "")
	{
?>
					<dt>Versnellingen</dt><dd><?= $bike->getGears()?></dd>
<?php
	}
?>
					<dt>Kleur</dt><dd><?=$bike->getColor()?></dd>
<?php
	if ($bike->getWeight() > 0)
	{
?>
					<dt>Gewicht</dt><dd><?= $bike->getWeight()?>kg</dd>
<?php
	}

	if ($bike->getExtras() !== "")
	{
?>
					<dt>Extra's</dt><dd><?= $bike->getExtras()?></dd>
<?php
	}
?>
				</dl>
			</div>
		</div>
	</div>
</div>
<?php
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");