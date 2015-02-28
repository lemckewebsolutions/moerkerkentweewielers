<?php
class WebSite_ContactPageController extends WebSite_PageController
	implements Framework_Http_IGet
{
	protected function assignClientCodeFiles (Framework_Views_PageView $view)
	{
		parent::assignClientCodeFiles($view);

		$view->getCssFiles()->push("brandbar.css");
	}

	public function get()
	{
		$page = new WebSite_Page(
			$this->getConfiguration(),
			$this->getRequest()
		);

		$page->load();

		$view = new WebSite_Views_ContactPageView(
			self::TEMPLATE_PATH . "contact.tpl",
			$page
		);

		$this->assignClientCodeFiles($view);

		return $view->parse();
	}
}