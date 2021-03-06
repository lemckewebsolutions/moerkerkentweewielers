<?php
class WebSite_IndexPageController extends WebSite_PageController
	implements Framework_Http_IGet
{
	protected function assignClientCodeFiles (Framework_Views_PageView $view)
	{
		parent::assignClientCodeFiles($view);

		$view->getCssFiles()->push("salesOffer.css");
		$view->getCssFiles()->push("brandbar.css");
		$view->getCssFiles()->push("imagegallery.css");

		$view->getHeaderJsFiles()->push("jquery.flexslider-min.js");
	}

	public function get()
	{
		$page = new WebSite_IndexPage(
				$this->getConfiguration(),
				$this->getRequest()
		);

		$page->load();

		$view = new WebSite_IndexPageView(
				self::TEMPLATE_PATH . "index.tpl",
				$page
		);

		$this->assignClientCodeFiles($view);

		return $view->parse();
	}
}
