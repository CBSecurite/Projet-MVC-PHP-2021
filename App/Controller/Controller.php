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
	  $this->getRoute()->render("index.php");
  }
}