<?php
class WebSite_CollectionPageView extends WebSite_PageView
{
	private $bikeCollection = null;

	private $categories = null;

	public function __construct(
		$templatePath,
		Framework_Model_Model $page,
		Framework_Collection_Array $categories,
		Assortment_Collection $bikeCollection
	)
	{
		parent::__construct($templatePath, $page);

		$this->setCategories($categories);
		$this->setBikeCollection($bikeCollection);
	}

	private function createCategoryFilterOptionViews()
	{
		$filterOptions = new Framework_Collection_Stack();
		$categories = $this->getCategories();

		foreach ($categories as $categoryId => $category)
		{
			$view = new WebSite_Views_FilterOptionView(
				"categoryid",
				$category,
				$categoryId,
				$this->getBikeCollection()->getBikeCountForCategory($category)
			);

			if (array_key_exists("categoryid", $_GET) === true &&
				is_array($_GET["categoryid"]) === true &&
				in_array($categoryId, $_GET["categoryid"]) === true)
			{
				$view->setChecked(true);
			}

			$filterOptions->push($view);
		}

		return $filterOptions;
	}

	/**
	 * @return Framework_Collection_Array
	 */
	private function createFilters()
	{
		$filters = new Framework_Collection_Array();

		$filters->offsetSet("Categorieen", $this->createCategoryFilterOptionViews());

		return $filters;
	}

	public function parse()
	{
		$assortmentView = new WebSite_Views_AssortmentView(
			$this->getBikeCollection()->getBikes()
		);

		$this->assignVariable("filters", $this->createFilters());
		$this->assignVariable("assortmentView", $this->includeView($assortmentView));

		return parent::parse();
	}

	/**
	 * @return Assortment_Collection
	 */
	private function getBikeCollection()
	{
		return $this->bikeCollection;
	}

	/**
	 * @param Assortment_Collection $value
	 */
	private function setBikeCollection(Assortment_Collection $value)
	{
		$this->bikeCollection = $value;
	}

	/**
	 * @return Framework_Collection_Array
	 */
	private function getCategories()
	{
		return $this->categories;
	}

	/**
	 * @param Framework_Collection_Array $value
	 */
	private function setCategories (Framework_Collection_Array $value)
	{
		$this->categories = $value;
	}
}