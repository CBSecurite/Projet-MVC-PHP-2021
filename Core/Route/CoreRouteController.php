<?php
namespace Core\Route;

use Core\CoreRoute;
use Core\CoreView;

class CoreRouteController
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	private static CoreRoute $CoreRoute;
	private static CoreView $CoreView;
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 * The getter function "getRoute"
	 *
	 * @return CoreRoute
	 */
	final public static function getRoute(): CoreRoute
	{
		return self::$CoreRoute;
	}
	
	/**
	 * The getter function "getView"
	 *
	 * @return CoreView
	 */
	final public static function getView(): CoreView
	{
		return self::$CoreView;
	}
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * The setter function "setRoute"
	 *
	 * @return $this
	 */
	final public function setRoute(): self
	{
		self::$CoreRoute = new CoreRoute();
		return $this;
	}
	
	/**
	 * The setter function "setView"
	 *
	 * @return $this
	 */
	final public function setView(): self
	{
		self::$CoreView = new CoreView();
		return $this;
	}
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	/**
	 * The function "route"
	 *
	 * @return CoreRoute
	 */
	final public function route(): CoreRoute
	{
		return self::setRoute()->getRoute();
	}
	
	/**
	 * The function "route"
	 *
	 * @return CoreView
	 */
	final public function view(): CoreView
	{
		return self::setView()->getView();
	}
	
}