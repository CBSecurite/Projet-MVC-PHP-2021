<?php
namespace config;

use Core\Route\CoreRoute;

class RouteConfig extends CoreRoute
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
  final public function __construct()
  {
	  # Route stack management
	  $this->addRoute(["GET"], "/management/staff/delete", "Management\\Staff\\ManagementStaffController", "staffDelete");
	  $this->addRoute(["GET"], "/management/staff/new-staff", "Management\\Staff\\ManagementStaffController", "staffNew");
	  $this->addRoute(["POST"], "/management/staff/new-staff", "Management\\Staff\\ManagementStaffController", "staffAdd");
	  $this->addRoute(["GET"], "/management/staff/edit", "Management\\Staff\\ManagementStaffController", "staffEdit");
	  $this->addRoute(["GET"], "/management/staff", "Management\\Staff\\ManagementStaffController", "staffIndex");
	  
    # Route index
	  $this->addRoute(["GET"], "/", "Controller", "Index");
  }
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
}