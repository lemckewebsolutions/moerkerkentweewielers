<?php
include_once("library/Framework/Core/Bootstrap.php");

try
{
	$configuration = new Framework_Collection_Array();

	if (file_exists("applications/Website/Configuration.Local.php") === true)
	{
		include_once("applications/Website/Configuration.Local.php");
	}

	$requestHandler = new WebSite_RequestHandler($configuration);
	$requestHandler->processRequest();
}
catch (Exception $exception)
{
	Framework_Exceptions_Handler::handleException($exception);
}