<?php
class Assortment_Bikes_Bike
{
	private $bikeId = -1;

	private $brand = "";

	private $buildYear = -1;

	private $category = null;

	private $color = "";

	private $description = "";

	private $extras = "";

	private $frameType = null;

	private $frameSize = null;

	private $gears = "";

	private $imageName = "";

	private $model = "";

	private $salesPrice = -1;

	private $specifications = null;

	private $weight = -1;

	private $wheelSize = -1;

	/**
	 * @return int
	 */
	public function getBikeId()
	{
		return $this->bikeId;
	}

	/**
	 * @param int $bikeId
	 */
	public function setBikeId($bikeId)
	{
		$this->bikeId = (int)$bikeId;
	}

	/**
	 * @return string
	 */
	public function getBrand()
	{
		return $this->brand;
	}

	/**
	 * @param string $brand
	 */
	public function setBrand($brand)
	{
		$this->brand = (string)$brand;
	}

	/**
	 * @return int
	 */
	public function getBuildYear()
	{
		return $this->buildYear;
	}

	/**
	 * @param int $value
	 */
	public function setBuildYear($value)
	{
		$this->buildYear = (int)$value;
	}

	/**
	 * @return Assortment_Bikes_Category
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * @param Assortment_Bikes_Category $value
	 */
	public function setCategory(Assortment_Bikes_Category $value)
	{
		$this->category = $value;
	}

	/**
	 * @return string
	 */
	public function getColor()
	{
		return $this->color;
	}

	/**
	 * @param string $value
	 */
	public function setColor($value)
	{
		$this->color = (string)$value;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = (string)$description;
	}

	/**
	 * @return string
	 */
	public function getExtras()
	{
		return $this->extras;
	}

	/**
	 * @param string $value
	 */
	public function setExtras($value)
	{
		$this->extras = (string)$value;
	}

	/**
	 * @return Assortment_Bikes_FrameType
	 */
	public function getFrameType()
	{
		return $this->frameType;
	}

	/**
	 * @param Assortment_Bikes_FrameType $frameType
	 */
	public function setFrameType(Assortment_Bikes_FrameType $frameType)
	{
		$this->frameType = $frameType;
	}

	/**
	 * @return Assortment_Bikes_FrameSize
	 */
	public function getFrameSize()
	{
		return $this->frameSize;
	}

	/**
	 * @param Assortment_Bikes_FrameSize $frameSize
	 */
	public function setFrameSize(Assortment_Bikes_FrameSize $frameSize)
	{
		$this->frameSize = $frameSize;
	}

	/**
	 * @return string
	 */
	public function getGears()
	{
		return $this->gears;
	}

	/**
	 * @param string $value
	 */
	public function setGears($value)
	{
		$this->gears = (string)$value;
	}

	/**
	 * @return string
	 */
	public function getImageName()
	{
		return $this->imageName;
	}

	/**
	 * @param string $imageName
	 */
	public function setImageName($imageName)
	{
		$this->imageName = (string)$imageName;
	}

	/**
	 * @return string
	 */
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * @param string $model
	 */
	public function setModel($model)
	{
		$this->model = (string)$model;
	}

	/**
	 * @return int
	 */
	public function getSalesPrice()
	{
		return $this->salesPrice;
	}

	/**
	 * @param int $salesPrice
	 */
	public function setSalesPrice($salesPrice)
	{
		$this->salesPrice = (float)$salesPrice;
	}

	/**
	 * @return Framework_Collection_Array|Assortment_Bikes_Specification[]
	 */
	public function getSpecifications()
	{
		return $this->specifications;
	}

	/**
	 * @param Framework_Collection_Array|Assortment_Bikes_Specification[] $value
	 */
	public function setSpecifications(Framework_Collection_Array $value)
	{
		$this->specifications = $value;
	}

	/**
	 * @return int
	 */
	public function getWeight()
	{
		return $this->weight;
	}

	/**
	 * @param int $value
	 */
	public function setWeight($value)
	{
		$this->weight = (int)$value;
	}

	/**
	 * @return float
	 */
	public function getWheelSize()
	{
		return $this->wheelSize;
	}

	/**
	 * @param float $wheelSize
	 */
	public function setWheelSize($wheelSize)
	{
		$this->wheelSize = (float)$wheelSize;
	}
}