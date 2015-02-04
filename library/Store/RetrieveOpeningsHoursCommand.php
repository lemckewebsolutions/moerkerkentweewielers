<?php
class Store_RetrieveOpeningsHoursCommand extends Framework_Database_Command
{
	public function execute()
	{
		$connection = $this->getDatabaseConnection();
		$openingsHours = new Store_VisitingHours();

		$result = $connection->query("
			select
			  ou.gesloten,
			  ou.openingstijd,
			  ou.sluitingstijd
			from
			  openingsuren ou
			where
			  ou.openingsurenid = " . date('w', time()));

		$record = $result->fetch_object();

		if ($record !== null)
		{
			if ($record->gesloten == 'Y' ||
				strtotime($record->sluitingstijd) < time())
			{
				$openingsHours->setClosedToday(true);
			}
			else
			{
				$openingsHours->setOpeningsTime(strtotime($record->openingstijd));
				$openingsHours->setClosingTime(strtotime($record->sluitingstijd));
			}
		}
		else
		{
			$openingsHours->setClosedToday(true);
		}

		return $openingsHours;
	}
}