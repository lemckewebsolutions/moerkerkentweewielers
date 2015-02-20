<?php
class Assortment_Bikes_FrameSize
{
	const UNIT_CENTIMETERS = 1;

	const UNIT_INCHES = 2;

	private $frameSize = -1;

	private $unitId = -1;

	public function __construct($frameSize, $unit)
	{
		$this->setFrameSize($frameSize);
		$this->setUnitId($unit);
	}

	public function __toString()
	{
		if ($this->getUnitId() === self::UNIT_CENTIMETERS)
		{
			return $this->getFrameSize() . " cm";
		}
		elseif($this->getUnitId() === self::UNIT_INCHES)
		{
			return $this->getFrameSize() . "\"";
		}

		return "";
	}

	/**
	 * @return int
	 */
	public function getFrameSize()
	{
		return $this->frameSize;
	}

	/**
	 * @param int $frameSize
	 */
	private function setFrameSize($frameSize)
	{
		$this->frameSize = (float)$frameSize;
	}

	/**
	 * @return int
	 */
	public function getUnitId()
	{
		return $this->unitId;
	}

	/**
	 * @param int $unit
	 */
	private function setUnitId($unit)
	{
		$this->unitId = (int)$unit;
	}
}