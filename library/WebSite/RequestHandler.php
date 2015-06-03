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

		$this->getUrlPatterns()->offsetSet(
			WebSite_UrlPatterns::BIKE,
			"WebSite_BikePageController"
		);
	}

	private function findMatchingPattern($requestPattern)
	{
		$urlPatterns = $this->getUrlPatterns()->getKeys();
		$requestSegments = explode("/", $requestPattern);

		foreach ($urlPatterns as $urlPattern)
		{
			$urlSegments = explode("/", $urlPattern);

			$requiredSegmentCount = count($urlSegments);

			foreach ($urlSegments as $segment)
			{
				if ($segment === "%")
				{
					$requiredSegmentCount--;
				}
			}

			if (count($requestSegments) < $requiredSegmentCount)
			{
				continue;
			}

			reset($urlSegments);
			$matchedSegments = 0;
			foreach ($urlSegments as $index => $segment)
			{
				if (strtolower($requestSegments[$index]) === strtolower($segment))
				{
					$matchedSegments++;

					if ($matchedSegments === $requiredSegmentCount)
					{
						return $urlPattern;
					}
				}
				elseif (preg_match("/\\{[a-z]+\\}/i", $segment) == true &&
					(int)$requestSegments[$index] > 0)
				{
					$matchedSegments++;

					if ($matchedSegments === $requiredSegmentCount)
					{
						return $urlPattern;
					}
				}
			}
		}
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
		
		$matchingPattern = $this->findMatchingPattern($requestUrl->getPath());
		
		if ($matchingPattern === null)
		{
			http_response_code(404);
			echo "Deze pagina kan helaas niet worden gevonden.";
			exit;
		}

		$controllerName = $urlPatterns->offsetGet(
			$matchingPattern
		);
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
