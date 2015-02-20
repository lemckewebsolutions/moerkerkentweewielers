<?php
class Assortment_Collection
{
	private $bikes = null;

	public function __construct(Framework_Collection_Array $bikes)
	{
		$this->setBikes($bikes);
	}

	public function getBikeCountForCategory ($category)
	{
		$count = 0;

		foreach ($this->getBikes() as $bike)
		{
			if ($bike->getCategory()->getCategory() === (string)$category)
			{
				$count++;
			}
		}

		return $count;
	}

	/**
	 * @return Framework_Collection_Array|Assortment_Bikes_Bike[]
	 */
	public function getBikes()
	{
		return $this->bikes;
	}

	/**
	 * @param Framework_Collection_Array $bikes
	 */
	private function setBikes(Framework_Collection_Array $bikes)
	{
		$this->bikes = $bikes;
	}
}