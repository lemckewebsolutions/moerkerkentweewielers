<?php
class Assortment_Bikes_Specification
{
	const SPECIFICATION_TYPE_OPTIONS = 1;
	const SPECIFICATION_TYPE_TEXT = 2;

	private $specificationId = 0;
	private $specificationName = "";
	private $specificationOptions = null;
	private $specificationTypeId = 0;

	public function __construct($specificationId, $name, $specificationTypeId)
	{
		$this->specificationId = (int)$specificationId;
		$this->specificationName = (string)$name;
		$this->specificationTypeId = (int)$specificationTypeId;
		$this->specificationOptions = new Framework_Collection_Array();
	}

	/**
	 * @return int
	 */
	public function getSpecificationId()
	{
		return $this->specificationId;
	}

	/**
	 * @return string
	 */
	public function getSpecificationName()
	{
		return $this->specificationName;
	}

	/**
	 * @return Framework_Collection_Array
	 */
	public function getSpecificationOptions()
	{
		return $this->specificationOptions;
	}
}