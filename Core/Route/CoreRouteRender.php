<?php
namespace Core\Route;

use Core\Views\CoreViews;

abstract class CoreRouteRender
{
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
	// List of Setters about variables  //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	/**
	 * The function "render"
	 *
	 * @param string $view
	 * @param array $viewParams
	 */
	final public function render(string $view, array $viewParams = []): void
	{
		$_fileView = str_replace("\\", DIRECTORY_SEPARATOR, VIEWS . $view);
		
		if(count($viewParams)) { $this->setApp("params", $viewParams); }
		
		$this->getApp("REQUEST","help") === "index"
			? $this->renderView(VIEWS . "help\\index.php")
			: $this->renderView($_fileView);;
			
	}
	
	/**
	 * The function "renderError"
	 *
	 * @param int $codeError
	 * @param string $errorMessage
	 */
	final public function renderError(int $codeError, string $errorMessage): void
	{
		CoreViews::$optionsApp["error"] = [
			"title" => "Erreur " . $codeError,
			"message" => $errorMessage,
			"codeError" => $codeError
		];
		$this->renderView(str_replace("\\", DIRECTORY_SEPARATOR, VIEWS . "errors\\" . $codeError . ".php"));
	}
	
	/**
	 * The function "redirect"
	 *
	 * @param string $view
	 */
	final public function redirect(string $view): void
	{
		header("Location: " . $view );
	}
	
	/**
	 * The function "renderView"
	 *
	 * @param string $view
	 * @return CoreViews
	 */
	final public function renderView(string $view): CoreViews
	{
		$optionsApp = [
			"error" => $this->getApp("error"),
			"user" => $this->getApp("user"),
			"params" => $this->getApp("params"),
			"request" => $this->getApp("REQUEST"),
			"get" => $this->getApp("GET"),
			"post" => $this->getApp("POST")
		];
		foreach ($optionsApp as $key => $value) { CoreViews::$optionsApp[$key] = $value; }
		
		$optionsCore = [
			"server" => $this->getApp("SERVER"),
			"parent" => $this
		];
		foreach ($optionsCore as $key => $value) { CoreViews::$optionsCore[$key] = $value; }
		
		CoreViews::$view = $view;
		
		return new CoreViews();
		
	}
	
}