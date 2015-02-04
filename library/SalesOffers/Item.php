<?php
class SalesOffers_Item
{
	private $formerPrice = -1;
	private $imageUrl = "";
	private $name = "";
	private $price = -1;

	public function __construct ($name, $price, $imageUrl)
	{
		$this->setName($name);
		$this->setPrice($price);
		$this->setImageUrl($imageUrl);
	}

	public function getFormerPrice ()
	{
		return $this->formerPrice;
	}

	public function setFormerPrice ($formerPrice)
	{
		$this->formerPrice = (float)$formerPrice;
	}

	public function getImageUrl ()
	{
		return $this->imageUrl;
	}

	private function setImageUrl ($imageUrl)
	{
		$this->imageUrl = (string)$imageUrl;
	}

	public function getName ()
	{
		return $this->name;
	}

	private function setName ($name)
	{
		$this->name = (string)$name;
	}

	public function getPrice ()
	{
		return $this->price;
	}

	private function setPrice ($price)
	{
		$this->price = (float)$price;
	}
}