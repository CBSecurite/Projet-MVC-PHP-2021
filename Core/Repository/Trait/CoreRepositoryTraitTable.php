<?php
namespace Core\Repository\Trait;
	
use Core\CoreBdd;
use DateTime;
use Exception;
use PDO;

trait CoreRepositoryTraitTable
{
	
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	public static int $tableId;
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	final public function getTableId(): string
	{
		return (string) self::$tableId;
	}
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	final public function setTableId(int $tableId): self
	{
		self::$tableId = (string) $tableId ;
		return $this;
	}
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	/**
	 * @return string
	 */
	final public function getTableName(): string
	{
		$tableRoute = (string) $this::class;
		$tableRouteArray = explode("\\", $tableRoute);
		$lastTableRoute = array_key_last($tableRouteArray);
		$nomClass = $tableRouteArray[$lastTableRoute];
		return strtolower(
			str_replace(
				"_Entity",
				"",
				preg_replace('/(?=(?<!^)[[:upper:]])/', '_', $nomClass)
			)
		);
	}
	
	/**
	 * @return string
	 */
	final public function getNameClass(): string
	{
		$tableRoute = (string) $this::class;
		$tableRouteArray = explode("\\", $tableRoute);
		$lastTableRoute = array_key_last($tableRouteArray);
		return $tableRouteArray[$lastTableRoute];
	}
	
	/**
	 * @return string
	 */
	final public function getClass(): string
	{
		return (string) $this::class;
	}
}