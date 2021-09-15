<?php
namespace App\Controller\Management\Staff;

define("LINK_VIEWS", "management/staff");
define("LINK_VIEWS_FOLDER", str_replace(" ", "", strtolower("management/staff")));

use App\Entity\Staff\StaffEntity;
use App\Entity\Staff\StaffProfileEntity;
use App\Entity\Staff\StaffRoleEntity;
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
    	"listStaff" => $staffEntity->findAll(["id" => "asc"])
    ]);
  }
	
	/**
	 * The function "staffNew"
	 *
	 */
	final public function staffNew(): void
	{
		$staffRole = new StaffRoleEntity();
		$listStaffRoleSelect = $staffRole->findAll(["fastSelection" => "desc", "name" => "asc"]);
		$listStaffRoleAll = $staffRole->findAll(["name" => "asc"]);
		$render = str_replace("\\", DIRECTORY_SEPARATOR, LINK_VIEWS_FOLDER . "\\add.php");
		$this->render($render, [
			"staffRole" => $staffRole,
			"listStaffRoleSelect" => $listStaffRoleSelect,
			"listStaffRoleAll" => $listStaffRoleAll,
		]);
	}
	
	/**
	 * The function "staffAdd"
	 *
	 */
	final public function staffAdd(): void
	{
		$post = $this->getApp("POST");
		$postStaff = [];
		$postStaffProfile = [];
		$postStaffRole = [];
		
		foreach ($post as $key => $value)
		{
			if(str_starts_with($key, "staff_") && $value) {
				if($key === "staff_password") {
					$value = password_hash($value, PASSWORD_ARGON2ID, ["cost" => 10]);
				}
				$postStaff[str_replace("staff_", "", $key)] = $value;
			}
			if(str_starts_with($key, "staffProfile_") && $value) {
				$postStaffProfile[str_replace("staffProfile_", "", $key)] = $value;
			}
			if(str_starts_with($key, "staffRole_") && $value) {
				if($this->getApp("POST", "existingRole") === "1" && $key !== "staffRole_staffRoleId") {
					$postStaffRole[str_replace("staffRole_", "", $key)] = $value;
				}
				if($this->getApp("POST", "existingRole") === "0" && $key === "staffRole_staffRoleId") {
					$postStaff["staffRoleId"] = $value;
				}
			}
			
		}

		# Insert in new "RoleEntity"
		if(count($postStaffRole)) {
			$staffRole = new StaffRoleEntity();
			$staffRole->insert($postStaffRole);
			$postStaff["staffRoleId"] = $staffRole->getTableId();
		}

		# Insert in new Staff Entity
		$staff = new StaffEntity();
		$staff->insert($postStaff);
		$postStaffProfile["staffId"] = $staff->getTableId();
		
		# Insert in new "StaffProfileEntity"
		$staffProfile = new StaffProfileEntity();
		$staffProfile->insert($postStaffProfile);

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
		  $staffProfile = new StaffProfileEntity();
		
		  $staffFind = $staff->findById($requestId);
		  if($staffFind) {
			
			  $staffProfile->findOneBy(["staffId" => ["=", $staff->getId()]]);
//			  print_r($staffProfile->getId());
			  
			  # Render the views + render's Params
			  $this->render($render, [
				  "staff" => $staff,
				  "staffProfile" => $staffProfile
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
			
		  # Delete All relations of staff
		  $staff->delete($staff->getId());
	  }
	
	  $this->redirect("/" . LINK_VIEWS);
  }

}