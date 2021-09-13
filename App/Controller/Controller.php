<?php
namespace App\Controller;

use Core\Route\CoreRouteController;

class Controller extends CoreRouteController
{
	/**
	 *   Controller Index
	 */
	final public function Index(): void
  {
	  $this->getRoute()->getApp("REQUEST","help") === "index"
			? $this->Help()
			: $this->getRoute()->render("index.php");
  }
	
	/**
	 * Controller Help
	 */
  final public function Help(): void
  {
	  $this->getRoute()->render("help\\index.php", [
    	"help" => "test"
    ]);
  }
}