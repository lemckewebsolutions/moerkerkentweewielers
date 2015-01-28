<?php
class WebSite_Page extends Framework_Model_Model
{
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

	/**
	 * The page title.
	 * @var string
	 */
	private $title = "";

	public function __construct(
			Framework_Collection_Array $configuration,
			Framework_Http_Request $request,
			$title = ""
	)
	{
		$this->setConfiguration($configuration);
		$this->setRequest($request);

		if ($title === "")
		{
			$title = "LiveCarb";
		}

		$this->setTitle($title);
	}

	public function destroyFacebookSession()
	{
		$this->getFaceBook()->destroySession();
	}

	public function load()
	{
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

	/**
	 * Gets the navigation items.
	 * @return Framework_Collection_Stack
	 */
	public function getNavigationItems()
	{
		$requestUrl = $this->getRequest()->getRequestUrl();
		$navigationItems = new Framework_Collection_Stack();

		return $navigationItems;
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
	 * Gets the request object.
	 * @return Framework_Http_Request
	 */
	public function getRequest ()
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

	public function getTitle ()
	{
		return $this->title;
	}

	private function setTitle ($title)
	{
		$this->title = $title;
	}
}
