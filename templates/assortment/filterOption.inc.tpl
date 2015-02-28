<?php
/**
 * @var WebSite_Views_FilterOptionView $this
 * @var string $filterName
 * @var bool $isChecked
 * @var string $name
 * @var int $resultCount
 * @var string $value
 */
$checked = "";

if ($isChecked === true)
{
	$checked = "checked";
}
?>
<li class="filterOption col-lg-12">
	<label title="Toon <?=$name?>">
		<input type="checkbox" name="<?=$filterName?>[<?=$value?>]" value="<?=$value?>" <?=$checked?> onChange="this.form.submit()">
		<?=$name?>
	</label>
</li>