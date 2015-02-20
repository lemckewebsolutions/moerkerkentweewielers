<?php
class WebSite_OccasionsPageController extends WebSite_PageController
	implements Framework_Http_IGet
{
	protected function assignClientCodeFiles(Framework_Views_PageView $view)
	{
		parent::assignClientCodeFiles($view);
		$view->getCssFiles()->push("collection.css");

		$view->getFooterJsFiles()->push("collection.js");
	}

	public function get()
	{
		$page = new WebSite_OccasionsPage(
			$this->getConfiguration(),
			$this->getRequest()
		);

		$page->load();

		$categoryIds = new Framework_Collection_Stack();

		if (array_key_exists("categoryid", $_GET) === true)
		{
			$categoryIds = new Framework_Collection_Stack(array_keys($_GET["categoryid"]));
		}

		$bikeCollection = Assortment_Bikes_Loader::loadBikeCollection(
			$this->getDatabaseConnection(),
			Assortment_Bikes_Types::OCCASION_BIKES,
			$categoryIds
		);

		$view = new WebSite_CollectionPageView(
			self::TEMPLATE_PATH . "collection.tpl",
			$page,
			$page->getCategories(),
			$bikeCollection
		);

		$this->assignClientCodeFiles($view);

		return $view->parse();
	}
}
