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
		$jsFooterFiles->push("navigation.js");
		$jsHeaderFiles->push("jquery.js");

		if (array_key_exists("overridehost", $_GET) === true ||
			($_SERVER['REMOTE_ADDR'] !== "77.251.79.182" &&  // Wouter
			$_SERVER['REMOTE_ADDR'] !== "77.61.70.249")) // Hennie
		{
			$jsHeaderFiles->push("googleAnalytics.js");
		}
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
	 * Gets the database connection.
	 * @return mysqli
	 */
	protected function getDatabaseConnection()
	{
		$configuration = $this->getConfiguration();
		$databaseConfiguration = $configuration->offsetGet("database");

		$databaseConnection = new mysqli(
			$databaseConfiguration->offsetGet("server"),
			$databaseConfiguration->offsetGet("user"),
			$databaseConfiguration->offsetGet("password"),
			$databaseConfiguration->offsetGet("database")
		);

		return $databaseConnection;
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

	protected function getUrlParameterValue($index)
	{
		$segments = $this->getRequest()->getRequestUrl()->getSegments();

		if ($segments->offsetExists($index) === true)
		{
			return $segments->offsetGet($index);
		}

		return null;
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
