<?php
class WebSite_CollectionPageView extends WebSite_PageView
{
	private $bikeCollection = null;

	/* @var Framework_Collection_Array|Assortment_Bikes_Bike[] $bikesToShow */
	private $bikesToShow = null;

	private $categories = null;

	public function __construct(
		$templatePath,
		Framework_Model_Model $page,
		Framework_Collection_Array $categories,
		Assortment_Collection $bikeCollection,
		Framework_Collection_Array $bikesToShow
	)
	{
		parent::__construct($templatePath, $page);

		$this->setBikeCollection($bikeCollection);
		$this->bikesToShow = $bikesToShow;
	}

	/**
	 * @return Framework_Collection_Array
	 */
	private function createFilters()
	{
		$filters = new Framework_Collection_Array();
		$specifications = $this->getSpecifications();

		foreach ($specifications as $specificationId => $specification)
		{
			$view = new WebSite_Views_FilterView(
				WebSite_PageController::TEMPLATE_PATH . "assortment/filter.inc.tpl",
				$this->getBikeCollection()->getBikes(),
				$specification
			);

			$filters->offsetSet($specificationId, $view->parse());
		}


		return $filters;
	}

	public function parse()
	{
		$assortmentView = new WebSite_Views_AssortmentView(
			$this->bikesToShow
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
	private function getSpecifications()
	{
		$categories = new Framework_Collection_Array();

		foreach ($this->getBikeCollection()->getBikes() as $bike)
		{
			foreach ($bike->getSpecifications() as $specificationId => $specification)
			{
				if ($categories->offsetExists($specificationId) === false)
				{
					$categories->offsetSet($specificationId, $specification);
				}
			}
		}

		return $categories;
	}
}