<?php
namespace Core;

use Core\Repository\CoreRepositoryRequest;
use PDO;

abstract class CoreRepository extends CoreRepositoryRequest
{
	// ########################################################################################################## //
	// List of Traits //
	// ########################################################################################################## //
	
	use \Core\Repository\Trait\CoreRepositoryTraitDate;
	use \Core\Repository\Trait\CoreRepositoryTraitTable;
	
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	/**
	 * @return PDO
	 */
	final public function connectPDO(): PDO
	{
		# Connection to the MySQL datas bases
		$CoreBdd = new CoreBdd();
		return $CoreBdd->start()->getBdd();
	}

}