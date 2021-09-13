<?php
namespace App\Controller\Management\Staff;

define("LINK_VIEWS", "management\\staff");
define("LINK_VIEWS_FOLDER", str_replace(" ", "", ucfirst(str_replace("-", " ",LINK_VIEWS))));

use App\Entity\Staff\StaffEntity;
use App\Entity\Staff\StaffPoleEntity;
use App\Entity\Staff\StaffProfileEntity;
use App\Entity\Staff\StaffRoleEntity;
use App\Entity\Staff\StaffSalaryEntity;
use Core\Route\CoreRouteOptions;

class ManagementStaffController extends CoreRouteOptions
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	public function __construct()
	{
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
	
	/**
	 * The function "staffIndex"
	 *
	 */
	final public function staffIndex(): void
  {
  	# Create an instance of ProfileStaffEntity
	  $staffEntity = new StaffEntity();
	  
	  # Render the views + render's Params
    $render = str_replace("\\", DIRECTORY_SEPARATOR, LINK_VIEWS_FOLDER . "\\index.php");
    $this->render($render, [
    	"staff" => $staffEntity,
    	"listStaff" => $staffEntity->findAll()
    ]);
  }
	
	/**
	 * The function "staffNew"
	 *
	 */
	final public function staffNew(): void
	{
		$staffRole = new StaffRoleEntity();
		$listStaffRole = $staffRole->findAll(["name" => "asc"]);
		$render = str_replace("\\", DIRECTORY_SEPARATOR, LINK_VIEWS_FOLDER . "\\add.php");
		$this->render($render, [
			"staffRole" => $staffRole,
			"listStaffRole" => $listStaffRole
		]);
	}
	
	/**
	 * The function "staffAdd"
	 *
	 */
	final public function staffAdd(): void
	{
		$post = $this->getApp("POST");
		$errors = 0;
		$postProfile = [];
		$postRole = [];
		$postSalary = [];
		
		foreach ($post as $key => $value)
		{
			($key === "username" &&  $value)
				? array_push($postProfile, ["username" => $value])
				: $errors++;
		}
		
		
		# Insert in new "StaffProfileEntity"
		$staffProfile = new StaffProfileEntity();
		$staffProfile->insert($postProfile);
		$staffProfileId = $staffProfile->getTableId();
		
		# Insert in new "RoleEntity"
		$staffRole = new StaffRoleEntity();
		$staffRole->insert(["id" => ""]);
		$staffRoleId = $staffRole->getTableId();
		
		# Insert in new "StaffSalaryEntity"
		$staffSalary = new StaffSalaryEntity();
		$staffSalary->insert(["id" => ""]);
		$staffSalaryId = $staffSalary->getTableId();
		
		# Insert in new Staff Entity
		$staff = new StaffEntity();
		$staff->insert([
			"staffProfileId" => $staffProfileId,
			"staffRoleId" => $staffRoleId,
			"staffSalaryId" => $staffSalaryId,
		]);
		$staffId = $staff->getTableId();
		
		$this->redirect("/" . LINK_VIEWS);
	}
	
	/**
	 * The function "staffEdit"
	 *
	 */
	final public function staffEdit(): void
  {
	  $render = str_replace("\\", DIRECTORY_SEPARATOR, LINK_VIEWS_FOLDER . "\\edit.php");
	  
  	$requestId = $this->getApp("REQUEST", "id");
  	
  	if($requestId) {
  		
		  # Creating instances of classes
		  $staff = new StaffEntity();
		  $find = $staff->findById($requestId);
		  
		  if($find) {
			  # Render the views + render's Params
			  $this->render($render, [
				  "staff" => $staff
			  ]);
		  }
		  else {
		  	$this->renderError(500, "No staff has been find with this Id.");
		  }
	  }
  	else {
  		$this->renderError(500, "No id request value has been find.");
  	}
  }
	
	/**
	 * The function "staffDelete"
	 *
	 */
  final public function staffDelete(): void
  {
	  $requestId = $this->getApp("REQUEST", "id");
	  
	  if($requestId) {
	  	
		  $staff = new StaffEntity();
		  $staff->findById($requestId);
		  
		  $staffProfile = $staff->getStaffProfileId();
		  $staffSalary = $staff->getStaffSalaryId();
		  $staffPole = $staff->getStaffPoleId();
			
		  # Delete All relations of staff
		  $staffProfile->delete($staffProfile->getId());
		  $staffSalary->delete($staffSalary->getId());
		  $staffPole->delete($staffPole->getId());
		  $staff->delete($staff->getId());
	  }
	
	  $this->redirect("/" . LINK_VIEWS);
  }

}