<?php
class SalesOffers_RetrieveSalesOffersCommand extends Framework_Database_Command
{
	public function execute()
	{
		$connection = $this->getDatabaseConnection();
		$salesOffers = new Framework_Collection_Stack();

		$result = $connection->query("
			select
			  a.titel as name,
			  a.van as formerprice,
			  a.voor as price,
			  a.foto_url as imageurl
			from
			  aanbiedingen a
			order by
			  a.pos asc
		");

		while ($record = $result->fetch_object())
		{
			$salesOffer = new SalesOffers_Item(
				$record->name,
				$record->price,
				$record->imageurl
			);

			if ($record->formerprice > $record->price)
			{
				$salesOffer->setFormerPrice($record->formerprice);
			}

			$salesOffers->push($salesOffer);
		}

		return $salesOffers;
	}
}