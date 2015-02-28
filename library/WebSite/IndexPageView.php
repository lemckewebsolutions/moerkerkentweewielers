<?php
class WebSite_IndexPageView extends WebSite_PageView
{
	public function parse()
	{
		/* @var WebSite_IndexPage $page */
		$page = $this->getPage();
		$salesOffers = $page->getSalesOffers();
		$salesOfferViews = new Framework_Collection_Stack();

		foreach ($salesOffers as $salesOffer)
		{
			$salesOfferViews->push(new SalesOffers_SalesOfferView($salesOffer));
		}

		$this->assignVariable("salesOfferViews", $salesOfferViews);
		$this->assignVariable("openingHours", $page->getOpeningsHours());

		return parent::parse();
	}
}