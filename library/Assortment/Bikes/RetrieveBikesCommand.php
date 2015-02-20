<?php
class Assortment_Bikes_RetrieveBikesCommand extends Framework_Database_Command
{
	private $categoryIds = null;

	private $typeId = -1;

	public function __construct(mysqli $databaseConnection, Framework_Collection_Stack $categoryIds, $typeId)
	{
		parent::__construct($databaseConnection);

		$this->setCategoryIds($categoryIds);
		$this->setTypeId($typeId);
	}

	public function execute()
	{
		$connection = $this->getDatabaseConnection();
		$bikes = new Framework_Collection_Array();

		$categoriesWhereClause = "";

		if ($this->getCategoryIds()->getLength() > 0)
		{
			$categoriesWhereClause = " and f.categorieid in (" . $this->getCategoryIds()->join(",") . ")";
		}

		$result = $connection->query("
			select
			  f.ID as fietsid,
			  c.categorieid,
			  c.categorietype,
			  f.merk,
			  f.model,
			  ft.frameid,
			  ft.frametype,
			  fm.framemaat,
			  fm.eenheid,
			  wm.wielmaat,
			  f.verkoopprijs,
			  f.beschrijving,
			  f.uploadname
			from
			  fietsen f
			  inner join categorie c on c.categorieid = f.categorieid
			  inner join frame ft on ft.frameid = f.frameid
			  inner join framemaat fm on fm.framemaatid = f.framemaatid
			  inner join wielmaat wm on wm.wielmaatid = f.wielmaatid
			WHERE
			  f.status = 'Beschikbaar' and
			  f.soortid = " . $this->getTypeId() . "
			  " . $categoriesWhereClause . "
			group by
			  f.merk,
			  f.model,
			  f.wielmaatid
			order by
			  f.merk,
			  f.model
		");

		while ($record = $result->fetch_object())
		{
			$bike = new Assortment_Bikes_Bike();
			$bike->setBikeId($record->fietsid);
			$bike->setBrand($record->merk);
			$bike->setModel($record->model);
			$bike->setWheelSize($record->wielmaat);
			$bike->setDescription($record->beschrijving);
			$bike->setSalesPrice($record->verkoopprijs);
			$bike->setImageName($record->uploadname);

			$bike->setCategory(
				new Assortment_Bikes_Category(
					$record->categorieid,
					$record->categorietype
				)
			);

			$frameType = new Assortment_Bikes_FrameType(
				$record->frameid,
				$record->frametype
			);
			$bike->setFrameType($frameType);

			$frameSize = new Assortment_Bikes_FrameSize(
				$record->framemaat,
				$record->eenheid
			);
			$bike->setFrameSize($frameSize);

			$bikes->offsetSet($bike->getBikeId(), $bike);
		}

		return $bikes;
	}

	/**
	 * @return Framework_Collection_Stack
	 */
	private function getCategoryIds()
	{
		return $this->categoryIds;
	}

	/**
	 * @param Framework_Collection_Stack $categoryId
	 */
	private function setCategoryIds(Framework_Collection_Stack $categoryId)
	{
		$this->categoryIds = $categoryId;
	}

	/**
	 * @return int
	 */
	private function getTypeId()
	{
		return $this->typeId;
	}

	/**
	 * @param int $typeId
	 */
	private function setTypeId($typeId)
	{
		$this->typeId = (int)$typeId;
	}
}