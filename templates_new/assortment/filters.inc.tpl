<?php
/**
 * @var WebSite_CollectionPageView $this
 * @var Framework_Collection_Array $filters
 */
?>
<div class="categories hidden-xs col-sm-3 col-md-3 col-lg-3">
<?php
if (isset($_GET["spec"]) === true && count($_GET["spec"]) > 0) {
    ?>
    <a href="?" title="Verwijder filters" class="remove-filters" rel="nofollow">Alle filters verwijderen</a>
<?php
}
?>
	<form method="GET">
<?php
foreach ($filters as $filter)
{
	echo $filter;
}
?>
	</form>
<?php
if (isset($_GET["spec"]) === true && count($_GET["spec"]) > 0) {
?>
    <a href="?" title="Verwijder filters" rel="nofollow">Alle filters verwijderen</a>
<?php
}
?>
</div>