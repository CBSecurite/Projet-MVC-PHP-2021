<?php
namespace App\Controller;

//use Core\Route\CoreRouteController;
use Core\Route\CoreRouteOptions;

class Controller extends CoreRouteOptions
{
	/**
	 *   Controller Index
	 */
	final public function Index(): void
  {
	  $this->render("index.php");
  }
}