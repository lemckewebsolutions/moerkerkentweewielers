<?php
class Assortment_Bikes_RetrieveSpecificationsForBikeCommand extends Framework_Database_Command
{
	private $bikeId = 0;

	public function __construct(mysqli $databaseConnection, $bikeId)
	{
		parent::__construct($databaseConnection);

		$this->bikeId = $bikeId;
	}

	/**
	 * @return Framework_Collection_Array|Assortment_Bikes_Specification[]
	 */
	public function execute()
	{
		$connection = $this->getDatabaseConnection();
		$specifications = new Framework_Collection_Array();

		$result = $connection->query("
			select
			  s.specificatieid,
			  s.specificatie,
			  s.specificatietypeid,
			  so.specificatieoptieid,
			  so.specificatieoptie,
			  sw.specificatiewaarde,
			  e.eenheid
			from
			  specificatie s
			  left join specificatiewaarde sw on sw.specificatieid = s.specificatieid
			  left join specificatieoptie so on so.specificatieoptieid = sw.specificatieoptieid
			  left join eenheid e on e.eenheidid = sw.eenheidid
			where
			  sw.fietsid = $this->bikeId
			order by
			  s.specificatieid
		");

		while ($record = $result->fetch_object())
		{
			$specification = new Assortment_Bikes_Specification(
				$record->specificatieid,
				$record->specificatie,
				$record->specificatietypeid
			);

			if ($record->specificatietypeid == 1) //options
			{
				$specificationOption = $record->specificatieoptie;
			}
			else //text
			{
				$specificationOption = $record->specificatiewaarde;

				if ($specificationOption == "")
				{
					$specificationOption = "Overig";
				}
				else
				{
					if ($record->eenheid != null)
					{
						$specificationOption .= " " . $record->eenheid;
					}
				}
			}

			$specification->getSpecificationOptions()->offsetSet(
				$record->specificatieoptieid,
				$specificationOption
			);

			$specifications->offsetSet($specification->getSpecificationId(), $specification);
		}

		return $specifications;
	}
}