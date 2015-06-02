<?php
abstract class Assortment_Bikes_Loader
{
	/**
	 * Loads the bike that are of the given type and in the given category.
	 * @param mysqli $databaseConnection The connection with the database.
	 * @param int $type Whether to search for new or occasions bikes.
	 * @return Assortment_Collection The loaded bikes put into a collection object.
	 * @throws Framework_Common_ArgumentErrorException When an unsupported type is given.
	 */
	public static function loadBikeCollection(mysqli $databaseConnection, $type)
	{
		if ($type !== Assortment_Bikes_Types::NEW_BIKES &&
			$type !== Assortment_Bikes_Types::OCCASION_BIKES)
		{
			throw new Framework_Common_ArgumentErrorException("Unsupported type.");
		}

		$retrieveBikesCommand = new Assortment_Bikes_RetrieveBikesCommand(
			$databaseConnection,
			$type
		);

		return new Assortment_Collection($retrieveBikesCommand->execute());
	}
}