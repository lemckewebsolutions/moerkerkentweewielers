<?php
class WebSite_IndexPage extends WebSite_Page
{
	private $salesOffers = null;

	public function __construct(
			Framework_Collection_Array $configuration,
			Framework_Http_Request $request
	)
	{
		parent::__construct($configuration, $request);

		$this->setSalesOffers(new Framework_Collection_Stack());
	}

	public function load()
	{
		parent::load();

		$this->loadSalesOffers();
	}

	private function loadSalesOffers()
	{
		$retrieveSalesOffersCommand = new SalesOffers_RetrieveSalesOffersCommand(
			$this->getDatabaseConnection()
		);

		$this->setSalesOffers($retrieveSalesOffersCommand->execute());
	}

	/**
	 * @return Framework_Collection_Stack
	 */
	public function getSalesOffers ()
	{
		return $this->salesOffers;
	}

	private function setSalesOffers (Framework_Collection_Stack $salesOffers)
	{
		$this->salesOffers = $salesOffers;
	}
}