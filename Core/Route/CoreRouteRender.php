<?php
namespace Core\Route;

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
		$this->setApp("views", "title", "Erreur " . $codeError);
		$this->setApp("error", $errorMessage);
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
	 */
	final public function renderView(string $view): void
	{
		$app_linkFolder = $this->getApp("LINK_VIEWS_FOLDER");
		$app_error = $this->getApp("error");
		$app_view = $this->getApp("view");
		include_once ($view);
	}
	
}