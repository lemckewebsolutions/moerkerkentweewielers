<?php
class WebSite_BikePage extends WebSite_Page
{
	private $bike = null;

	private $bikeId = null;

	public function __construct(
		Framework_Collection_Array $configuration,
		Framework_Http_Request $request,
		$bikeId,
		$title = ""
	)
	{
		parent::__construct($configuration, $request, $title);

		$this->bikeId = $bikeId;
	}

	public function load()
	{
		parent::load();

		$this->loadBike($this->bikeId);
	}

	private function loadBike($bikeId)
	{
		$retrieveBikeCommand = new Assortment_Bikes_RetrieveBikeCommand(
			$this->getDatabaseConnection(),
			$bikeId
		);

		$bike = $retrieveBikeCommand->execute();

		$this->setBike($bike);
	}

	/**
	 * @return Assortment_Bikes_Bike
	 */
	public function getBike()
	{
		return $this->bike;
	}

	/**
	 * @param Assortment_Bikes_Bike $value
	 */
	private function setBike(Assortment_Bikes_Bike $value)
	{
		$this->bike = $value;
	}
}