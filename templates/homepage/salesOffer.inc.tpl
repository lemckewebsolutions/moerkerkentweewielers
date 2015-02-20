<div class="salesOffer col-sm-6 col-md-4">
	<div class="salesOffer-content">
		<div class="salesOffer-information">
			<div class="salesOffer-image col-xs-6 col-sm-6 col-md-12">
				<img src="http://moerkerkentweewielers.nl/images/uploads/<?=$imageUrl?>">
			</div>
			<div class="salesOffer-text col-xs-6 col-sm-6 col-md-12">
<?
if ($formerPrice > $price)
{
?>
				<span class="price former">&euro;<?=$formerPrice?></span>
<?
}
?>
				<span class="price">&euro;<?=$price?></span>
				<h3><?=$name?></h3>
			</div>
		</div>
	</div>
</div>