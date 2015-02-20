<?php
class Assortment_Bikes_FrameType
{
	private $frameId = -1;

	private $frameType = "";

	public function __construct($frameId, $frameType)
	{
		$this->setFrameId($frameId);
		$this->setFrameType($frameType);
	}

	/**
	 * @return int
	 */
	public function getFrameId()
	{
		return $this->frameId;
	}

	/**
	 * @param int $frameId
	 */
	private function setFrameId($frameId)
	{
		$this->frameId = (int)$frameId;
	}

	/**
	 * @return string
	 */
	public function getFrameType()
	{
		return $this->frameType;
	}

	/**
	 * @param string $frameType
	 */
	private function setFrameType($frameType)
	{
		$this->frameType = (string)$frameType;
	}
}