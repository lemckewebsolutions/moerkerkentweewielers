<?php
class WebSite_OccasionsPage extends WebSite_CollectionPage
{
	protected function loadCategories()
	{
		$retrieveCategoriesCommand = new Assortment_RetrieveCategoriesCommand(
			$this->getDatabaseConnection(),
			Assortment_Bikes_Types::OCCASION_BIKES
		);

		$this->setCategories($retrieveCategoriesCommand->execute());
	}
}