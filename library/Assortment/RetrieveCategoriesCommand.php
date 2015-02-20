<?php
class Assortment_RetrieveCategoriesCommand extends Framework_Database_Command
{
	private $type = "";

	/**
	 * @param mysqli $databaseConnection
	 * @param int $type
	 * @throws Framework_Common_ArgumentErrorException When the type is not supported.
	 */
	public function __construct(mysqli $databaseConnection, $type)
	{
		parent::__construct($databaseConnection);

		switch($type)
		{
			case Assortment_Bikes_Types::NEW_BIKES:
				$this->setType("nactive");
				break;
			case Assortment_Bikes_Types::OCCASION_BIKES:
				$this->setType("oactive");
				break;
			default:
				throw new Framework_Common_ArgumentErrorException("Unsupported type");
		}
	}
	public function execute()
	{
		$connection = $this->getDatabaseConnection();
		$categories = new Framework_Collection_Array();

		$result = $connection->query("
			select
			  categorieid,
			  categorietype
			from
			  categorie
			where
			  " . $this->getType() . " = 'Y'
			order by
			  categorietype
		");

		while ($record = $result->fetch_object())
		{
			$categories->offsetSet($record->categorieid, $record->categorietype);
		}

		return $categories;
	}

	/**
	 * @return string
	 */
	private function getType()
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	private function setType($type)
	{
		$this->type = (string)$type;
	}
}