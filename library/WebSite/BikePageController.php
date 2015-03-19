<?php
class WebSite_BikePageController extends WebSite_PageController
	implements Framework_Http_IGet
{
	public function get()
	{
		$page = new WebSite_BikePage(
			$this->getConfiguration(),
			$this->getRequest(),
			$this->getUrlParameterValue(1)
		);

		$page->load();

		$view = new WebSite_Views_BikePageView(
			self::TEMPLATE_PATH . "bike/bike.tpl",
			$page
		);

		$this->assignClientCodeFiles($view);

		return $view->parse();
	}
}