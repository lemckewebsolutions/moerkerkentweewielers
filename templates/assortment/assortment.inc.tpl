<?
/**
 * @see WebSite_Views_AssortmentView::parse()
 *
 * @var Framework_Collection_Array|Assortment_Bikes_Bike[] $bikes
 */
?>
<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
<?
	foreach ($bikes as $bike)
	{
?>
	<div class="assortment-item col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="assortment-item-content">
			<div class="assortment-item-image">
				<img src="http://www.moerkerkentweewielers.nl/images/uploads/<?=$bike->getImageName()?>">
			</div>
			<h3><?=$bike->getBrand() . " " . $bike->getModel() . " " . $bike->getWheelSize() . "\""?></h3>
			<span class="assortment-item-specs">
				<?=$bike->getFrameType()->getFrameType()?>
			</span>
			<span class="assortment-item-specs price">
				&euro;<?=$bike->getSalesPrice()?>
			</span>
		</div>
	</div>
<?
	}
?>
</div>