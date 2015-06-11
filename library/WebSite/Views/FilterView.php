<?php
class WebSite_Views_FilterView extends Framework_Views_View
{
	/* @var Framework_Collection_Array|Assortment_Bikes_Bike[] $bikes */
	private $bikes = null;
	/* @var Assortment_Bikes_Specification $specification */
	private $specification = null;

	public function __construct($templatePath,
	                            Framework_Collection_Array $bikes,
	                            Assortment_Bikes_Specification $specification)
	{
		parent::__construct($templatePath);

		$this->bikes = $bikes;
		$this->specification = $specification;
	}

	public function parse()
	{
		$specification = $this->specification;

		$this->assignVariable("specificationId", $specification->getSpecificationId());
		$this->assignVariable("filterName", $specification->getSpecificationName());
		$this->assignVariable("filterOptions", $this->getSpecificationOptions());

		return parent::parse();
	}

	/**
	 * @return Framework_Collection_Array
	 */
	private function getSpecificationOptions()
	{
		$options = new Framework_Collection_Array();
		$specificationId = $this->specification->getSpecificationId();

		foreach ($this->bikes as $bike)
		{
			if ($bike->getSpecifications()->offsetExists($specificationId) === true)
			{
				/* @var Assortment_Bikes_Specification $specification */
				$specification = $bike->getSpecifications()->offsetGet($specificationId);

				foreach ($specification->getSpecificationOptions() as $specOptionId => $specOption)
				{
					if ($options->valueExists($specOption) === false)
					{
						$options->offsetSet($specOptionId, $specOption);
					}
				}
			}
			elseif ($options->offsetExists(-1) === false)
			{
				$options->offsetSet(-1, "Overig");
			}
		}

		$options->sortByValue();

		return $options;
	}
}