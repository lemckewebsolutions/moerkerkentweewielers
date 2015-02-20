<?php
class Assortment_Bikes_Category
{
	private $category = "";

	private $categoryId = -1;

	public function __construct($categoryId, $category)
	{
		$this->setCategoryId($categoryId);
		$this->setCategory($category);
	}

	/**
	 * @return string
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * @param string $value
	 */
	private function setCategory($value)
	{
		$this->category = (string)$value;
	}

	/**
	 * @return int
	 */
	public function getCategoryId()
	{
		return $this->categoryId;
	}

	/**
	 * @param int $value
	 */
	private function setCategoryId($value)
	{
		$this->categoryId = (int)$value;
	}
}