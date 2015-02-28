<?php
class WebSite_Views_ContactPageView extends WebSite_PageView
{
	public function parse()
	{
		/* @var WebSite_Page $page */
		$page = $this->getPage();

		$this->assignVariable("openingHours", $page->getOpeningsHours());

		return parent::parse();
	}
}