<?php
/**
 * @var WebSite_CollectionPageView $this
 * @var Framework_Collection_Array $filters
 */
?>
<div class="categories hidden-xs col-sm-3 col-md-3 col-lg-3">
	<form method="GET">
<?
/* @var Framework_Collection_Stack|WebSite_Views_FilterOptionView[] $filterOptions */
foreach ($filters as $filter => $filterOptions)
{
?>
	<h4><?=$filter?></h4>
	<ul class="collapsed">
<?
	foreach ($filterOptions as $filterOption)
	{
		echo $this->includeView($filterOption);
	}
?>
	</ul>
<?
}
?>
		</ul>
	</form>
</div>