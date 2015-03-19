<?php
class WebSite_Views_BikePageView extends WebSite_PageView
{
	public function parse()
	{
		$this->assignVariable("bike", $this->getPage()->getBike());

		return parent::parse();
	}
}