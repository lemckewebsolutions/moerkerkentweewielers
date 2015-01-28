<?php
class WebSite_IndexPageController extends WebSite_PageController
	implements Framework_Http_IGet
{
	protected function assignClientCodeFiles (Framework_Views_PageView $view)
	{
		parent::assignClientCodeFiles($view);
	}

	public function get()
	{
		$request = $this->getRequest();

		$page = new WebSite_Page(
				$this->getConfiguration(),
				$this->getRequest()
		);

		$page->load();

		$view = new WebSite_PageView(
				self::TEMPLATE_PATH . "index.tpl",
				$page
		);

		$this->assignClientCodeFiles($view);

		return $view->parse();
	}
}
