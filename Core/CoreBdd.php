<?php
namespace Core;

use config\BddConfig;
use Exception ;
use PDO;

class CoreBdd extends BddConfig
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
  public static PDO $bdd;
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
 
	final public function __construct()
	{
	}
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	final static function getBdd(): PDO
  {
    return self::$bdd;
  }
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	private function setBdd(PDO $bdd): self
  {
	  self::$bdd = $bdd;
	  return $this;
  }
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	final public function start(): string|self
	{
		try {
			$dns = "mysql:host=" . $this::BddHost . ";dbname=" . $this::BddName . ";port=" . $this::BddPort . ";charset=utf8";
			$bdd = new PDO($dns, $this::BddLogin, $this::BddPassword);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			return $this->setBdd($bdd);
		}
		catch (Exception $e) {
			return "Erreur de connexion a la base de données !";
		}
	}
	
}