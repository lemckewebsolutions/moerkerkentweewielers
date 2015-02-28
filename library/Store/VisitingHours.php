<?php
class Store_VisitingHours
{
	private $closingTime = -1;

	private $day = "";

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

	/**
	 * @return string
	 */
	public function getDay()
	{
		return $this->day;
	}

	/**
	 * @param string $value
	 */
	public function setDay($value)
	{
		$this->day = (string)$value;
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