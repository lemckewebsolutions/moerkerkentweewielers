<?php
class Store_VisitingHours
{
	private $closingTime = -1;

	private $closedToday = false;

	private $openingsTime = -1;

	public function getClosingTime ()
	{
		return $this->closingTime;
	}

	public function setClosingTime ($closingTime)
	{
		$this->closingTime = (int)$closingTime;
	}

	public function getClosedToday ()
	{
		return $this->closedToday;
	}

	public function setClosedToday ($closedToday)
	{
		$this->closedToday = (bool)$closedToday;
	}

	public function getOpeningsTime ()
	{
		return $this->openingsTime;
	}

	public function setOpeningsTime ($openingsTime)
	{
		$this->openingsTime = (int)$openingsTime;
	}
}