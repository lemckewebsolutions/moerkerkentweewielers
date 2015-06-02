<?php
class Assortment_Bikes_RetrieveBikeCommand extends Framework_Database_Command
{
	private $bikeId = null;

	public function __construct(mysqli $databaseConnection, $bikeId)
	{
		parent::__construct($databaseConnection);

		$this->setBikeId($bikeId);
	}

	public function execute()
	{
		$connection = $this->getDatabaseConnection();

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
			  f.versnellingen,
			  f.gewicht,
			  f.kleur,
			  f.modeljaar,
			  f.extra,
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
			  f.ID = ". $this->getBikeId()
		);

		while ($record = $result->fetch_object())
		{
			$bike = new Assortment_Bikes_Bike();
			$bike->setBikeId($record->fietsid);
			$bike->setBrand($record->merk);
			$bike->setModel($record->model);
			$bike->setWheelSize($record->wielmaat);
			$bike->setGears($record->versnellingen);
			$bike->setBuildYear($record->modeljaar);
			$bike->setColor($record->kleur);
			$bike->setWeight($record->gewicht);
			$bike->setExtras($record->extra);
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

			return $bike;
		}

		return null;
	}

	/**
	 * @return int
	 */
	private function getBikeId()
	{
		return $this->bikeId;
	}

	/**
	 * @param int $value
	 */
	private function setBikeId($value)
	{
		$this->bikeId = (int)$value;
	}
}