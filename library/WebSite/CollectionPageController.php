<?php
class WebSite_CollectionPageController extends WebSite_PageController
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
		$page = new WebSite_CollectionPage(
			$this->getConfiguration(),
			$this->getRequest()
		);

		$page->load();

		$bikeCollection = Assortment_Bikes_Loader::loadBikeCollection(
			$this->getDatabaseConnection(),
			Assortment_Bikes_Types::NEW_BIKES
		);

		$view = new WebSite_CollectionPageView(
			self::TEMPLATE_PATH . "collection.tpl",
			$page,
			$page->getCategories(),
			$bikeCollection,
			$this->getBikesToShow($bikeCollection)
		);

		$this->assignClientCodeFiles($view);

		return $view->parse();
	}

	/**
	 * @param Assortment_Collection $bikeCollection
	 * @return Framework_Collection_Array|Assortment_Bikes_Bike[]
	 */
	protected function getBikesToShow(Assortment_Collection $bikeCollection)
	{
        $bikesToShow = clone $bikeCollection->getBikes();

		if (array_key_exists("spec", $_GET) === true &&
			is_array($_GET["spec"]) === true)
		{
			foreach ($bikeCollection->getBikes() as $bikeId => $bike)
			{
				reset($_GET["spec"]);

				foreach ($_GET["spec"] as $specificationId => $specification)
				{
					if (is_array($specification) === false)
					{
						continue;
					}

                    $bikeSpecs = $bike->getSpecifications();

                    if ($bikeSpecs->offsetExists($specificationId) === false)
                    {
                        $bikesToShow->offsetUnset($bikeId);
                        continue;
                    }

					foreach ($specification as $specOptionId)
					{
                        $spec = $bikeSpecs->offsetGet($specificationId);
						if ($spec->getSpecificationOptions()->keyExists($specOptionId) === false)
						{
                            $bikesToShow->offsetUnset($bikeId);
                            continue;
						}
					}
				}
			}
		}
		else
		{
			$bikesToShow = $bikeCollection->getBikes();
		}

		return $bikesToShow;
	}
}
