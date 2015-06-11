<?php
/**
 * @see WebSite_Views_FilterView::parse()
 *
 * @var int $specificationId
 * @var string $filterName
 * @var Framework_Collection_Array $filterOptions
 */
?>
<h4><?=$filterName?></h4>
<ul class="collapsed">
<?php
foreach ($filterOptions as $specOptionId => $specOption)
{
	$checked = "";
	if (isset($_GET["spec"][$specificationId][$specOptionId]) === true)
	{
		$checked = "checked";
	}
?>
	<li class="filterOption col-lg-12">
		<label title="Filter op <?=$specOption?>">
			<input type="checkbox" name="spec[<?=$specificationId?>][<?=$specOptionId?>]" value="<?=$specOptionId?>" <?=$checked?> onChange="this.form.submit()">
			<?=$specOption?>
		</label>
	</li>
<?php
}
?>
</ul>