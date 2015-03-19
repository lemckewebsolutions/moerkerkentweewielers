<?php
class WebSite_RequestHandler extends Framework_Request_RequestHandler
{
	/**
	 * The configuration array.
	 * @var Framework_Collection_Array
	 */
	private $configuration = null;

	private $urlPatterns = null;

	public function __construct (Framework_Collection_Array $configuration)
	{
		session_start();
		$this->setConfiguration($configuration);
		$this->setUrlPatterns(new Framework_Collection_Array());

		$this->registerControllers();
	}

	private function registerControllers()
	{
		$this->getUrlPatterns()->offsetSet(
				WebSite_UrlPatterns::INDEX,
				"WebSite_IndexPageController"
		);

		$this->getUrlPatterns()->offsetSet(
				WebSite_UrlPatterns::COLLECTION,
				"WebSite_CollectionPageController"
		);

		$this->getUrlPatterns()->offsetSet(
			WebSite_UrlPatterns::OCCASIONS,
			"WebSite_OccasionsPageController"
		);

		$this->getUrlPatterns()->offsetSet(
			WebSite_UrlPatterns::SERVICE,
			"WebSite_ServicePageController"
		);

		$this->getUrlPatterns()->offsetSet(
			WebSite_UrlPatterns::CONTACT,
			"WebSite_ContactPageController"
		);
	}

	public function processRequest()
	{
		$requestUrl = new Framework_Http_Url($_SERVER["REQUEST_URI"]);

		$urlPatterns = $this->getUrlPatterns();

		$postedFields = new Framework_Collection_Array();

		if (isset($_POST) === true &&
			count($_POST) > 0)
		{
			$postedFields = new Framework_Collection_Array($_POST);
		}

		$request = new Framework_Http_Request(
				$requestUrl,
				$postedFields
		);

		$controllerName = $urlPatterns->offsetGet($requestUrl->getPath());
		$controller = new $controllerName($request, $this->getConfiguration());

		echo parent::executeRequest($controller);
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

	/**
	 * Returns the url patterns.
	 * @return Framework_Collection_Array
	 */
	private function getUrlPatterns()
	{
		return $this->urlPatterns;
	}

	/**
	 * Sets the url patterns.
	 * @param Framework_Collection_Array $value
	 */
	private function setUrlPatterns(Framework_Collection_Array $value)
	{
		$this->urlPatterns = $value;
	}
}
