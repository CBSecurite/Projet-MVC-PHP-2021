<?php
namespace Core\Repository\Trait;
	
use DateTime;
use Exception;

trait CoreRepositoryTraitDate
{
	/**
	 * The getter function "newDate"
	 *
	 * @return DateTime
	 */
	final public function newDate(): DateTime
	{
		return new DateTime("now");
	}
	
	/**
	 * The getter function "dateUs"
	 *
	 * @return string
	 */
	final public function dateUs(): string
	{
		return $this->newDate()->format("Y-m-d");
	}
	
	/**
	 * The getter function "dateFr"
	 *
	 * @return string
	 */
	final public function dateFr(): string
	{
		return $this->newDate()->format("d/m/Y");
	}
	
	/**
	 * The getter function "dateUsToFr"
	 *
	 * @param string $dateUs
	 * @return string
	 * @throws Exception
	 */
	final public function dateUsToFr(string $dateUs): string
	{
		try {
			$date = new DateTime($dateUs);
			return $date->format("d/m/Y");
		}
		catch (Exception $e) {
			throw new Exception("Error date !" . $e->getMessage(), 500);
		}
	}
	
	/**
	 * The getter function "dateDiffYear"
	 *
	 * @return string
	 * @throws Exception
	 */
	final public function dateDiffYear(string $diffDate): string
	{
		$dateDiff = new DateTime($diffDate);
		$diff = $dateDiff->diff($this->newDate());
		return $diff->format("%y");
	}
}