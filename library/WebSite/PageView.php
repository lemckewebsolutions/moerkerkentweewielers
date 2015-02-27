<?php
class WebSite_PageView extends Framework_Views_PageView
{

	public function parse ()
	{
		$page = $this->getPage();

		$this->assignVariable("title", $page->getTitle());
		$this->assignVariable("navigationItems", $page->getNavigationItems());
		$this->assignVariable("openingsHours", $this->getOpeningsHoursOfToday());

		return parent::parse();
	}

	/**
	 * @return Store_VisitingHours
	 */
	private function getOpeningsHoursOfToday()
	{
		/* @var Framework_Collection_Array|Store_VisitingHours[] $openingsHours */
		$openingsHours = $this->getPage()->getOpeningsHours();

		if ($openingsHours->offsetExists(date('N', time())) === true)
		{
			return $openingsHours->offsetGet(date('N', time()));
		}

		return null;
	}
}