<?php
class WebSite_CollectionPage extends WebSite_Page
{
	private $categories = null;

	public function __construct (Framework_Collection_Array $configuration, Framework_Http_Request $request)
	{
		parent::__construct($configuration, $request, "Collectie | Moerkerken Tweewielers");

		$this->setCategories(new Framework_Collection_Array());
	}

	public function load()
	{
		parent::load();

		$this->loadCategories();
	}

	protected function loadCategories()
	{
		$retrieveCategoriesCommand = new Assortment_RetrieveCategoriesCommand(
			$this->getDatabaseConnection(),
			Assortment_Bikes_Types::NEW_BIKES
		);

		$this->setCategories($retrieveCategoriesCommand->execute());
	}

	public function getCategories()
	{
		return $this->categories;
	}

	protected function setCategories (Framework_Collection_Array $value)
	{
		$this->categories = $value;
	}
}