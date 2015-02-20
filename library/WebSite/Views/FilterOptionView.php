<?php
class WebSite_Views_FilterOptionView extends Framework_Views_View
{
	private $checked = false;

	private $filterName = "";

	private $name = "";

	private $resultCount = -1;

	private $value = "";

	public function __construct($filterName, $name, $value, $resultCount)
	{
		parent::__construct(WebSite_CollectionPageController::TEMPLATE_PATH . "assortment/filterOption.inc.tpl");

		$this->setFilterName($filterName);
		$this->setName($name);
		$this->setValue($value);
		$this->setResultCount($resultCount);
	}

	public function parse()
	{
		$this->assignVariable("filterName", $this->getFilterName());
		$this->assignVariable("isChecked", $this->isChecked());
		$this->assignVariable("name", $this->getName());
		$this->assignVariable("resultCount", $this->getResultCount());
		$this->assignVariable("value", $this->getValue());

		return parent::parse();
	}

	/**
	 * @return boolean
	 */
	private function isChecked()
	{
		return $this->checked;
	}

	/**
	 * @param boolean $value
	 */
	public function setChecked($value)
	{
		$this->checked = (bool)$value;
	}

	/**
	 * @return string
	 */
	private function getFilterName()
	{
		return $this->filterName;
	}

	/**
	 * @param string $value
	 */
	private function setFilterName($value)
	{
		$this->filterName = (string)$value;
	}

	/**
	 * @return string
	 */
	private function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $value
	 */
	private function setName($value)
	{
		$this->name = (string)$value;
	}

	/**
	 * @return int
	 */
	private function getResultCount()
	{
		return $this->resultCount;
	}

	/**
	 * @param int $value
	 */
	private function setResultCount($value)
	{
		$this->resultCount = (int)$value;
	}

	/**
	 * @return string
	 */
	private function getValue()
	{
		return $this->value;
	}

	/**
	 * @param string $value
	 */
	private function setValue($value)
	{
		$this->value = (string)$value;
	}
}