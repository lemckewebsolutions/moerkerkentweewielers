<?php
class WebSite_Views_AssortmentView extends Framework_Views_View
{
	private $bikes = null;

	public function __construct(Framework_Collection_Array $bikes)
	{
		parent::__construct(WebSite_IndexPageController::TEMPLATE_PATH . "assortment/assortment.inc.tpl");

		$this->setBikes($bikes);
	}

	public function parse()
	{
		$this->assignVariable("bikes", $this->getBikes());

		return parent::parse();
	}

	/**
	 * @return Framework_Collection_Array
	 */
	private function getBikes()
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