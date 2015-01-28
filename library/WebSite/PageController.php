<?php
class WebSite_PageController extends Framework_Request_PageController
{
	const TEMPLATE_PATH = "templates/";

	/**
	 * The configuration array.
	 * @var Framework_Collection_Array
	 */
	private $configuration = null;

	/**
	 * The request object.
	 * @var Framework_Http_Request
	 */
	private $request = null;

	public function __construct (
			Framework_Http_Request $request,
			Framework_Collection_Array $configuration
	)
	{
		$this->setRequest($request);
		$this->setConfiguration($configuration);
	}

	protected function assignClientCodeFiles(Framework_Views_PageView $view)
	{
		$cssFiles = $view->getCssFiles();
		$jsFooterFiles = $view->getFooterJsFiles();
		$jsHeaderFiles = $view->getHeaderJsFiles();

		$cssFiles->push("bootstrap.min.css");
		$cssFiles->push("layout.css");
		$cssFiles->push("navigation.css");

		$jsFooterFiles->push("bootstrap.min.js");

		$jsHeaderFiles->push("jquery.js");
		$jsHeaderFiles->push("googleAnalytics.js");
	}

	/**
	 * Gets the configuration array.
	 * @return Framework_Collection_Array
	 */
	protected function getConfiguration ()
	{
		return $this->configuration;
	}

	/**
	 * Sets tets the configuration array.
	 * @param Framework_Collection_Array $configuration
	 */
	private function setConfiguration (Framework_Collection_Array $configuration)
	{
		$this->configuration = $configuration;
	}

	protected function isAjaxRequest()
	{
		$isAjaxRequest = false;

		if (array_key_exists("HTTP_X_REQUESTED_WITH", $_SERVER) === true &&
			strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) === "xmlhttprequest")
		{
			$isAjaxRequest = true;
		}

		return $isAjaxRequest;
	}

	/**
	 * Gets the request object.
	 * @return Framework_Http_Request
	 */
	protected function getRequest ()
	{
		return $this->request;
	}

	/**
	 * Sets the request object.
	 * $param Framework_Http_Request $value
	 */
	private function setRequest (Framework_Http_Request $value)
	{
		$this->request = $value;
	}
}
