<?php
class SalesOffers_SalesOfferView extends Framework_Views_View
{
	private $salesOffer = null;

	public function __construct (SalesOffers_Item $salesOffer)
	{
		parent::__construct(WebSite_PageController::TEMPLATE_PATH . "homepage/salesOffer.inc.tpl");

		$this->setSalesOffer($salesOffer);
	}

	public function parse()
	{
		$salesOffer = $this->getSalesOffer();

		$this->assignVariable("name", $salesOffer->getName());
		$this->assignVariable("formerPrice", $salesOffer->getFormerPrice());
		$this->assignVariable("price", $salesOffer->getPrice());
		$this->assignVariable("imageUrl", $salesOffer->getImageUrl());

		return parent::parse();
	}

	/**
	 * @return SalesOffers_Item
	 */
	private function getSalesOffer ()
	{
		return $this->salesOffer;
	}

	private function setSalesOffer (SalesOffers_Item $salesOffer)
	{
		$this->salesOffer = $salesOffer;
	}
}